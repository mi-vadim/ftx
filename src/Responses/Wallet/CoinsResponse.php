<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class CoinsResponse extends AbstractResponser
{
    public function __construct(
        public readonly bool    $canDeposit,
        public readonly bool    $canWithdraw,
        public readonly bool    $hasTag,
        public readonly string  $id,
        public readonly string  $name,
        public readonly ?string $bep2Asset,
        public readonly bool    $canConvert,
        public readonly bool    $collateral,
        public readonly float   $collateralWeight,
        public readonly ?string $creditTo,
        public readonly string  $erc20Contract,
        public readonly bool    $fiat,
        public readonly bool    $isToken,
        public readonly array   $methods,
        public readonly string  $splMint,
        public readonly string  $trc20Contract,
        public readonly bool    $usdFungible,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            canDeposit: $data['canDeposit'],
            canWithdraw: $data['canWithdraw'],
            hasTag: $data['hasTag'],
            id: $data['id'],
            name: $data['name'],
            bep2Asset: $data['bep2Asset'],
            canConvert: $data['canConvert'],
            collateral: $data['collateral'],
            collateralWeight: $data['collateralWeight'],
            creditTo: $data['creditTo'],
            erc20Contract: $data['erc20Contract'],
            fiat: $data['fiat'],
            isToken: $data['isToken'],
            methods: $data['methods'],
            splMint: $data['splMint'],
            trc20Contract: $data['trc20Contract'],
            usdFungible: $data['usdFungible'],
        );
    }
}
