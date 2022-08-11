<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class DepositHistoryResponse extends AbstractResponser
{

    public function __construct(
        public readonly string $coin,
        public readonly int    $confirmations,
        public readonly string $confirmedTime,
        public readonly float  $fee,
        public readonly int    $id,
        public readonly string $sentTime,
        public readonly string $size,
        public readonly string $status,
        public readonly string $time,
        public readonly string $txid,
        public readonly string $notes,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            confirmations: $data['confirmations'],
            confirmedTime: $data['confirmedTime'],
            fee: $data['fee'],
            id: $data['id'],
            sentTime: $data['sentTime'],
            size: $data['size'],
            status: $data['status'],
            time: $data['time'],
            txid: $data['txid'],
            notes: $data['notes'],
        );
    }
}
