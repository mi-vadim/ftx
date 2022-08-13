<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class DepositHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly int    $id,
        public readonly string $coin,
        public readonly ?string $txid,
        public readonly float $size,
        public readonly float  $fee,
        public readonly string $status,
        public readonly string $time,
        public readonly ?string $sentTime,
        public readonly ?string $confirmedTime,
        public readonly int    $confirmations,
        public readonly string $notes,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            confirmations: $response->getAttribute('confirmations'),
            confirmedTime: $response->getAttribute('confirmedTime'),
            fee: $response->getAttribute('fee'),
            id: $response->getAttribute('id'),
            sentTime: $response->getAttribute('sentTime'),
            size: $response->getAttribute('size'),
            status: $response->getAttribute('status'),
            time: $response->getAttribute('time'),
            txid: $response->getAttribute('txid'),
            notes: $response->getAttribute('notes'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            confirmations: $response['confirmations'] ?? 0,
            confirmedTime: $response['confirmedTime'] ?? null,
            fee: $response['fee'] ?? 0.0,
            id: $response['id'],
            sentTime: $response['sentTime'] ?? null,
            size: $response['size'],
            status: $response['status'],
            time: $response['time'],
            txid: $response['txid'] ?? null,
            notes: $response['notes'] ?? '',
        );
    }
}
