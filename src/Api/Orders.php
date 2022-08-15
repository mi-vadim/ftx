<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Support\PendingOrder;
use FTX\Dictionaries\Endpoint;
use FTX\Responses\Orders\CancelOrderResponse;
use FTX\Responses\Orders\OrderResponse;

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
        return OrderResponse::collection(
            response: $this->get(Endpoint::ORDERS->value, compact('market'))
        );
    }

    /**
     * Get order history
     *
     * @param string|null $market
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @param int|null $limit
     * @return OrderResponse[]
     */
    public function history(?string $market = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null, ?int $limit = null): array
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);
        return OrderResponse::collection(
            response: $this->get(Endpoint::ORDERS_HISTORY->value, compact('market', 'start_time', 'end_time', 'limit'))
        );
    }

    public function create(?array $attributes = []) : PendingOrder
    {
        return new PendingOrder($this, $attributes);
    }

    /**
     * Place order
     *
     * @param PendingOrder $pendingOrder
     * @return OrderResponse
     */
    public function place(PendingOrder $pendingOrder) : OrderResponse
    {
        return OrderResponse::fromResponse(
            response: $this->post(Endpoint::ORDERS->value, null, $pendingOrder->toArray())
        );
    }

    /**
     * Modify order
     *
     * @param PendingOrder $pendingOrder
     * @return OrderResponse
     */
    public function modify(PendingOrder $pendingOrder) : OrderResponse
    {
        return OrderResponse::fromResponse(
            response: $this->post(Endpoint::ORDERS->value, null, $pendingOrder->toArray())
        );
    }

    /**
     * Modify by client id order
     *
     * @param PendingOrder $pendingOrder
     * @return OrderResponse
     */
    public function modifyByClientID(PendingOrder $pendingOrder) : OrderResponse
    {
        return OrderResponse::fromResponse(
            response: $this->post(Endpoint::ORDERS->value, null, $pendingOrder->toArray())
        );
    }

    /**
     * Get order status
     *
     * @param string $orderId
     * @return OrderResponse
     */
    public function status(string $orderId) : OrderResponse
    {
        return OrderResponse::fromResponse(
            response: $this->get(Endpoint::ORDERS->withID($orderId))
        );
    }

    /**
     * Get order status by client ID
     *
     * @param string $orderId
     * @return OrderResponse
     */
    public function statusByClientID(string $orderId) : OrderResponse
    {
        return OrderResponse::fromResponse(
            response: $this->get(Endpoint::ORDERS->withID($orderId))
        );
    }

    /**
     * Cancel order
     *
     * @param string $orderId
     * @return CancelOrderResponse
     */
    public function cancel(string $orderId) : CancelOrderResponse
    {
        return CancelOrderResponse::fromResponse(
            $this->delete(Endpoint::ORDERS->withID($orderId))
        );
    }

    /**
     * Cancel order by client id
     *
     * @param string $orderId
     * @return CancelOrderResponse
     */
    public function cancelByClientID(string $orderId) : CancelOrderResponse
    {
        return CancelOrderResponse::fromResponse(
            response: $this->delete(Endpoint::ORDERS->withID($orderId))
        );
    }

    /**
     * Cancel all orders
     *
     * This will also cancel conditional orders (stop loss and trailing stop orders).
     * @param string|null $market
     * @param bool|null $conditionalOrdersOnly
     * @param bool|null $limitOrdersOnly
     * @return CancelOrderResponse
     */
    public function cancelAll(?string $market = null, ?bool $conditionalOrdersOnly = null, ?bool $limitOrdersOnly = null) : CancelOrderResponse
    {
        return CancelOrderResponse::fromResponse(
            response: $this->delete(Endpoint::ORDERS->value, null, compact('market', 'conditionalOrdersOnly', 'limitOrdersOnly'))
        );
    }
}
