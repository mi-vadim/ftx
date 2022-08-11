<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Responses\AbstractResponser;

class DailyBorrowedAmountResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float $size,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            size: $data['size'],
        );
    }
}
