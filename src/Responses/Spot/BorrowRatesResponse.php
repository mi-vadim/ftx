<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Responses\AbstractResponser;

class BorrowRatesResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float  $estimate,
        public readonly float  $previous,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            estimate: $data['estimate'],
            previous: $data['previous'],
        );
    }
}
