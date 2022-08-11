<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Responses\AbstractResponser;

class OrderResponse extends AbstractResponser
{
    private function __construct(
        public readonly int    $id,
        public readonly string $market,
        public readonly string $type,
        public readonly string $side,
        public readonly float  $price,
        public readonly float  $size,
        public readonly float  $filledSize,
        public readonly float  $remainingSize,
        public readonly float  $avgFillPrice,
        public readonly string $status,
        public readonly string $createdAt,
        public readonly bool   $reduceOnly,
        public readonly bool   $ioc,
        public readonly bool   $postOnly,
        public readonly string $clientId,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: $data['id'],
            market: $data['market'],
            type: $data['type'],
            side: $data['side'],
            price: $data['price'],
            size: $data['size'],
            filledSize: $data['filledSize'],
            remainingSize: $data['remainingSize'],
            avgFillPrice: $data['avgFillPrice'],
            status: $data['status'],
            createdAt: $data['createdAt'],
            reduceOnly: $data['reduceOnly'],
            ioc: $data['ioc'],
            postOnly: $data['postOnly'],
            clientId: $data['clientId'],
        );
    }
}
