<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class WithdrawalFeesResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $method,
        public readonly string $address,
        public readonly float  $fee,
        public readonly bool   $congested,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            method: $response->getAttribute('method'),
            address: $response->getAttribute('address'),
            fee: $response->getAttribute('fee'),
            congested: $response->getAttribute('congested'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            method: $response['method'],
            address: $response['address'],
            fee: $response['fee'],
            congested: $response['congested'],
        );
    }
}
