<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TokenInfoResponse extends AbstractResponser
{
    private function __construct(
        public readonly ?string $name,
        public readonly ?string $description,
        public readonly ?string $underlying,
        public readonly ?float  $leverage,
        public readonly ?float  $outstanding,
        public readonly ?float  $pricePerShare,
        public readonly ?object $positionsPerShare,
        public readonly ?object $basket,
        public readonly ?array  $targetComponents,
        public readonly ?float  $totalNav,
        public readonly ?float  $totalCollateral,
        public readonly ?float  $currentLeverage,
        public readonly ?float  $positionPerShare,
        public readonly ?float  $underlyingMark,
        public readonly ?string $contractAddress,
        public readonly ?float  $change1h,
        public readonly ?float  $change24h,
        public readonly ?float  $changeBod,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            name: $response->getAttribute('name'),
            description: $response->getAttribute('description'),
            underlying: $response->getAttribute('underlying'),
            leverage: $response->getAttribute('leverage'),
            outstanding: $response->getAttribute('outstanding'),
            pricePerShare: $response->getAttribute('pricePerShare'),
            positionsPerShare: $response->getAttribute('positionsPerShare'),
            basket: $response->getAttribute('basket'),
            targetComponents: $response->getAttribute('targetComponents'),
            totalNav: $response->getAttribute('totalNav'),
            totalCollateral: $response->getAttribute('totalCollateral'),
            currentLeverage: $response->getAttribute('currentLeverage'),
            positionPerShare: $response->getAttribute('positionPerShare'),
            underlyingMark: $response->getAttribute('underlyingMark'),
            contractAddress: $response->getAttribute('contractAddress'),
            change1h: $response->getAttribute('change1h'),
            change24h: $response->getAttribute('change24h'),
            changeBod: $response->getAttribute('changeBod'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            name: $response['name'],
            description: $response['description'],
            underlying: $response['underlying'],
            leverage: $response['leverage'],
            outstanding: $response['outstanding'],
            pricePerShare: $response['pricePerShare'],
            positionsPerShare: $response['positionsPerShare'],
            basket: $response['basket'],
            targetComponents: $response['targetComponents'],
            totalNav: $response['totalNav'],
            totalCollateral: $response['totalCollateral'],
            currentLeverage: $response['currentLeverage'],
            positionPerShare: $response['positionPerShare'],
            underlyingMark: $response['underlyingMark'],
            contractAddress: $response['contractAddress'],
            change1h: $response['change1h'],
            change24h: $response['change24h'],
            changeBod: $response['changeBod'],
        );
    }
}
