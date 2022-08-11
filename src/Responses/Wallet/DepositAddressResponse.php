<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Responses\AbstractResponser;

class DepositAddressResponse extends AbstractResponser
{

    public function __construct(
        public readonly string  $address,
        public readonly ?string $tag
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            address: $data['address'],
            tag: $data['tag'],
        );
    }
}
