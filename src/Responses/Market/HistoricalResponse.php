<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class HistoricalResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $startTime,
        public readonly float  $open,
        public readonly float  $close,
        public readonly float  $high,
        public readonly float  $low,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            startTime: $response->getAttribute('startTime'),
            open: $response->getAttribute('open'),
            close: $response->getAttribute('close'),
            high: $response->getAttribute('high'),
            low: $response->getAttribute('low'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            startTime: $response['startTime'],
            open: $response['open'],
            close: $response['close'],
            high: $response['high'],
            low: $response['low'],
        );
    }
}
