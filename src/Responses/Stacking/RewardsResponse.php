<?php
declare(strict_types=1);

namespace FTX\Responses\Stacking;

use FTX\Responses\AbstractResponser;

class RewardsResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly int $id,
        public readonly float $size,
        public readonly string $status,
        public readonly string $time,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            coin: $data['coin'],
            id: $data['id'],
            size: $data['size'],
            status: $data['status'],
            time: $data['time'],
        );
    }
}
