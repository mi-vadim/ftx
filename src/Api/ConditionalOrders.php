<?php
declare(strict_types=1);

namespace FTX\Api;

use DateTimeInterface;
use FTX\Api\Support\PendingConditionalOrder;
use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\ConditionalOrders as ConditionalOrdersDictionary;

class ConditionalOrders extends HttpApi
{
    use TransformsTimestamps;

    /**
     * @param string|null $market
     * @param string|null $type type of trigger order (stop, trailing_stop, or take_profit)
     * @return mixed
     */
    public function open(?string $market = null, ?string $type = null)
    {
        return $this->respond($this->http->get(ConditionalOrdersDictionary::COND_ORDERS_URI, compact('market', 'type')));
    }

    public function status(string $orderId)
    {
        return $this->respond($this->http->get(ConditionalOrdersDictionary::COND_ORDERS_URI . '/' . $orderId));
    }

    public function create(?array $attributes = []) : PendingConditionalOrder
    {
        return new PendingConditionalOrder($this, $attributes);
    }

    public function place(PendingConditionalOrder $pendingOrder)
    {
        return $this->respond($this->http->post(ConditionalOrdersDictionary::COND_ORDERS_URI, null, $pendingOrder->toArray()));
    }

    public function cancel(string $orderId)
    {
        return $this->respond($this->http->delete(ConditionalOrdersDictionary::COND_ORDERS_URI . '/' . $orderId));
    }

    public function cancelAll(?string $market = null, ?bool $conditionalOrdersOnly = true, ?bool $limitOrdersOnly = null) : mixed
    {
        return $this->respond($this->http->delete(
            ConditionalOrdersDictionary::ORDERS_URI,
            null,
            compact('market', 'conditionalOrdersOnly', 'limitOrdersOnly'))
        );
    }

    public function history(
        ?string $market = null,
        ?DateTimeInterface $start_time = null,
        ?DateTimeInterface $end_time = null,
        ?string $side = null,
        ?string $type = null,
        ?string $orderType = null,
        ?int $limit = null
    )
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);
        return $this->respond($this->http->get(
            ConditionalOrdersDictionary::COND_ORDERS_HISTORY_URI,
            compact('market', 'start_time', 'end_time', 'side', 'type', 'orderType', 'limit')
        ));
    }
}
