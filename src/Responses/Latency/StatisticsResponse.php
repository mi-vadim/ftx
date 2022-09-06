<?php
declare(strict_types=1);

namespace FTX\Responses\Latency;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class StatisticsResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?bool  $bursty,
        public readonly ?float $p50,
        public readonly ?int   $requestCount,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            bursty: $response->getAttribute('bursty'),
            p50: (float)$response->getAttribute('p50'),
            requestCount: $response->getAttribute('requestCount'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            bursty: $response['bursty'],
            p50: (float)$response['p50'],
            requestCount: $response['requestCount'],
        );
    }
}
