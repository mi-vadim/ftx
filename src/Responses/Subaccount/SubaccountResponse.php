<?php
declare(strict_types=1);

namespace FTX\Responses\Subaccount;

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

    public static function fromArray(array $data): static
    {
        return new self(
            nickname: $data['nickname'],
            deletable: $data['deletable'],
            editable: $data['editable'],
            competition: $data['competition'],
        );
    }
}
