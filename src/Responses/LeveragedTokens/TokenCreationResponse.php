<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Responses\AbstractResponser;

class TokenCreationResponse extends AbstractResponser
{
    public function __construct(
        public readonly int $id,
        public readonly string $token,
        public readonly int $requestedSize,
        public readonly bool $pending,
        public readonly int $createdSize,
        public readonly float $price,
        public readonly float $cost,
        public readonly float $fee,
        public readonly string $requestedAt,
        public readonly string $fulfilledAt,

    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            id: $data['id'],
            token: $data['token'],
            requestedSize: $data['requestedSize'],
            pending: $data['pending'],
            createdSize: $data['createdSize'],
            price: $data['price'],
            cost: $data['cost'],
            fee: $data['fee'],
            requestedAt: $data['requestedAt'],
            fulfilledAt: $data['fulfilledAt'],
        );
    }
}
