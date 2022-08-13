<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Client\HttpClient;
use FTX\Client\HttpResponse;

abstract class HttpApi
{
    use TransformsTimestamps;

    public function __construct(
        private readonly HttpClient $http
    ){}

    protected function get(string $endpoint, array $parameters = []): HttpResponse
    {
        return new HttpResponse(
            $this->http->get($endpoint, $parameters)
        );
    }

    protected function post(string $endpoint, ?array $parameters = [], ?array $payload = []): HttpResponse
    {
        return new HttpResponse(
            $this->http->post($endpoint, $parameters, $payload)
        );
    }

    protected function delete(string $endpoint, ?array $parameters = [], ?array $payload = []): HttpResponse
    {
        return new HttpResponse(
            $this->http->delete($endpoint, $parameters, $payload)
        );
    }
}
