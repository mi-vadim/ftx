<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class Position extends AbstractResponser
{
    public function __construct(
        public readonly ?float  $cost,
        public readonly ?float  $cumulativeBuySize,
        public readonly ?float  $cumulativeSellSize,
        public readonly ?float  $entryPrice,
        public readonly ?float  $estimatedLiquidationPrice,
        public readonly ?string $future,
        public readonly ?float  $initialMarginRequirement,
        public readonly ?float  $longOrderSize,
        public readonly ?float  $maintenanceMarginRequirement,
        public readonly ?float  $netSize,
        public readonly ?float  $openSize,
        public readonly ?float  $realizedPnl,
        public readonly ?float  $recentAverageOpenPrice,
        public readonly ?float  $recentBreakEvenPrice,
        public readonly ?float  $recentPnl,
        public readonly ?float  $shortOrderSize,
        public readonly ?string $side,
        public readonly ?float  $size,
        public readonly ?float  $unrealizedPnl,
        public readonly ?float  $collateralUsed,
    )
    {
    }

    public static function fromArray(array $response): static
    {
        return new self(
            cost: $response['cost'],
            cumulativeBuySize: $response['cumulativeBuySize'],
            cumulativeSellSize: $response['cumulativeSellSize'],
            entryPrice: $response['entryPrice'],
            estimatedLiquidationPrice: $response['estimatedLiquidationPrice'],
            future: $response['future'],
            initialMarginRequirement: $response['initialMarginRequirement'],
            longOrderSize: $response['longOrderSize'],
            maintenanceMarginRequirement: $response['maintenanceMarginRequirement'],
            netSize: $response['netSize'],
            openSize: $response['openSize'],
            realizedPnl: $response['realizedPnl'],
            recentAverageOpenPrice: $response['recentAverageOpenPrice'],
            recentBreakEvenPrice: $response['recentBreakEvenPrice'],
            recentPnl: $response['recentPnl'],
            shortOrderSize: $response['shortOrderSize'],
            side: $response['side'],
            size: $response['size'],
            unrealizedPnl: $response['unrealizedPnl'],
            collateralUsed: $response['collateralUsed']
        );
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            cost: $response->getAttribute('cost'),
            cumulativeBuySize: $response->getAttribute('cumulativeBuySize'),
            cumulativeSellSize: $response->getAttribute('cumulativeSellSize'),
            entryPrice: $response->getAttribute('entryPrice'),
            estimatedLiquidationPrice: $response->getAttribute('estimatedLiquidationPrice'),
            future: $response->getAttribute('future'),
            initialMarginRequirement: $response->getAttribute('initialMarginRequirement'),
            longOrderSize: $response->getAttribute('longOrderSize'),
            maintenanceMarginRequirement: $response->getAttribute('maintenanceMarginRequirement'),
            netSize: $response->getAttribute('netSize'),
            openSize: $response->getAttribute('openSize'),
            realizedPnl: $response->getAttribute('realizedPnl'),
            recentAverageOpenPrice: $response->getAttribute('recentAverageOpenPrice'),
            recentBreakEvenPrice: $response->getAttribute('recentBreakEvenPrice'),
            recentPnl: $response->getAttribute('recentPnl'),
            shortOrderSize: $response->getAttribute('shortOrderSize'),
            side: $response->getAttribute('side'),
            size: $response->getAttribute('size'),
            unrealizedPnl: $response->getAttribute('unrealizedPnl'),
            collateralUsed: $response->getAttribute('collateralUsed'),
        );
    }
}
