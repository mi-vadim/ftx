<?php
declare(strict_types=1);

namespace FTX\Responses\Market;

use FTX\Responses\AbstractResponser;

class OrderBookResponse extends AbstractResponser
{
    private function __construct(
        public readonly array $asks,
        public readonly array $bids
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            asks: $data['asks'],
            bids: $data['bids']
        );
    }
}
