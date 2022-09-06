<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class DepositHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?int    $id,
        public readonly ?string $coin,
        public readonly ?string $txid,
        public readonly ?float $size,
        public readonly ?float  $fee,
        public readonly ?string $status,
        public readonly ?string $time,
        public readonly ?string $sentTime,
        public readonly ?string $confirmedTime,
        public readonly ?int    $confirmations,
        public readonly ?string $notes,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            coin: $response->getAttribute('coin'),
            txid: $response->getAttribute('txid'),
            size: $response->getAttribute('size'),
            fee: $response->getAttribute('fee'),
            status: $response->getAttribute('status'),
            time: $response->getAttribute('time'),
            sentTime: $response->getAttribute('sentTime'),
            confirmedTime: $response->getAttribute('confirmedTime'),
            confirmations: $response->getAttribute('confirmations'),
            notes: $response->getAttribute('notes'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            id: $response['id'],
            coin: $response['coin'],
            txid: $response['txid'] ?? null,
            size: $response['size'],
            fee: $response['fee'] ?? 0.0,
            status: $response['status'],
            time: $response['time'],
            sentTime: $response['sentTime'] ?? null,
            confirmedTime: $response['confirmedTime'] ?? null,
            confirmations: $response['confirmations'] ?? 0,
            notes: $response['notes'] ?? '',
        );
    }
}
