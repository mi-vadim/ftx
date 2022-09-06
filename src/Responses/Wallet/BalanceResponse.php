<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class BalanceResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string $coin,
        public readonly ?float  $free,
        public readonly ?float  $spotBorrow,
        public readonly ?float  $total,
        public readonly ?float  $usdValue,
        public readonly ?float  $availableWithoutBorrow,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            free: $response->getAttribute('free'),
            spotBorrow: $response->getAttribute('spotBorrow'),
            total: $response->getAttribute('total'),
            usdValue: $response->getAttribute('usdValue'),
            availableWithoutBorrow: $response->getAttribute('availableWithoutBorrow'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            free: $response['free'],
            spotBorrow: $response['spotBorrow'],
            total: $response['total'],
            usdValue: $response['usdValue'],
            availableWithoutBorrow: $response['availableWithoutBorrow'],
        );
    }
}
