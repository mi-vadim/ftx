<?php
declare(strict_types=1);

namespace FTX\Responses\Convert;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class RequestQuoteResponse extends AbstractResponser
{
    private function __construct(
        public readonly int $quoteId
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            quoteId: (int) $response->getAttribute('quoteId')
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            quoteId: (int) $response['quoteId']
        );
    }
}
