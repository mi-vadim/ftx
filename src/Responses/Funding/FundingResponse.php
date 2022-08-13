<?php
declare(strict_types=1);

namespace FTX\Responses\Funding;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class FundingResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $future,
        public readonly int    $id,
        public readonly float  $payment,
        public readonly string $time
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            future: $response->getAttribute('future'),
            id: $response->getAttribute('id'),
            payment: $response->getAttribute('payment'),
            time: $response->getAttribute('time'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            future: $response['future'],
            id: $response['id'],
            payment: $response['payment'],
            time: $response['time'],
        );
    }
}
