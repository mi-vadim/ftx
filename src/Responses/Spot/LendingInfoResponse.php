<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Responses\AbstractResponser;

class LendingInfoResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float $lendable,
        public readonly float $locked,
        public readonly float $minRate,
        public readonly float $offered,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            lendable: $data['lendable'],
            locked: $data['locked'],
            minRate: $data['minRate'],
            offered: $data['offered'],
        );
    }
}
