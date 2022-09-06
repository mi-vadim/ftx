<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class OrderBookResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?array $asks,
        public readonly ?array $bids
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            asks: $response->getAttribute('asks'),
            bids: $response->getAttribute('bids')
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            asks: $response['asks'],
            bids: $response['bids']
        );
    }
}
