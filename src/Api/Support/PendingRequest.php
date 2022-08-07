<?php
declare(strict_types=1);

namespace FTX\Api\Support;

use FTX\Api\HttpApi;

abstract class PendingRequest
{
    protected HttpApi $api;

    protected array $attributes = [];

    public function __construct(HttpApi $api, ?array $attributes = [])
    {
        $this->api = $api;

        $this->attributes = array_merge($this->attributes, $attributes);
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function toArray(): array
    {
        return $this->attributes;
    }
}
