<?php
declare(strict_types=1);

namespace FTX\Responses\Futures;

use FTX\Responses\AbstractResponser;

class FutureStatResponse extends AbstractResponser
{
    private function __construct(
        public readonly float  $volume,
        public readonly float  $nextFundingRate,
        public readonly string $nextFundingTime,
        public readonly float  $expirationPrice,
        public readonly float  $predictedExpirationPrice,
        public readonly float  $openInterest,
        public readonly float  $strikePrice
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            volume: $data['volume'],
            nextFundingRate: $data['nextFundingRate'],
            nextFundingTime: $data['nextFundingTime'],
            expirationPrice: $data['expirationPrice'],
            predictedExpirationPrice: $data['predictedExpirationPrice'],
            openInterest: $data['openInterest'],
            strikePrice: $data['strikePrice'],
        );
    }
}
