<?php
declare(strict_types=1);

namespace FTX\Api;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use FTX\Client\HttpClient;

abstract class HttpApi
{
    public function __construct(
        protected HttpClient $http
    ){}

    protected function respond(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
