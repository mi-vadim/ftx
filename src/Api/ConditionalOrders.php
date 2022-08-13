<?php
declare(strict_types=1);

namespace FTX\Api;

use DateTimeInterface;
use FTX\Api\Support\PendingConditionalOrder;
use FTX\Dictionaries\Endpoint;
use FTX\Responses\Orders\CancelOrderResponse;
use FTX\Responses\Orders\PlaceTriggerOrderResponse;
use FTX\Responses\Orders\TriggerOrderResponse;
use FTX\Responses\Orders\TriggersResponse;
use JsonException;

class ConditionalOrders extends HttpApi
{
    /**
     * Get open trigger orders
     *
     * @param string|null $market
     * @param string|null $type type of trigger order (stop, trailing_stop, or take_profit)
     * @return TriggerOrderResponse[]
     * @throws JsonException
     */
    public function open(?string $market = null, ?string $type = null): array
    {
        return TriggerOrderResponse::collection(
            $this->get(Endpoint::COND_ORDERS->value, compact('market', 'type'))
        );
    }

    /**
     * Get triggers for trigger order
     *
     * @param string|null $market
     * @param string|null $type type of trigger order (stop, trailing_stop, or take_profit)
     * @return TriggersResponse[]
     * @throws JsonException
     */
    public function tiggers(?string $market = null, ?string $type = null): array
    {
        return TriggersResponse::collection(
            $this->get(Endpoint::COND_ORDERS->value, compact('market', 'type'))
        );
    }

    /**
     * Get trigger order history
     *
     * @param string|null $market
     * @param DateTimeInterface|null $start_time
     * @param DateTimeInterface|null $end_time
     * @param string|null $side
     * @param string|null $type
     * @param string|null $orderType
     * @param int|null $limit
     * @return TriggerOrderResponse[]
     * @throws JsonException
     */
    public function history(
        ?string $market = null,
        ?DateTimeInterface $start_time = null,
        ?DateTimeInterface $end_time = null,
        ?string $side = null,
        ?string $type = null,
        ?string $orderType = null,
        ?int $limit = null
    ): array
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return TriggerOrderResponse::collection(
            response: $this->get(
                Endpoint::COND_ORDERS_HISTORY->value,
                compact('market', 'start_time', 'end_time', 'side', 'type', 'orderType', 'limit'))
        );
    }

    public function create(?array $attributes = []) : PendingConditionalOrder
    {
        return new PendingConditionalOrder($this, $attributes);
    }

    /**
     * Place trigger order
     *
     * @param PendingConditionalOrder $pendingOrder
     * @return PlaceTriggerOrderResponse
     * @throws JsonException
     */
    public function place(PendingConditionalOrder $pendingOrder) : PlaceTriggerOrderResponse
    {
        return PlaceTriggerOrderResponse::fromResponse(
            response: $this->post(Endpoint::COND_ORDERS->value, null, $pendingOrder->toArray())
        );
    }

    /**
     * Modify trigger order
     *
     * @param PendingConditionalOrder $pendingOrder
     * @return TriggerOrderResponse
     * @throws JsonException
     */
    public function modify(PendingConditionalOrder $pendingOrder) : TriggerOrderResponse
    {
        return TriggerOrderResponse::fromResponse(
            response: $this->post(Endpoint::COND_ORDERS->value, null, $pendingOrder->toArray())
        );
    }

    /**
     * Get trigger order status
     *
     * @param string $orderId
     * @return mixed
     */
    public function status(string $orderId)
    {
        return $this->get(Endpoint::COND_ORDERS->withID($orderId))->toArray();
    }

    /**
     * Cancel open trigger order
     *
     * @param string $orderId
     * @return CancelOrderResponse
     * @throws JsonException
     */
    public function cancel(string $orderId): CancelOrderResponse
    {
        return CancelOrderResponse::fromResponse(
            response: $this->delete(Endpoint::COND_ORDERS->withID($orderId))
        );
    }

    /**
     * Cancel all orders
     *
     * This will also cancel common orders
     *
     * @param string|null $market
     * @param bool|null $conditionalOrdersOnly
     * @param bool|null $limitOrdersOnly
     * @return CancelOrderResponse
     * @throws JsonException
     */
    public function cancelAll(
        ?string $market = null,
        ?bool $conditionalOrdersOnly = true,
        ?bool $limitOrdersOnly = null
    ) : CancelOrderResponse
    {
        return CancelOrderResponse::fromResponse(
            response: $this->delete(
                endpoint: Endpoint::ORDERS->value,
                parameters: null,
                payload: compact('market', 'conditionalOrdersOnly', 'limitOrdersOnly')
            )
        );
    }
}
