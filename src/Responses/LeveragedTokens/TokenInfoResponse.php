<?php
declare(strict_types=1);

namespace FTX\Responses\LeveragedTokens;

use FTX\Responses\AbstractResponser;

class TokenInfoResponse extends AbstractResponser
{
    private function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $underlying,
        public readonly float $leverage,
        public readonly float $outstanding,
        public readonly float $pricePerShare,
        public readonly object $positionsPerShare,
        public readonly object $basket,
        public readonly array $targetComponents,
        public readonly float $totalNav,
        public readonly float $totalCollateral,
        public readonly float $currentLeverage,
        public readonly float $positionPerShare,
        public readonly float $underlyingMark,
        public readonly string $contractAddress,
        public readonly float $change1h,
        public readonly float $change24h,
        public readonly float $changeBod,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            name: $data['name'],
            description: $data['description'],
            underlying: $data['underlying'],
            leverage: $data['leverage'],
            outstanding: $data['outstanding'],
            pricePerShare: $data['pricePerShare'],
            positionsPerShare: $data['positionsPerShare'],
            basket: $data['basket'],
            targetComponents: $data['targetComponents'],
            totalNav: $data['totalNav'],
            totalCollateral: $data['totalCollateral'],
            currentLeverage: $data['currentLeverage'],
            positionPerShare: $data['positionPerShare'],
            underlyingMark: $data['underlyingMark'],
            contractAddress: $data['contractAddress'],
            change1h: $data['change1h'],
            change24h: $data['change24h'],
            changeBod: $data['changeBod'],
        );
    }
}
