<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
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
            confirmations: $response['confirmations'],
            confirmedTime: $response['confirmedTime'],
            fee: $response['fee'],
            id: $response['id'],
            sentTime: $response['sentTime'],
            size: $response['size'],
            status: $response['status'],
            time: $response['time'],
            txid: $response['txid'],
            notes: $response['notes'],
        );
    }
}
