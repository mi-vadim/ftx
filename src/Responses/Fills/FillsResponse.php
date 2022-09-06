<?php
declare(strict_types=1);

namespace FTX\Responses\Fills;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class FillsResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?float  $fee,
        public readonly ?string $feeCurrency,
        public readonly ?float  $feeRate,
        public readonly ?string $future,
        public readonly ?int    $id,
        public readonly ?string $liquidity,
        public readonly ?string $market,
        public readonly ?string $baseCurrency,
        public readonly ?string $quoteCurrency,
        public readonly ?int    $orderId,
        public readonly ?int    $tradeId,
        public readonly ?float  $price,
        public readonly ?string $side,
        public readonly ?float  $size,
        public readonly ?string $time,
        public readonly ?string $type
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            fee: (float)$response->getAttribute('fee'),
            feeCurrency: $response->getAttribute('feeCurrency'),
            feeRate: (float)$response->getAttribute('feeRate'),
            future: $response->getAttribute('future'),
            id: $response->getAttribute('id'),
            liquidity: $response->getAttribute('liquidity'),
            market: $response->getAttribute('market'),
            baseCurrency: $response->getAttribute('baseCurrency'),
            quoteCurrency: $response->getAttribute('quoteCurrency'),
            orderId: $response->getAttribute('orderId'),
            tradeId: $response->getAttribute('tradeId'),
            price: (float)$response->getAttribute('price'),
            side: $response->getAttribute('side'),
            size: (float)$response->getAttribute('size'),
            time: $response->getAttribute('time'),
            type: $response->getAttribute('type1'),
        );
    }

    public static function fromArray(array $response): static
    {
        return new self(
            fee: (float)$response['fee'],
            feeCurrency: $response['feeCurrency'],
            feeRate: (float)$response['feeRate'],
            future: $response['future'],
            id: $response['id'],
            liquidity: $response['liquidity'],
            market: $response['market'],
            baseCurrency: $response['baseCurrency'],
            quoteCurrency: $response['quoteCurrency'],
            orderId: $response['orderId'],
            tradeId: $response['tradeId'],
            price: (float)$response['price'],
            side: $response['side'],
            size: (float)$response['size'],
            time: $response['time'],
            type: $response['type'],
        );
    }
}
