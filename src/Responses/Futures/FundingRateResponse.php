<?php
declare(strict_types=1);

namespace FTX\Responses\Futures;

use FTX\Client\HttpResponse;
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

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            future: $response->getAttribute('future'),
            rate: (float)$response->getAttribute('rate'),
            time: $response->getAttribute('time'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            future: $response['future'],
            rate: (float)$response['rate'],
            time: $response['time'],
        );
    }
}
