<?php
declare(strict_types=1);

namespace FTX\Responses;

use FTX\Client\HttpResponse;

abstract class AbstractResponser implements Responser
{
    public static function fromArray(array $response): static
    {
        return new static(...$response);
    }

    public static function collection(HttpResponse $response): array
    {
        $data = [];
        foreach ($response->toArray() as $item) {
            $data[] = static::fromArray($item);
        }

        return $data;
    }
}
