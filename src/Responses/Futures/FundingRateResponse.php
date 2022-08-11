<?php
declare(strict_types=1);

namespace FTX\Responses\Futures;

use FTX\Responses\AbstractResponser;

class FundingRateResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $future,
        public readonly float  $rate,
        public readonly string $time
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            future: $data['future'],
            rate: (float)$data['rate'],
            time: $data['time'],
        );
    }
}
