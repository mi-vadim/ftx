<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Responses\AbstractResponser;

class LendingHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float $proceeds,
        public readonly float $rate,
        public readonly float $size,
        public readonly string $time,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            proceeds: $data['proceeds'],
            rate: $data['rate'],
            size: $data['size'],
            time: $data['time'],
        );
    }
}
