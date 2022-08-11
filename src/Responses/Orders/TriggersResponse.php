<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

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

    public static function fromArray(array $data): static
    {
        return new self(
            time: $data['time'],
            orderSize: $data['orderSize'],
            filledSize: $data['filledSize'],
            orderId: $data['orderId'],
            error: $data['error'],
        );
    }
}
