<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class OrderResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?int    $id,
        public readonly ?string $market,
        public readonly ?string $type,
        public readonly ?string $side,
        public readonly ?float  $price,
        public readonly ?float  $size,
        public readonly ?float  $filledSize,
        public readonly ?float  $remainingSize,
        public readonly ?float  $avgFillPrice,
        public readonly ?string $status,
        public readonly ?string $createdAt,
        public readonly ?bool   $reduceOnly,
        public readonly ?bool   $ioc,
        public readonly ?bool   $postOnly,
        public readonly ?string $clientId,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            market: $response->getAttribute('market'),
            type: $response->getAttribute('type'),
            side: $response->getAttribute('side'),
            price: $response->getAttribute('price'),
            size: $response->getAttribute('size'),
            filledSize: $response->getAttribute('filledSize'),
            remainingSize: $response->getAttribute('remainingSize'),
            avgFillPrice: $response->getAttribute('avgFillPrice'),
            status: $response->getAttribute('status'),
            createdAt: $response->getAttribute('createdAt'),
            reduceOnly: $response->getAttribute('reduceOnly'),
            ioc: $response->getAttribute('ioc'),
            postOnly: $response->getAttribute('postOnly'),
            clientId: $response->getAttribute('clientId'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            id: $response['id'],
            market: $response['market'],
            type: $response['type'],
            side: $response['side'],
            price: $response['price'],
            size: $response['size'],
            filledSize: $response['filledSize'],
            remainingSize: $response['remainingSize'],
            avgFillPrice: $response['avgFillPrice'],
            status: $response['status'],
            createdAt: $response['createdAt'],
            reduceOnly: $response['reduceOnly'],
            ioc: $response['ioc'],
            postOnly: $response['postOnly'],
            clientId: $response['clientId'],
        );
    }
}
