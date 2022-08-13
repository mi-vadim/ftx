<?php
declare(strict_types=1);

namespace FTX\Responses\Wallet;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class DepositAddressResponse extends AbstractResponser
{

    public function __construct(
        public readonly string  $address,
        public readonly ?string $tag
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            address: $response->getAttribute('address'),
            tag: $response->getAttribute('tag'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            address: $response['address'],
            tag: $response['tag'],
        );
    }
}
