<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class RequestSnapshot extends AbstractResponser
{
    private function __construct(
        public readonly ?bool $status,
        public readonly ?float $result,
    ){}

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            status: $response->getAttribute('status'),
            result: $response->getAttribute('result')
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            status: $response['status'],
            result: $response['result']
        );
    }
}
