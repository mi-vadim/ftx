<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Responses\AbstractResponser;

class TradesResponse extends AbstractResponser
{
    private function __construct(
        public readonly int    $id,
        public readonly bool   $liquidation,
        public readonly float  $price,
        public readonly string $side,
        public readonly float  $size,
        public readonly string $time,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: $data['id'],
            liquidation: $data['liquidation'],
            price: $data['price'],
            side: $data['side'],
            size: $data['size'],
            time: $data['time'],
        );
    }
}
