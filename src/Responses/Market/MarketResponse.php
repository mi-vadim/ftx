<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class MarketResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $name,
        public readonly ?string $baseCurrency,
        public readonly ?string $quoteCurrency,
        public readonly float  $quoteVolume24h,
        public readonly float  $change1h,
        public readonly float  $change24h,
        public readonly float  $changeBod,
        public readonly bool   $highLeverageFeeExempt,
        public readonly float  $minProvideSize,
        public readonly string $type,
        public readonly ?string $underlying,
        public readonly bool   $enabled,
        public readonly ?float  $ask,
        public readonly ?float  $bid,
        public readonly float  $last,
        public readonly bool   $postOnly,
        public readonly ?float  $price,
        public readonly float  $priceIncrement,
        public readonly float  $sizeIncrement,
        public readonly bool   $restricted,
        public readonly float  $volumeUsd24h,
        public readonly float  $largeOrderThreshold,
        public readonly bool   $isEtfMarket,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            name: $response->getAttribute('name'),
            baseCurrency: $response->getAttribute('baseCurrency'),
            quoteCurrency: $response->getAttribute('quoteCurrency'),
            quoteVolume24h: $response->getAttribute('quoteVolume24h'),
            change1h: $response->getAttribute('change1h'),
            change24h: $response->getAttribute('change24h'),
            changeBod: $response->getAttribute('changeBod'),
            highLeverageFeeExempt: $response->getAttribute('highLeverageFeeExempt'),
            minProvideSize: $response->getAttribute('minProvideSize'),
            type: $response->getAttribute('type'),
            underlying: $response->getAttribute('underlying'),
            enabled: $response->getAttribute('enabled'),
            ask: $response->getAttribute('ask'),
            bid: $response->getAttribute('bid'),
            last: $response->getAttribute('last'),
            postOnly: $response->getAttribute('postOnly'),
            price: $response->getAttribute('price'),
            priceIncrement: $response->getAttribute('priceIncrement'),
            sizeIncrement: $response->getAttribute('sizeIncrement'),
            restricted: $response->getAttribute('restricted'),
            volumeUsd24h: $response->getAttribute('volumeUsd24h'),
            largeOrderThreshold: $response->getAttribute('largeOrderThreshold'),
            isEtfMarket: $response->getAttribute('isEtfMarket'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            name: $response['name'],
            baseCurrency: $response['baseCurrency'],
            quoteCurrency: $response['quoteCurrency'],
            quoteVolume24h: $response['quoteVolume24h'],
            change1h: $response['change1h'],
            change24h: $response['change24h'],
            changeBod: $response['changeBod'],
            highLeverageFeeExempt: $response['highLeverageFeeExempt'],
            minProvideSize: $response['minProvideSize'],
            type: $response['type'],
            underlying: $response['underlying'],
            enabled: $response['enabled'],
            ask: $response['ask'],
            bid: $response['bid'],
            last: $response['last'],
            postOnly: $response['postOnly'],
            price: $response['price'],
            priceIncrement: $response['priceIncrement'],
            sizeIncrement: $response['sizeIncrement'],
            restricted: $response['restricted'],
            volumeUsd24h: $response['volumeUsd24h'],
            largeOrderThreshold: $response['largeOrderThreshold'],
            isEtfMarket: $response['isEtfMarket'],
        );
    }
}
