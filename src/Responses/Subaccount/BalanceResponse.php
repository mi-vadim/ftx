<?php
declare(strict_types=1);

namespace FTX\Responses\Subaccount;

use FTX\Responses\AbstractResponser;

class BalanceResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float  $free,
        public readonly float  $total,
        public readonly float  $spotBorrow,
        public readonly float  $availableWithoutBorrow
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            free: $data['free'],
            total: $data['total'],
            spotBorrow: $data['spotBorrow'],
            availableWithoutBorrow: $data['availableWithoutBorrow'],
        );
    }
}
