<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Responses\AbstractResponser;

class CancelOrderResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $status
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            status: $data['status']
        );
    }
}
