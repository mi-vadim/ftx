<?php
declare(strict_types=1);

namespace FTX\Api;

use Psr\Http\Message\ResponseInterface;
use FTX\Client\HttpClient;

abstract class HttpApi
{
    public function __construct(
        private readonly HttpClient $http
    ){}

    protected function get(string $endpoint, array $parameters = []): ResponseInterface
    {
        return $this->http->get($endpoint, $parameters);
    }

    protected function post(string $endpoint, ?array $parameters = [], ?array $payload = []): ResponseInterface
    {
        return $this->http->post($endpoint, $parameters, $payload);
    }

    protected function delete(string $endpoint, ?array $parameters = [], ?array $payload = []): ResponseInterface
    {
        return $this->http->delete($endpoint, $parameters, $payload);
    }

    protected function respond(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
