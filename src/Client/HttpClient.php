<?php
declare(strict_types=1);

namespace FTX\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

class HttpClient
{
    public ?string $apiKey      = null;
    public ?string $apiSecret   = null;
    public ?string $subaccount  = null;

    public function __construct(
        protected ClientInterface $client,
        protected RequestFactoryInterface $requestFactory,
        protected UriFactoryInterface $uriFactory,
        protected StreamFactoryInterface $streamFactory,
        protected string $base_uri,
        protected HttpExceptionHandler $exceptionHandler = new HttpExceptionHandler(),
    ) {}

    public function authenticate(string $apiKey, string $apiSecret) : void
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function subaccount(string $subaccount) : void
    {
        $this->subaccount = $subaccount;
    }

    public function get(string $path, array $parameters = []) : ResponseInterface
    {
        return $this->send('GET', $path, $parameters);
    }

    public function post(string $path, ?array $parameters = [], ?array $payload = []) : ResponseInterface
    {
        return $this->send('POST', $path, $parameters, $payload);
    }

    public function delete(string $path, ?array $parameters = [], ?array $payload = []) : ResponseInterface
    {
        return $this->send('DELETE', $path, $parameters, $payload);
    }

    private function send(string $method, $path, ?array $parameters = [], ?array $payload = []) : ResponseInterface
    {
        $request = $this->createRequest($method, $path, $parameters, $payload);

        $response = $this->client->sendRequest($request);
        return $this->exceptionHandler->transformResponseToException($request, $response);
    }

    private function createUri(string $path, ?array $parameters = []) : UriInterface
    {
        $uri = $this->uriFactory->createUri($this->base_uri.'/'.$path);

        if(null !== $parameters) {
            $uri = $uri->withQuery(http_build_query($parameters));
        }

        return $uri;
    }

    private function createRequest(string $method, $path, ?array $parameters = [], ?array $payload = []) : RequestInterface
    {
        $uri = $this->createUri($path, $parameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        if('POST' === $method || 'DELETE' === $method) {
            $body = $this->streamFactory->createStream(json_encode($payload));
            $request = $request->withBody($body);
        }

        if(null !== $this->subaccount) {
            $request = $request->withHeader('FTX-SUBACCOUNT', $this->subaccount);
        }

        if(null !== $this->apiKey && null !== $this->apiSecret) {
            $timestamp = time()*1000;
            $request = $request->withHeader('Content-Type', 'application/json');
            $request = $request->withHeader('FTX-KEY', $this->apiKey);
            $request = $request->withHeader('FTX-TS', $timestamp);
            $request = $request->withHeader('FTX-SIGN', $this->calculateSignature($timestamp, $request, $payload));
        }

        return $request;
    }

    private function calculateSignature(int $timestamp, RequestInterface $request, array $payload = []) : string
    {
        $data = $timestamp
            . $request->getMethod()
            . $request->getUri()->getPath()
            . ($request->getUri()->getQuery() ? '?'.$request->getUri()->getQuery() : '')
            . (($request->getMethod() === 'POST' || $request->getMethod() === 'DELETE')  ? json_encode($payload) : '');

        return hash_hmac('sha256', $data, $this->apiSecret);
    }

}
