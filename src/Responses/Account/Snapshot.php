<?php
declare(strict_types=1);

namespace FTX\Responses\Account;

use FTX\Responses\AbstractResponser;

class Snapshot extends AbstractResponser
{
    private function __construct(
        public readonly int    $id,
        public readonly array  $accounts,
        public readonly int    $time,
        public readonly int    $endTime,
        public readonly string $status,
        public readonly bool   $error,
        /** @var array<SnapshotResult> $results */
        public readonly array  $results,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        $results = [];
        foreach ($data['results'] as $result) {
            $results[] = new SnapshotResult(
                account: $result['account'],
                ticker: $result['ticker'],
                size: $result['size'],
                price: $result['price']
            );
        }

        return new self(
            id: $data['id'],
            accounts: $data['accounts'],
            time: $data['time'],
            endTime: $data['endTime'],
            status: $data['status'],
            error: $data['error'],
            results: $results,
        );
    }
}
