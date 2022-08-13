<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class DailyBorrowedAmountResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float  $size,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            size: $response->getAttribute('size'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            size: $response['size'],
        );
    }
}
