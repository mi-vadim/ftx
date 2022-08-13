<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
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

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            canDeposit: $response->getAttribute('canDeposit'),
            canWithdraw: $response->getAttribute('canWithdraw'),
            hasTag: $response->getAttribute('hasTag'),
            id: $response->getAttribute('id'),
            name: $response->getAttribute('name'),
            bep2Asset: $response->getAttribute('bep2Asset'),
            canConvert: $response->getAttribute('canConvert'),
            collateral: $response->getAttribute('collateral'),
            collateralWeight: $response->getAttribute('collateralWeight'),
            creditTo: $response->getAttribute('creditTo'),
            erc20Contract: $response->getAttribute('erc20Contract'),
            fiat: $response->getAttribute('fiat'),
            isToken: $response->getAttribute('isToken'),
            methods: $response->getAttribute('methods'),
            splMint: $response->getAttribute('splMint'),
            trc20Contract: $response->getAttribute('trc20Contract'),
            usdFungible: $response->getAttribute('usdFungible'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            canDeposit: $response['canDeposit'],
            canWithdraw: $response['canWithdraw'],
            hasTag: $response['hasTag'],
            id: $response['id'],
            name: $response['name'],
            bep2Asset: $response['bep2Asset'],
            canConvert: $response['canConvert'],
            collateral: $response['collateral'],
            collateralWeight: $response['collateralWeight'],
            creditTo: $response['creditTo'],
            erc20Contract: $response['erc20Contract'],
            fiat: $response['fiat'],
            isToken: $response['isToken'],
            methods: $response['methods'],
            splMint: $response['splMint'],
            trc20Contract: $response['trc20Contract'],
            usdFungible: $response['usdFungible'],
        );
    }
}
