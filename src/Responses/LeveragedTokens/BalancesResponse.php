<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Responses\AbstractResponser;

class BalancesResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $token,
        public readonly float $balance
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            token: $data['token'],
            balance: $data['balance']
        );
    }
}
