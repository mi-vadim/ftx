<?php
declare(strict_types=1);

namespace FTX\Responses\Convert;

use FTX\Responses\AbstractResponser;

class QuoteStatusResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $baseCoin,
        public readonly float  $cost,
        public readonly bool   $expired,
        public readonly bool   $filled,
        public readonly int    $id,
        public readonly float  $price,
        public readonly float  $proceeds,
        public readonly string $quoteCoin,
        public readonly string $side,
        public readonly string $toCoin
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            baseCoin: $data['baseCoin'],
            cost: (float)$data['cost'],
            expired: $data['expired'],
            filled: $data['filled'],
            id: $data['id'],
            price: (float)$data['price'],
            proceeds: (float)$data['proceeds'],
            quoteCoin: $data['quoteCoin'],
            side: $data['side'],
            toCoin: $data['toCoin']
        );
    }
}
