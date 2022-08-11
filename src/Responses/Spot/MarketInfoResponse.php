<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Responses\AbstractResponser;

class MarketInfoResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float $borrowed,
        public readonly float $free,
        public readonly float $estimatedRate,
        public readonly float $previousRate,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            borrowed: $data['borrowed'],
            free: $data['freeå'],
            estimatedRate: $data['estimatedRate'],
            previousRate: $data['previousRate'],
        );
    }
}
