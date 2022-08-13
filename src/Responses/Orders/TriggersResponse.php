<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TriggersResponse extends AbstractResponser
{
    private function __construct(
        public readonly string  $time,
        public readonly ?float  $orderSize,
        public readonly ?float  $filledSize,
        public readonly ?int    $orderId,
        public readonly ?string $error,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            time: $response->getAttribute('time'),
            orderSize: $response->getAttribute('orderSize'),
            filledSize: $response->getAttribute('filledSize'),
            orderId: $response->getAttribute('orderId'),
            error: $response->getAttribute('error'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            time: $response['time'],
            orderSize: $response['orderSize'],
            filledSize: $response['filledSize'],
            orderId: $response['orderId'],
            error: $response['error'],
        );
    }
}
