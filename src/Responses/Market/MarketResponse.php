<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Responses\AbstractResponser;

class MarketResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $name,
        public readonly string $baseCurrency,
        public readonly string $quoteCurrency,
        public readonly float $quoteVolume24h,
        public readonly float $change1h,
        public readonly float $change24h,
        public readonly float $changeBod,
        public readonly bool $highLeverageFeeExempt,
        public readonly float $minProvideSize,
        public readonly string $type,
        public readonly string $underlying,
        public readonly bool $enabled,
        public readonly float $ask,
        public readonly float $bid,
        public readonly float $last,
        public readonly bool $postOnly,
        public readonly float $price,
        public readonly float $priceIncrement,
        public readonly float $sizeIncrement,
        public readonly bool $restricted,
        public readonly float $volumeUsd24h,
        public readonly float $largeOrderThreshold,
        public readonly bool $isEtfMarket,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            name: $data['name'],
            baseCurrency: $data['baseCurrency'],
            quoteCurrency: $data['quoteCurrency'],
            quoteVolume24h: $data['quoteVolume24h'],
            change1h: $data['change1h'],
            change24h: $data['change24h'],
            changeBod: $data['changeBod'],
            highLeverageFeeExempt: $data['highLeverageFeeExempt'],
            minProvideSize: $data['minProvideSize'],
            type: $data['type'],
            underlying: $data['underlying'],
            enabled: $data['enabled'],
            ask: $data['ask'],
            bid: $data['bid'],
            last: $data['last'],
            postOnly: $data['postOnly'],
            price: $data['price'],
            priceIncrement: $data['priceIncrement'],
            sizeIncrement: $data['sizeIncrement'],
            restricted: $data['restricted'],
            volumeUsd24h: $data['volumeUsd24h'],
            largeOrderThreshold: $data['largeOrderThreshold'],
            isEtfMarket: $data['isEtfMarket'],
        );
    }
}
