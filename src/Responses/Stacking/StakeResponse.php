<?php
declare(strict_types=1);

namespace FTX\Responses\Stacking;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class StakeResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly string $createdAt,
        public readonly int    $id,
        public readonly float  $size,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            createdAt: $response->getAttribute('createdAt'),
            id: $response->getAttribute('id'),
            size: $response->getAttribute('size'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            createdAt: $response['createdAt'],
            id: $response['id'],
            size: $response['size'],
        );
    }
}
