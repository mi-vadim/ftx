<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Client\HttpResponse;
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

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            createdAt: $response->getAttribute('createdAt'),
            filledSize: $response->getAttribute('filledSize'),
            future: $response->getAttribute('future'),
            id: $response->getAttribute('id'),
            market: $response->getAttribute('market'),
            price: $response->getAttribute('price'),
            remainingSize: $response->getAttribute('remainingSize'),
            side: $response->getAttribute('side'),
            size: $response->getAttribute('size'),
            status: $response->getAttribute('status'),
            type: $response->getAttribute('type'),
            reduceOnly: $response->getAttribute('reduceOnly'),
            ioc: $response->getAttribute('ioc'),
            postOnly: $response->getAttribute('postOnly'),
            clientId: $response->getAttribute('clientId'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            createdAt: $response['createdAt'],
            filledSize: $response['filledSize'],
            future: $response['future'],
            id: $response['id'],
            market: $response['market'],
            price: $response['price'],
            remainingSize: $response['remainingSize'],
            side: $response['side'],
            size: $response['size'],
            status: $response['status'],
            type: $response['type'],
            reduceOnly: $response['reduceOnly'],
            ioc: $response['ioc'],
            postOnly: $response['postOnly'],
            clientId: $response['clientId'],
        );
    }
}
