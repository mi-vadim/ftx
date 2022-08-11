<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Responses\AbstractResponser;

class Position extends AbstractResponser
{
    public function __construct(
        public readonly float  $cost,
        public readonly float  $cumulativeBuySize,
        public readonly float  $cumulativeSellSize,
        public readonly float  $entryPrice,
        public readonly float  $estimatedLiquidationPrice,
        public readonly string $future,
        public readonly float  $initialMarginRequirement,
        public readonly float  $longOrderSize,
        public readonly float  $maintenanceMarginRequirement,
        public readonly float  $netSize,
        public readonly float  $openSize,
        public readonly float  $realizedPnl,
        public readonly float  $recentAverageOpenPrice,
        public readonly float  $recentBreakEvenPrice,
        public readonly float  $recentPnl,
        public readonly float  $shortOrderSize,
        public readonly string $side,
        public readonly float  $size,
        public readonly float  $unrealizedPnl,
        public readonly float  $collateralUsed,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            cost: $data['cost'],
            cumulativeBuySize: $data['cumulativeBuySize'],
            cumulativeSellSize: $data['cumulativeSellSize'],
            entryPrice: $data['entryPrice'],
            estimatedLiquidationPrice: $data['estimatedLiquidationPrice'],
            future: $data['future'],
            initialMarginRequirement: $data['initialMarginRequirement'],
            longOrderSize: $data['longOrderSize'],
            maintenanceMarginRequirement: $data['maintenanceMarginRequirement'],
            netSize: $data['netSize'],
            openSize: $data['openSize'],
            realizedPnl: $data['realizedPnl'],
            recentAverageOpenPrice: $data['recentAverageOpenPrice'],
            recentBreakEvenPrice: $data['recentBreakEvenPrice'],
            recentPnl: $data['recentPnl'],
            shortOrderSize: $data['shortOrderSize'],
            side: $data['side'],
            size: $data['size'],
            unrealizedPnl: $data['unrealizedPnl'],
            collateralUsed: $data['collateralUsed'],
        );
    }
}
