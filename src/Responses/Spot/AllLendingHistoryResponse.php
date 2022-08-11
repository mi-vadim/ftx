<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Responses\AbstractResponser;

class AllLendingHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly string $time,
        public readonly float $rate,
        public readonly float $size,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            time: $data['time'],
            rate: $data['rate'],
            size: $data['size'],
        );
    }
}
