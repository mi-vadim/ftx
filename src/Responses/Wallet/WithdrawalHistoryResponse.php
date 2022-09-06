<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class WithdrawalHistoryResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string  $coin,
        public readonly ?string  $address,
        public readonly ?string $tag,
        public readonly ?float   $fee,
        public readonly ?int     $id,
        public readonly ?float   $size,
        public readonly ?string  $status,
        public readonly ?string  $time,
        public readonly ?string  $method,
        public readonly ?string  $txid,
        public readonly ?string  $notes,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            address: $response->getAttribute('address'),
            tag: $response->getAttribute('tag'),
            fee: $response->getAttribute('fee'),
            id: $response->getAttribute('id'),
            size: $response->getAttribute('size'),
            status: $response->getAttribute('status'),
            time: $response->getAttribute('time'),
            method: $response->getAttribute('method'),
            txid: $response->getAttribute('txid'),
            notes: $response->getAttribute('notes'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            address: $response['address'],
            tag: $response['tag'],
            fee: $response['fee'],
            id: $response['id'],
            size: $response['size'],
            status: $response['status'],
            time: $response['time'],
            method: $response['method'],
            txid: $response['txid'],
            notes: $response['notes'],
        );
    }
}
