<?php
declare(strict_types=1);

namespace FTX\Responses\Convert;

use FTX\Responses\AbstractResponser;

class RequestQuoteResponse extends AbstractResponser
{
    private function __construct(
        public readonly int $quoteId
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            quoteId: (int)$data['quoteId']
        );
    }
}
