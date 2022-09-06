<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TokenRedemptionResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?int    $id,
        public readonly ?string $token,
        public readonly ?float  $size,
        public readonly ?bool   $pending,
        public readonly ?float  $price,
        public readonly ?int    $proceeds,
        public readonly ?float  $fee,
        public readonly ?string $requestedAt,
        public readonly ?string $fulfilledAt,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            token: $response->getAttribute('token'),
            size: $response->getAttribute('size'),
            pending: $response->getAttribute('pending'),
            price: $response->getAttribute('price'),
            proceeds: $response->getAttribute('proceeds'),
            fee: $response->getAttribute('fee'),
            requestedAt: $response->getAttribute('requestedAt'),
            fulfilledAt: $response->getAttribute('fulfilledAt'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            id: $response['id'],
            token: $response['token'],
            size: $response['size'],
            pending: $response['pending'],
            price: $response['price'],
            proceeds: $response['proceeds'],
            fee: $response['fee'],
            requestedAt: $response['requestedAt'],
            fulfilledAt: $response['fulfilledAt'],
        );
    }
}
