<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class WithdrawalFeesResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $method,
        public readonly string $address,
        public readonly float $fee,
        public readonly bool $congested,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            method: $data['method'],
            address: $data['address'],
            fee: $data['fee'],
            congested: $data['congested'],
        );
    }
}
