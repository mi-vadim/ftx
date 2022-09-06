<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class BalancesResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?string $token,
        public readonly ?float  $balance
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            token: $response->getAttribute('token'),
            balance: $response->getAttribute('balance')
        );
    }
    public static function fromArray(array $response): static
    {
        return new self(
            token: $response['token'],
            balance: $response['balance']
        );
    }
}
