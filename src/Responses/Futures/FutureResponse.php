<?php
declare(strict_types=1);

namespace FTX\Responses\Futures;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class FutureResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?float  $ask,
        public readonly ?float  $bid,
        public readonly ?float  $change1h,
        public readonly ?float  $change24h,
        public readonly string $description,
        public readonly bool   $enabled,
        public readonly bool   $expired,
        public readonly ?string $expiry,
        public readonly float  $index,
        public readonly ?float  $last,
        public readonly float  $lowerBound,
        public readonly float  $mark,
        public readonly string $name,
        public readonly bool   $perpetual,
        public readonly bool   $postOnly,
        public readonly float  $priceIncrement,
        public readonly float  $sizeIncrement,
        public readonly string $underlying,
        public readonly float  $upperBound,
        public readonly string $type,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            ask: $response->getAttribute('ask'),
            bid: $response->getAttribute('bid'),
            change1h: $response->getAttribute('change1h'),
            change24h: $response->getAttribute('change24h'),
            description: $response->getAttribute('description'),
            enabled: $response->getAttribute('enabled'),
            expired: $response->getAttribute('expired'),
            expiry: $response->getAttribute('expiry'),
            index: $response->getAttribute('index'),
            last: $response->getAttribute('last'),
            lowerBound: $response->getAttribute('lowerBound'),
            mark: $response->getAttribute('mark'),
            name: $response->getAttribute('name'),
            perpetual: $response->getAttribute('perpetual'),
            postOnly: $response->getAttribute('postOnly'),
            priceIncrement: $response->getAttribute('priceIncrement'),
            sizeIncrement: $response->getAttribute('sizeIncrement'),
            underlying: $response->getAttribute('underlying'),
            upperBound: $response->getAttribute('upperBound'),
            type: $response->getAttribute('type')
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            ask: $response['ask'],
            bid: $response['bid'],
            change1h: $response['change1h'] ?? null,
            change24h: $response['change24h'] ?? null,
            description: $response['description'],
            enabled: $response['enabled'],
            expired: $response['expired'],
            expiry: $response['expiry'],
            index: $response['index'],
            last: $response['last'],
            lowerBound: $response['lowerBound'],
            mark: $response['mark'],
            name: $response['name'],
            perpetual: $response['perpetual'],
            postOnly: $response['postOnly'],
            priceIncrement: $response['priceIncrement'],
            sizeIncrement: $response['sizeIncrement'],
            underlying: $response['underlying'],
            upperBound: $response['upperBound'],
            type: $response['type']
        );
    }
}
