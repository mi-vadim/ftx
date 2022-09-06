<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class AllLendingHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string $coin,
        public readonly ?string $time,
        public readonly ?float  $rate,
        public readonly ?float  $size,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            time: $response->getAttribute('time'),
            rate: $response->getAttribute('rate'),
            size: $response->getAttribute('size'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            time: $response['time'],
            rate: $response['rate'],
            size: $response['size'],
        );
    }
}
