<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Responses\AbstractResponser;

class TriggerOrderResponse extends AbstractResponser
{
    private function __construct(
        public readonly string  $createdAt,
        public readonly ?string $error,
        public readonly string  $future,
        public readonly int     $id,
        public readonly string  $market,
        public readonly ?int    $orderId,
        public readonly float   $orderPrice,
        public readonly bool    $reduceOnly,
        public readonly string  $side,
        public readonly float   $size,
        public readonly string  $status,
        public readonly ?float  $trailStart,
        public readonly ?float  $trailValue,
        public readonly float   $triggerPrice,
        public readonly string  $triggeredAt,
        public readonly string  $type,
        public readonly string  $orderType,
        public readonly float   $filledSize,
        public readonly ?float  $avgFillPrice,
        public readonly bool    $retryUntilFilled,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            createdAt: $data['createdAt'],
            error: $data['error'],
            future: $data['future'],
            id: $data['id'],
            market: $data['market'],
            orderId: $data['orderId'],
            orderPrice: $data['orderPrice'],
            reduceOnly: $data['reduceOnly'],
            side: $data['side'],
            size: $data['size'],
            status: $data['status'],
            trailStart: $data['trailStart'],
            trailValue: $data['trailValue'],
            triggerPrice: $data['triggerPrice'],
            triggeredAt: $data['triggeredAt'],
            type: $data['type'],
            orderType: $data['orderType'],
            filledSize: $data['filledSize'],
            avgFillPrice: $data['avgFillPrice'],
            retryUntilFilled: $data['retryUntilFilled'],
        );
    }
}
