<?php
declare(strict_types=1);

namespace FTX\Responses\Subaccount;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class SubaccountResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $nickname,
        public readonly bool   $deletable,
        public readonly bool   $editable,
        public readonly bool   $competition,
    )
    {
    }

    public static function fromArray(array $response): static
    {
        return new self(
            nickname: $response['nickname'],
            deletable: $response['deletable'],
            editable: $response['editable'],
            competition: $response['competition'],
        );
    }
    
    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            nickname: $response->getAttribute('nickname'),
            deletable: $response->getAttribute('deletable'),
            editable: $response->getAttribute('editable'),
            competition: $response->getAttribute('competition'),
        );
    }
}
