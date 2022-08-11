<?php
declare(strict_types=1);

namespace FTX\Responses\Latency;

use FTX\Responses\AbstractResponser;

class StatisticsResponse extends AbstractResponser
{
    private function __construct(
        public readonly bool  $bursty,
        public readonly float $p50,
        public readonly int   $requestCount,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            bursty: $data['bursty'],
            p50: (float)$data['p50'],
            requestCount: $data['requestCount'],
        );
    }
}
