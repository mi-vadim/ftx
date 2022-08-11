<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class SavedAddressResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $address,
        public readonly string $coin,
        public readonly bool $fiat,
        public readonly int $id,
        public readonly bool $isPrimetrust,
        public readonly string $lastUsedAt,
        public readonly string $tag,
        public readonly bool $whitelisted,
        public readonly string $whitelistedAfter,
    ){}

    public static function fromArray(array $data): static
    {
        return new self(
            address: $data['address'],
            coin: $data['coin'],
            fiat: $data['fiat'],
            id: $data['id'],
            isPrimetrust: $data['isPrimetrust'],
            lastUsedAt: $data['lastUsedAt'],
            tag: $data['tag'],
            whitelisted: $data['whitelisted'],
            whitelistedAfter:$data['whitelistedAfter1']
        );
    }
}
