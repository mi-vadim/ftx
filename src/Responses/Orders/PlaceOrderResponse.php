<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Responses\AbstractResponser;

class PlaceOrderResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $createdAt,
        public readonly float  $filledSize,
        public readonly string $future,
        public readonly int    $id,
        public readonly string $market,
        public readonly float  $price,
        public readonly float  $remainingSize,
        public readonly string $side,
        public readonly float  $size,
        public readonly string $status,
        public readonly string $type,
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
            createdAt: $data['createdAt'],
            filledSize: $data['filledSize'],
            future: $data['future'],
            id: $data['id'],
            market: $data['market'],
            price: $data['price'],
            remainingSize: $data['remainingSize'],
            side: $data['side'],
            size: $data['size'],
            status: $data['status'],
            type: $data['type'],
            reduceOnly: $data['reduceOnly'],
            ioc: $data['ioc'],
            postOnly: $data['postOnly'],
            clientId: $data['clientId'],
        );
    }
}
