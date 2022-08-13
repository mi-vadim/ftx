<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Support\PendingOrder;
use FTX\Dictionaries\Endpoint;

class Orders extends HttpApi
{
    /**
     * Get open orders
     *
     * @param string|null $market
     * @return mixed
     */
    public function open(?string $market = null)
    {
        return $this->get(Endpoint::ORDERS->value, compact('market'))->toArray();
    }

    /**
     * Get order history
     *
     * @param string|null $market
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @param int|null $limit
     * @return mixed
     */
    public function history(?string $market = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null, ?int $limit = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);
        return $this->get(Endpoint::ORDERS_HISTORY->value, compact('market', 'start_time', 'end_time', 'limit'))->toArray();
    }

    public function create(?array $attributes = []) : PendingOrder
    {
        return new PendingOrder($this, $attributes);
    }

    /**
     * Place order
     *
     * @param PendingOrder $pendingOrder
     * @return array
     */
    public function place(PendingOrder $pendingOrder)
    {
        return $this->post(Endpoint::ORDERS->value, null, $pendingOrder->toArray())->toArray();
    }

    /**
     * Modify order
     *
     * @param PendingOrder $pendingOrder
     * @return array
     */
    public function modify(PendingOrder $pendingOrder)
    {
        return $this->post(Endpoint::ORDERS->value, null, $pendingOrder->toArray())->toArray();
    }

    /**
     * Modify by client id order
     *
     * @param PendingOrder $pendingOrder
     * @return array
     */
    public function modifyByClientID(PendingOrder $pendingOrder)
    {
        return $this->post(Endpoint::ORDERS->value, null, $pendingOrder->toArray())->toArray();
    }

    /**
     * Get order status
     *
     * @param string $orderId
     * @return mixed
     */
    public function status(string $orderId)
    {
        return $this->get(Endpoint::ORDERS->withID($orderId));
    }

    /**
     * Get order status by client ID
     *
     * @param string $orderId
     * @return mixed
     */
    public function statusByClientID(string $orderId)
    {
        return $this->get(Endpoint::ORDERS->withID($orderId));
    }

    /**
     * Cancel order
     *
     * @param string $orderId
     * @return mixed
     */
    public function cancel(string $orderId)
    {
        return $this->delete(Endpoint::ORDERS->withID($orderId));
    }

    /**
     * Cancel order by client id
     *
     * @param string $orderId
     * @return mixed
     */
    public function cancelByClientID(string $orderId)
    {
        return $this->delete(Endpoint::ORDERS->withID($orderId))->toArray()
            ;
    }

    /**
     * Cancel all orders
     *
     * This will also cancel conditional orders (stop loss and trailing stop orders).
     * @param string|null $market
     * @param bool|null $conditionalOrdersOnly
     * @param bool|null $limitOrdersOnly
     * @return mixed
     */
    public function cancelAll(?string $market = null, ?bool $conditionalOrdersOnly = null, ?bool $limitOrdersOnly = null)
    {
        return $this->delete(Endpoint::ORDERS->value, null, compact('market', 'conditionalOrdersOnly', 'limitOrdersOnly'))
            ->toArray();
    }
}
