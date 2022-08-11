<?php
declare(strict_types=1);

namespace FTX\Responses\Subaccount;

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

    public static function fromArray(array $data): static
    {
        return new self(
            id: $data['id'],
            coin: $data['coin'],
            size: $data['size'],
            time: $data['time'],
            notes: $data['notes'],
            status: $data['status'],
        );
    }
}
