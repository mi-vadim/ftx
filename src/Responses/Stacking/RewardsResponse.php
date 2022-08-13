<?php
declare(strict_types=1);

namespace FTX\Responses\Stacking;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class RewardsResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly int    $id,
        public readonly float  $size,
        public readonly string $status,
        public readonly string $time,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            id: $response->getAttribute('id'),
            size: $response->getAttribute('size'),
            status: $response->getAttribute('status'),
            time: $response->getAttribute('time'),
        );
    }

    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            id: $response['id'],
            size: $response['size'],
            status: $response['status'],
            time: $response['time'],
        );
    }
}
