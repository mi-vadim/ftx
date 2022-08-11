<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class WithdrawalHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly string  $coin,
        public readonly string  $address,
        public readonly ?string $tag,
        public readonly float   $fee,
        public readonly int     $id,
        public readonly float   $size,
        public readonly string  $status,
        public readonly string  $time,
        public readonly string  $method,
        public readonly string  $txid,
        public readonly string  $notes,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            address: $data['address'],
            tag: $data['tag'],
            fee: $data['fee'],
            id: $data['id'],
            size: $data['size'],
            status: $data['status'],
            time: $data['time'],
            method: $data['method'],
            txid: $data['txid'],
            notes: $data['notes'],
        );
    }
}
