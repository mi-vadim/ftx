<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class LendingRatesResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float  $estimate,
        public readonly float  $previous,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            estimate: $response->getAttribute('estimate'),
            previous: $response->getAttribute('previous'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            estimate: $response['estimate'],
            previous: $response['previous'],
        );
    }
}
