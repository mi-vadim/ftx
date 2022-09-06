<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TradesResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?int    $id,
        public readonly ?bool   $liquidation,
        public readonly ?float  $price,
        public readonly ?string $side,
        public readonly ?float  $size,
        public readonly ?string $time,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            liquidation: $response->getAttribute('liquidation'),
            price: $response->getAttribute('price'),
            side: $response->getAttribute('side'),
            size: $response->getAttribute('size'),
            time: $response->getAttribute('time'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            id: $response['id'],
            liquidation: $response['liquidation'],
            price: $response['price'],
            side: $response['side'],
            size: $response['size'],
            time: $response['time'],
        );
    }
}
