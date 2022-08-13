<?php
declare(strict_types=1);

namespace FTX\Responses\Subaccount;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TransferResponse extends AbstractResponser
{
    public function __construct(
        public readonly int    $id,
        public readonly string $coin,
        public readonly float  $size,
        public readonly string $time,
        public readonly string $notes,
        public readonly string $status,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            coin: $response->getAttribute('coin'),
            size: $response->getAttribute('size'),
            time: $response->getAttribute('time'),
            notes: $response->getAttribute('notes'),
            status: $response->getAttribute('status'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            id: $response['id'],
            coin: $response['coin'],
            size: $response['size'],
            time: $response['time'],
            notes: $response['notes'],
            status: $response['status'],
        );
    }
}
