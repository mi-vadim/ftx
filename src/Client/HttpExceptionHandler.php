<?php
declare(strict_types=1);

namespace FTX\Client;

use FTX\Client\Exceptions\TooManyRequestsException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use FTX\Client\Exceptions\NotFoundException;
use FTX\Client\Exceptions\UnauthorizedException;
use FTX\Client\Exceptions\BadRequestException;

class HttpExceptionHandler
{
    public function transformResponseToException(RequestInterface $request, ResponseInterface $response) : ResponseInterface
    {
        if(404 === $response->getStatusCode()) {
            throw new NotFoundException($this->getResponseMessage($response), $request, $response);
        }

        if(400 === $response->getStatusCode()) {
            throw new BadRequestException($this->getResponseMessage($response), $request, $response);
        }

        if(401 === $response->getStatusCode()) {
            throw new UnauthorizedException($this->getResponseMessage($response), $request, $response);
        }

        if(429 === $response->getStatusCode()) {
            throw new TooManyRequestsException($this->getResponseMessage($response), $request, $response);
        }

        return $response;
    }

    protected function getResponseMessage(ResponseInterface $response): string
    {
        $responseBody = $response->getBody();

        $responseBody->rewind();
        $decodedBody = json_decode($responseBody->getContents(), true, 512, JSON_THROW_ON_ERROR);
        $responseBody->rewind();

        return $decodedBody['error'] ?? $response->getReasonPhrase();
    }
}
