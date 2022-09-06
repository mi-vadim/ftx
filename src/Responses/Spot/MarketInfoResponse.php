<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class MarketInfoResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string $coin,
        public readonly ?float  $borrowed,
        public readonly ?float  $free,
        public readonly ?float  $estimatedRate,
        public readonly ?float  $previousRate,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            borrowed: $response->getAttribute('borrowed'),
            free: $response->getAttribute('free'),
            estimatedRate: $response->getAttribute('estimatedRate'),
            previousRate: $response->getAttribute('previousRate'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            borrowed: $response['borrowed'],
            free: $response['free'],
            estimatedRate: $response['estimatedRate'],
            previousRate: $response['previousRate'],
        );
    }
}
