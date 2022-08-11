<?php
declare(strict_types=1);

namespace FTX\Responses\Stacking;

use FTX\Responses\AbstractResponser;

class BalancesResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float $lifetimeRewards,
        public readonly float $scheduledToUnstake,
        public readonly float $staked
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            lifetimeRewards: $data['lifetimeRewards'],
            scheduledToUnstake: $data['scheduledToUnstake'],
            staked: $data['staked'],
        );
    }
}
