<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Responses\AbstractResponser;

class LendingOffersResponse extends AbstractResponser
{
    public function __construct(
        public readonly float $coin,
        public readonly float $rate,
        public readonly float $size,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            rate: $data['rate'],
            size: $data['size'],
        );
    }
}
