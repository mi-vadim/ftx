<?php
declare(strict_types=1);

namespace FTX\Responses\Orders;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TriggerOrderResponse extends AbstractResponser
{
    private function __construct(
        public readonly string  $createdAt,
        public readonly ?string $error,
        public readonly string  $future,
        public readonly int     $id,
        public readonly string  $market,
        public readonly ?int    $orderId,
        public readonly float   $orderPrice,
        public readonly bool    $reduceOnly,
        public readonly string  $side,
        public readonly float   $size,
        public readonly string  $status,
        public readonly ?float  $trailStart,
        public readonly ?float  $trailValue,
        public readonly float   $triggerPrice,
        public readonly string  $triggeredAt,
        public readonly string  $type,
        public readonly string  $orderType,
        public readonly float   $filledSize,
        public readonly ?float  $avgFillPrice,
        public readonly bool    $retryUntilFilled,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            createdAt: $response->getAttribute('createdAt'),
            error: $response->getAttribute('error'),
            future: $response->getAttribute('future'),
            id: $response->getAttribute('id'),
            market: $response->getAttribute('market'),
            orderId: $response->getAttribute('orderId'),
            orderPrice: $response->getAttribute('orderPrice'),
            reduceOnly: $response->getAttribute('reduceOnly'),
            side: $response->getAttribute('side'),
            size: $response->getAttribute('size'),
            status: $response->getAttribute('status'),
            trailStart: $response->getAttribute('trailStart'),
            trailValue: $response->getAttribute('trailValue'),
            triggerPrice: $response->getAttribute('triggerPrice'),
            triggeredAt: $response->getAttribute('triggeredAt'),
            type: $response->getAttribute('type'),
            orderType: $response->getAttribute('orderType'),
            filledSize: $response->getAttribute('filledSize'),
            avgFillPrice: $response->getAttribute('avgFillPrice'),
            retryUntilFilled: $response->getAttribute('retryUntilFilled'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            createdAt: $response['createdAt'],
            error: $response['error'],
            future: $response['future'],
            id: $response['id'],
            market: $response['market'],
            orderId: $response['orderId'],
            orderPrice: $response['orderPrice'],
            reduceOnly: $response['reduceOnly'],
            side: $response['side'],
            size: $response['size'],
            status: $response['status'],
            trailStart: $response['trailStart'],
            trailValue: $response['trailValue'],
            triggerPrice: $response['triggerPrice'],
            triggeredAt: $response['triggeredAt'],
            type: $response['type'],
            orderType: $response['orderType'],
            filledSize: $response['filledSize'],
            avgFillPrice: $response['avgFillPrice'],
            retryUntilFilled: $response['retryUntilFilled'],
        );
    }
}
