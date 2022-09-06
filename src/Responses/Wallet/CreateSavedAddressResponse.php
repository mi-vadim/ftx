<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class CreateSavedAddressResponse extends AbstractResponser
{
    public function __construct(
        public readonly ?string $address,
        public readonly ?string $coin,
        public readonly ?bool   $fiat,
        public readonly ?int    $id,
        public readonly ?bool   $isPrimetrust,
        public readonly ?bool   $isSwipeCard,
        public readonly ?string $lastUsedAt,
        public readonly ?string $name,
        public readonly ?string $tag,
        public readonly ?string $wallet,
        public readonly ?bool   $whitelisted,
        public readonly ?string $whitelistedAfter,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            address: $response->getAttribute('address'),
            coin: $response->getAttribute('coin'),
            fiat: $response->getAttribute('fiat'),
            id: $response->getAttribute('id'),
            isPrimetrust: $response->getAttribute('isPrimetrust'),
            isSwipeCard: $response->getAttribute('isSwipeCard'),
            lastUsedAt: $response->getAttribute('lastUsedAt'),
            name: $response->getAttribute('name'),
            tag: $response->getAttribute('tag'),
            wallet: $response->getAttribute('wallet'),
            whitelisted: $response->getAttribute('whitelisted'),
            whitelistedAfter: $response->getAttribute('whitelistedAfter1')
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            address: $response['address'],
            coin: $response['coin'],
            fiat: $response['fiat'],
            id: $response['id'],
            isPrimetrust: $response['isPrimetrust'],
            isSwipeCard: $response['isSwipeCard'],
            lastUsedAt: $response['lastUsedAt'],
            name: $response['name'],
            tag: $response['tag'],
            wallet: $response['wallet'],
            whitelisted: $response['whitelisted'],
            whitelistedAfter: $response['whitelistedAfter1']
        );
    }
}
