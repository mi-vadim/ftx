<?php
declare(strict_types=1);

namespace FTX\Client;

use Psr\Http\Message\ResponseInterface;

final class HttpResponse
{
    private array $responseBody = [];

    public function __construct(
        private readonly ResponseInterface $response
    ){}

    public function getAttribute(string $name)
    {
        $data = $this->toArray();
        return $data[$name] ?? null;
    }

    public function toArray() : array
    {
        if (empty($this->responseBody)) {
            try {
                $this->responseBody = json_decode(
                    $this->response->getBody()->getContents(),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
            } catch (\JsonException $exception) {
                $this->responseBody = [];
            }
        }


        if (array_key_exists('result', $this->responseBody)) {
            return is_array($this->responseBody['result'])
                ? $this->responseBody['result']
                : ['result' => $this->responseBody['result']];
        }

        return !is_array($this->responseBody) ? [$this->responseBody] : $this->responseBody;
    }
}
