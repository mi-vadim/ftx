<?php
declare(strict_types=1);

namespace FTX\Responses\Fills;

use FTX\Responses\AbstractResponser;

class FillsResponse extends AbstractResponser
{
    private function __construct(
        public readonly float  $fee,
        public readonly string $feeCurrency,
        public readonly float  $feeRate,
        public readonly string $future,
        public readonly int    $id,
        public readonly string $liquidity,
        public readonly string $market,
        public readonly string $baseCurrency,
        public readonly string $quoteCurrency,
        public readonly int    $orderId,
        public readonly int    $tradeId,
        public readonly float  $price,
        public readonly string $side,
        public readonly float  $size,
        public readonly string $time,
        public readonly string $type
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            fee: (float)$data['fee'],
            feeCurrency: $data['feeCurrency'],
            feeRate: (float)$data['feeRate'],
            future: $data['future'],
            id: $data['id'],
            liquidity: $data['liquidity'],
            market: $data['market'],
            baseCurrency: $data['baseCurrency'],
            quoteCurrency: $data['quoteCurrency'],
            orderId: $data['orderId'],
            tradeId: $data['tradeId'],
            price: (float)$data['price'],
            side: $data['side'],
            size: (float)$data['size'],
            time: $data['time'],
            type: $data['type1']
        );
    }
}
