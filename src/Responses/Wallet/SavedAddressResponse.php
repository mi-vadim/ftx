<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class SavedAddressResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $address,
        public readonly string $coin,
        public readonly bool   $fiat,
        public readonly int    $id,
        public readonly bool   $isPrimetrust,
        public readonly string $lastUsedAt,
        public readonly string $tag,
        public readonly bool   $whitelisted,
        public readonly string $whitelistedAfter,
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
            lastUsedAt: $response->getAttribute('lastUsedAt'),
            tag: $response->getAttribute('tag'),
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
            lastUsedAt: $response['lastUsedAt'],
            tag: $response['tag'],
            whitelisted: $response['whitelisted'],
            whitelistedAfter: $response['whitelistedAfter1']
        );
    }
}
