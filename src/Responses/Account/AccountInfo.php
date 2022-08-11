<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Responses\AbstractResponser;

class AccountInfo extends AbstractResponser
{
    public bool $backstopProvider;
    public float $collateral;
    public float $freeCollateral;
    public float $initialMarginRequirement;
    public bool $liquidating;
    public float $maintenanceMarginRequirement;
    public float $makerFee;
    public float $marginFraction;
    public float $openMarginFraction;
    public float $takerFee;
    public float $totalAccountValue;
    public float $totalPositionSize;
    public string $username;
    public float $leverage;

    public static function fromArray(array $data): static
    {
        $self = new self();

        $self->backstopProvider = (bool)$data['backstopProvider'];
        $self->collateral = (float)$data['collateral'];
        $self->freeCollateral = (float)$data['freeCollateral'];
        $self->initialMarginRequirement = (float)$data['initialMarginRequirement'];
        $self->liquidating = (bool)$data['liquidating'];
        $self->maintenanceMarginRequirement = (float)$data['maintenanceMarginRequirement'];
        $self->makerFee = (float)$data['makerFee'];
        $self->marginFraction = (float)$data['marginFraction'];
        $self->openMarginFraction = (float)$data['openMarginFraction'];
        $self->takerFee = (float)$data['takerFee'];
        $self->totalAccountValue = (float)$data['totalAccountValue'];
        $self->totalPositionSize = (float)$data['totalPositionSize'];
        $self->username = $data['username'];
        $self->leverage = (float)$data['leverage'];

        return $self;
    }
}
