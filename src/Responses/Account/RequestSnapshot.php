<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Responses\AbstractResponser;

class RequestSnapshot extends AbstractResponser
{
    public bool $status;
    public float $result;

    public static function fromArray(array $data): static
    {
        $self = new self();
        $self->status = (bool) $data['status'];
        $self->result = (float) $data['result'];

        return $self;
    }
}
