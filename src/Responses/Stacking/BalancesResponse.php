<?php
declare(strict_types=1);

namespace FTX\Responses\Stacking;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class BalancesResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string $coin,
        public readonly ?float  $lifetimeRewards,
        public readonly ?float  $scheduledToUnstake,
        public readonly ?float  $staked
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            lifetimeRewards: $response->getAttribute('lifetimeRewards'),
            scheduledToUnstake: $response->getAttribute('scheduledToUnstake'),
            staked: $response->getAttribute('staked'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            lifetimeRewards: $response['lifetimeRewards'],
            scheduledToUnstake: $response['scheduledToUnstake'],
            staked: $response['staked'],
        );
    }
}
