<?php
declare(strict_types=1);

namespace FTX\Responses\Funding;

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

    public static function fromArray(array $data): static
    {
        return new self(
            future: $data['future'],
            id: $data['id'],
            payment: $data['payment'],
            time: $data['time']
        );
    }
}
