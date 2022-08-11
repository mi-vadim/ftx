<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Responses\AbstractResponser;

class PlaceTriggerOrderResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $createdAt,
        public readonly string $future,
        public readonly int    $id,
        public readonly string $market,
        public readonly float  $triggerPrice,
        public readonly int    $orderId,
        public readonly string $side,
        public readonly float  $size,
        public readonly string $status,
        public readonly string $type,
        public readonly float  $orderPrice,
        public readonly string $error,
        public readonly string $triggeredAt,
        public readonly bool   $reduceOnly,
        public readonly string $orderType,
        public readonly bool   $retryUntilFilled,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            createdAt: $data['createdAt'],
            future: $data['future'],
            id: $data['id'],
            market: $data['market'],
            triggerPrice: $data['triggerPrice'],
            orderId: $data['orderId'],
            side: $data['side'],
            size: $data['size'],
            status: $data['status'],
            type: $data['type'],
            orderPrice: $data['orderPrice'],
            error: $data['error'],
            triggeredAt: $data['triggeredAt'],
            reduceOnly: $data['reduceOnly'],
            orderType: $data['orderType'],
            retryUntilFilled: $data['retryUntilFilled'],
        );
    }
}
