<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class AccountInfo extends AbstractResponser
{
    public function __construct(
        public readonly ?bool   $backstopProvider,
        public readonly ?float  $collateral,
        public readonly ?float  $freeCollateral,
        public readonly ?float  $initialMarginRequirement,
        public readonly ?bool   $liquidating,
        public readonly ?float  $maintenanceMarginRequirement,
        public readonly ?float  $makerFee,
        public readonly ?float  $marginFraction,
        public readonly ?float  $openMarginFraction,
        public readonly ?float  $takerFee,
        public readonly ?float  $totalAccountValue,
        public readonly ?float  $totalPositionSize,
        public readonly ?string $username,
        public readonly ?float  $leverage,
    )
    {
    }

    public static function fromArray(array $response): static
    {
        return new self(
            backstopProvider: $response['backstopProvider'],
            collateral: $response['collateral'],
            freeCollateral: $response['freeCollateral'],
            initialMarginRequirement: $response['initialMarginRequirement'],
            liquidating: $response['liquidating'],
            maintenanceMarginRequirement: $response['maintenanceMarginRequirement'],
            makerFee: $response['makerFee'],
            marginFraction: $response['marginFraction'],
            openMarginFraction: $response['openMarginFraction'],
            takerFee: $response['takerFee'],
            totalAccountValue: $response['totalAccountValue'],
            totalPositionSize: $response['totalPositionSize'],
            username: $response['username'],
            leverage: $response['leverage'],
        );
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            backstopProvider: $response->getAttribute('backstopProvider'),
            collateral: $response->getAttribute('collateral'),
            freeCollateral: $response->getAttribute('freeCollateral'),
            initialMarginRequirement: $response->getAttribute('initialMarginRequirement'),
            liquidating: $response->getAttribute('liquidating'),
            maintenanceMarginRequirement: $response->getAttribute('maintenanceMarginRequirement'),
            makerFee: $response->getAttribute('makerFee'),
            marginFraction: $response->getAttribute('marginFraction'),
            openMarginFraction: $response->getAttribute('openMarginFraction'),
            takerFee: $response->getAttribute('takerFee'),
            totalAccountValue: $response->getAttribute('totalAccountValue'),
            totalPositionSize: $response->getAttribute('totalPositionSize'),
            username: $response->getAttribute('username'),
            leverage: $response->getAttribute('leverage'),
        );
    }
}
