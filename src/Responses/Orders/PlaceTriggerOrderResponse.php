<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class PlaceTriggerOrderResponse extends AbstractResponser
{
    public function __construct(
        public readonly string $createdAt,
        public readonly string $future,
        public readonly int    $id,
        public readonly string $market,
        public readonly float  $triggerPrice,
        public readonly int    $orderId,
        public readonly string $side,
        public readonly float  $size,
        public readonly string $status,
        public readonly string $type,
        public readonly float  $orderPrice,
        public readonly string $error,
        public readonly string $triggeredAt,
        public readonly bool   $reduceOnly,
        public readonly string $orderType,
        public readonly bool   $retryUntilFilled,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            createdAt: $response->getAttribute('createdAt'),
            future: $response->getAttribute('future'),
            id: $response->getAttribute('id'),
            market: $response->getAttribute('market'),
            triggerPrice: $response->getAttribute('triggerPrice'),
            orderId: $response->getAttribute('orderId'),
            side: $response->getAttribute('side'),
            size: $response->getAttribute('size'),
            status: $response->getAttribute('status'),
            type: $response->getAttribute('type'),
            orderPrice: $response->getAttribute('orderPrice'),
            error: $response->getAttribute('error'),
            triggeredAt: $response->getAttribute('triggeredAt'),
            reduceOnly: $response->getAttribute('reduceOnly'),
            orderType: $response->getAttribute('orderType'),
            retryUntilFilled: $response->getAttribute('retryUntilFilled'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            createdAt: $response['createdAt'],
            future: $response['future'],
            id: $response['id'],
            market: $response['market'],
            triggerPrice: $response['triggerPrice'],
            orderId: $response['orderId'],
            side: $response['side'],
            size: $response['size'],
            status: $response['status'],
            type: $response['type'],
            orderPrice: $response['orderPrice'],
            error: $response['error'],
            triggeredAt: $response['triggeredAt'],
            reduceOnly: $response['reduceOnly'],
            orderType: $response['orderType'],
            retryUntilFilled: $response['retryUntilFilled'],
        );
    }
}
