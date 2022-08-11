<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Responses\AbstractResponser;

class HistoricalResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $startTime,
        public readonly float $open,
        public readonly float $close,
        public readonly float $high,
        public readonly float $low,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            startTime: $data['startTime'],
            open: $data['open'],
            close: $data['close'],
            high: $data['high'],
            low: $data['low'],
        );
    }
}
