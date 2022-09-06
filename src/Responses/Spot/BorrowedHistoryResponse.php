<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class BorrowedHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string $coin,
        public readonly ?float  $cost,
        public readonly ?float  $rate,
        public readonly ?float  $size,
        public readonly ?string $time,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            cost: $response->getAttribute('cost'),
            rate: $response->getAttribute('rate'),
            size: $response->getAttribute('size'),
            time: $response->getAttribute('time'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            cost: $response['cost'],
            rate: $response['rate'],
            size: $response['size'],
            time: $response['time'],
        );
    }
}
