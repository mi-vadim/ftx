<?php
declare(strict_types=1);

namespace FTX\Responses;

interface Responser
{
    public static function fromArray(array $data) : static;
}
