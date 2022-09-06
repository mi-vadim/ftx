<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class LendingOffersResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?float $coin,
        public readonly ?float $rate,
        public readonly ?float $size,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            rate: $response->getAttribute('rate'),
            size: $response->getAttribute('size'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            rate: $response['rate'],
            size: $response['size'],
        );
    }
}
