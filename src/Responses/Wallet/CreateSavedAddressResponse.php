<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class CreateSavedAddressResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $address,
        public readonly string $coin,
        public readonly bool   $fiat,
        public readonly int    $id,
        public readonly bool   $isPrimetrust,
        public readonly bool   $isSwipeCard,
        public readonly string $lastUsedAt,
        public readonly string $name,
        public readonly string $tag,
        public readonly string $wallet,
        public readonly bool   $whitelisted,
        public readonly string $whitelistedAfter,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            address: $data['address'],
            coin: $data['coin'],
            fiat: $data['fiat'],
            id: $data['id'],
            isPrimetrust: $data['isPrimetrust'],
            isSwipeCard: $data['isSwipeCard'],
            lastUsedAt: $data['lastUsedAt'],
            name: $data['name'],
            tag: $data['tag'],
            wallet: $data['wallet'],
            whitelisted: $data['whitelisted'],
            whitelistedAfter: $data['whitelistedAfter1']
        );
    }
}
