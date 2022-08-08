<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use Psr\Http\Message\ResponseInterface;
use FTX\Client\HttpClient;

abstract class HttpApi
{
    use TransformsTimestamps;

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

    protected function respond(ResponseInterface $response) : array
    {
        $decodedResponse = json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        if (array_key_exists('result', $decodedResponse)) {
            return $decodedResponse['result'];
        }

        return $decodedResponse;
    }
}
