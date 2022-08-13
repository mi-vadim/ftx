<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class CancelOrderResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $status
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            status: $response->getAttribute('status')
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            status: $response['status']
        );
    }
}
