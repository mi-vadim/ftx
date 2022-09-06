<?php
declare(strict_types=1);

namespace FTX\Responses\Spot;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class LendingInfoResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string $coin,
        public readonly ?float  $lendable,
        public readonly ?float  $locked,
        public readonly ?float  $minRate,
        public readonly ?float  $offered,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            coin: $response->getAttribute('coin'),
            lendable: $response->getAttribute('lendable'),
            locked: $response->getAttribute('locked'),
            minRate: $response->getAttribute('minRate'),
            offered: $response->getAttribute('offered'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            coin: $response['coin'],
            lendable: $response['lendable'],
            locked: $response['locked'],
            minRate: $response['minRate'],
            offered: $response['offered'],
        );
    }
}
