<?php
declare(strict_types=1);

namespace FTX\Responses\Convert;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class QuoteStatusResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?string $baseCoin,
        public readonly ?float  $cost,
        public readonly ?bool   $expired,
        public readonly ?bool   $filled,
        public readonly ?int    $id,
        public readonly ?float  $price,
        public readonly ?float  $proceeds,
        public readonly ?string $quoteCoin,
        public readonly ?string $side,
        public readonly ?string $toCoin
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            baseCoin:   $response->getAttribute('baseCoin'),
            cost:       (float) $response->getAttribute('cost'),
            expired:    $response->getAttribute('expired'),
            filled:     $response->getAttribute('filled'),
            id:         $response->getAttribute('id'),
            price:      (float) $response->getAttribute('price'),
            proceeds:   (float) $response->getAttribute('proceeds'),
            quoteCoin:  $response->getAttribute('quoteCoin'),
            side:       $response->getAttribute('side'),
            toCoin:     $response->getAttribute('toCoin'),
        );
    }    
    
    public static function fromArray(array $response): static
    {
        return new self(
            baseCoin:   $response['baseCoin'],
            cost:       (float) $response['cost'],
            expired:    $response['expired'],
            filled:     $response['filled'],
            id:         $response['id'],
            price:      (float) $response['price'],
            proceeds:   (float) $response['proceeds'],
            quoteCoin:  $response['quoteCoin'],
            side:       $response['side'],
            toCoin:     $response['toCoin'],
        );
    }
}
