<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Responses\AbstractResponser;

class TokenRedemptionResponse extends AbstractResponser
{
    private function __construct(
        public readonly int $id,
        public readonly string $token,
        public readonly float $size,
        public readonly bool $pending,
        public readonly float $price,
        public readonly int $proceeds,
        public readonly float $fee,
        public readonly string $requestedAt,
        public readonly string $fulfilledAt,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            id: $data['id'],
            token: $data['token'],
            size: $data['size'],
            pending: $data['pending'],
            price: $data['price'],
            proceeds: $data['proceeds'],
            fee: $data['fee'],
            requestedAt: $data['requestedAt'],
            fulfilledAt: $data['fulfilledAt'],
        );
    }
}
