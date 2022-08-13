<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class Snapshot extends AbstractResponser
{
    private function __construct(
        public readonly int     $id,
        public readonly array   $accounts,
        public readonly string  $time,
        public readonly string  $endTime,
        public readonly string  $status,
        public readonly bool    $error,
        /** @var array<SnapshotResult> $results */
        public readonly array   $results,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        $results = [];
        foreach ($response->getAttribute('results') as $result) {
            $results[] = new SnapshotResult(
                account: $result['account'],
                ticker: $result['ticker'],
                size: $result['size'],
                price: $result['price'] ?? 0.0
            );
        }

        return new self(
            id: $response->getAttribute('id'),
            accounts: $response->getAttribute('accounts'),
            time: $response->getAttribute('time'),
            endTime: $response->getAttribute('endTime'),
            status: $response->getAttribute('status'),
            error: $response->getAttribute('error'),
            results: $results,
        );
    }
    
    public static function fromArray(array $response): static
    {
        $results = [];
        foreach ($response['results'] as $result) {
            $results[] = new SnapshotResult(
                account: $result['account'],
                ticker: $result['ticker'],
                size: $result['size'],
                price: $result['price'] ?? 0.0
            );
        }

        return new self(
            id: $response['id'],
            accounts: $response['accounts'],
            time: $response['time'],
            endTime: $response['endTime'],
            status: $response['status'],
            error: $response['error'],
            results: $results,
        );
    }
}
