<?php
declare(strict_types=1);

namespace FTX\Responses\Subaccount;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class BalanceResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $coin,
        public readonly float  $free,
        public readonly float  $total,
        public readonly float  $spotBorrow,
        public readonly float  $availableWithoutBorrow
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            free: $response->getAttribute('free'),
            total: $response->getAttribute('total'),
            spotBorrow: $response->getAttribute('spotBorrow'),
            availableWithoutBorrow: $response->getAttribute('availableWithoutBorrow'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            free: $response['free'],
            total: $response['total'],
            spotBorrow: $response['spotBorrow'],
            availableWithoutBorrow: $response['availableWithoutBorrow'],
        );
    }
}
