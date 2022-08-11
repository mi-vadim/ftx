<?php
declare(strict_types=1);

namespace FTX\Responses\Futures;

use FTX\Responses\AbstractResponser;

class FutureResponse extends AbstractResponser
{
    private function __construct(
        public readonly float $ask,
        public readonly float $bid,
        public readonly float $change1h,
        public readonly float $change24h,
        public readonly string $description,
        public readonly bool $enabled,
        public readonly bool $expired,
        public readonly string $expiry,
        public readonly float $index,
        public readonly float $last,
        public readonly float $lowerBound,
        public readonly float $mark,
        public readonly string $name,
        public readonly bool $perpetual,
        public readonly bool $postOnly,
        public readonly float $priceIncrement,
        public readonly float $sizeIncrement,
        public readonly string $underlying,
        public readonly float $upperBound,
        public readonly string $type,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            ask: $data['ask'],
            bid: $data['bid'],
            change1h: $data['change1h'],
            change24h: $data['change24h'],
            description: $data['description'],
            enabled: $data['enabled'],
            expired: $data['expired'],
            expiry: $data['expiry'],
            index: $data['index'],
            last: $data['last'],
            lowerBound: $data['lowerBound'],
            mark: $data['mark'],
            name: $data['name'],
            perpetual: $data['perpetual'],
            postOnly: $data['postOnly'],
            priceIncrement: $data['priceIncrement'],
            sizeIncrement: $data['sizeIncrement'],
            underlying: $data['underlying'],
            upperBound: $data['upperBound'],
            type: $data['type']
        );
    }
}
