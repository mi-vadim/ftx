<?php
declare(strict_types=1);

namespace FTX\Responses\Convert;

class RequestQuoteResponse extends \FTX\Responses\AbstractResponser
{
    private function __construct(
        public readonly int $quoteId
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            quoteId: (int) $data['quoteId']
        );
    }
}
