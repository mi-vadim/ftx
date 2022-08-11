<?php
declare(strict_types=1);

namespace FTX\Responses\Stacking;

use FTX\Responses\AbstractResponser;

class UnstakeResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly string $createdAt,
        public readonly int $id,
        public readonly float $size,
        public readonly string $status,
        public readonly string $unlockAt,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            createdAt: $data['createdAt'],
            id: $data['id'],
            size: $data['size'],
            status: $data['status'],
            unlockAt: $data['unlockAt'],
        );
    }
}
