<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TokenCreationResponse extends AbstractResponser
{
    public function __construct(
        public readonly int    $id,
        public readonly string $token,
        public readonly int    $requestedSize,
        public readonly bool   $pending,
        public readonly int    $createdSize,
        public readonly float  $price,
        public readonly float  $cost,
        public readonly float  $fee,
        public readonly string $requestedAt,
        public readonly string $fulfilledAt,

    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            token: $response->getAttribute('token'),
            requestedSize: $response->getAttribute('requestedSize'),
            pending: $response->getAttribute('pending'),
            createdSize: $response->getAttribute('createdSize'),
            price: $response->getAttribute('price'),
            cost: $response->getAttribute('cost'),
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
            requestedSize: $response['requestedSize'],
            pending: $response['pending'],
            createdSize: $response['createdSize'],
            price: $response['price'],
            cost: $response['cost'],
            fee: $response['fee'],
            requestedAt: $response['requestedAt'],
            fulfilledAt: $response['fulfilledAt'],
        );
    }
}
