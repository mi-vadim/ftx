<?php
declare(strict_types=1);

namespace FTX\Responses\Futures;

class HistoricalResponse extends \FTX\Responses\AbstractResponser
{
    private function __construct(
        public readonly string $startTime,
        public readonly float $open,
        public readonly float $close,
        public readonly float $high,
        public readonly float $low,
        public readonly ?float $volume
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            startTime: $data['startTime'],
            open: $data['open'],
            close: $data['close'],
            high: $data['high'],
            low: $data['low'],
            volume: $data['volume'],
        );
    }
}
