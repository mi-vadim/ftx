<?php
declare(strict_types=1);

namespace FTX\Responses\Futures;

use FTX\Client\HttpResponse;
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

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            volume: $response->getAttribute('volume'),
            nextFundingRate: $response->getAttribute('nextFundingRate'),
            nextFundingTime: $response->getAttribute('nextFundingTime'),
            expirationPrice: $response->getAttribute('expirationPrice'),
            predictedExpirationPrice: $response->getAttribute('predictedExpirationPrice'),
            openInterest: $response->getAttribute('openInterest'),
            strikePrice: $response->getAttribute('strikePrice'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            volume: $response['volume'],
            nextFundingRate: $response['nextFundingRate'],
            nextFundingTime: $response['nextFundingTime'],
            expirationPrice: $response['expirationPrice'],
            predictedExpirationPrice: $response['predictedExpirationPrice'],
            openInterest: $response['openInterest'],
            strikePrice: $response['strikePrice'],
        );
    }
}
