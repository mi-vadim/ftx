<?php
declare(strict_types=1);

namespace FTX\Responses;

use FTX\Client\HttpResponse;

interface Responser
{
    public static function fromArray(array $response): static;

    public static function fromResponse(HttpResponse $response): static;

    public static function collection(HttpResponse $response) : array;
}
