<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

class SnapshotResult
{
    public function __construct(
        public readonly ?string $account,
        public readonly ?string $ticker,
        public readonly ?float  $size,
        public readonly ?float  $price
    )
    {
    }
}
