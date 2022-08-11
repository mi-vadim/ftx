<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class BalanceResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float  $free,
        public readonly float  $spotBorrow,
        public readonly float  $total,
        public readonly float  $usdValue,
        public readonly float  $availableWithoutBorrow,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            free: $data['free'],
            spotBorrow: $data['spotBorrow'],
            total: $data['total'],
            usdValue: $data['usdValue'],
            availableWithoutBorrow: $data['availableWithoutBorrow'],
        );
    }
}
