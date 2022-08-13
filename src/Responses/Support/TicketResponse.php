<?php
declare(strict_types=1);

namespace FTX\Responses\Support;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class TicketResponse extends AbstractResponser
{
    public function __construct(
        public readonly int    $id,
        public readonly string $title,
        public readonly string $time,
        public readonly string $category,
        public readonly string $status,
        public readonly string $error,
        public readonly object $fiatDeposit,
        public readonly object $depositHelpRequest,
        public readonly string $autoExpireAt,
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            title: $response->getAttribute('title'),
            time: $response->getAttribute('time'),
            category: $response->getAttribute('category'),
            status: $response->getAttribute('status'),
            error: $response->getAttribute('error'),
            fiatDeposit: $response->getAttribute('fiatDeposit'),
            depositHelpRequest: $response->getAttribute('depositHelpRequest'),
            autoExpireAt: $response->getAttribute('autoExpireAt'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            id: $response['id'],
            title: $response['title'],
            time: $response['time'],
            category: $response['category'],
            status: $response['status'],
            error: $response['error'],
            fiatDeposit: $response['fiatDeposit'],
            depositHelpRequest: $response['depositHelpRequest'],
            autoExpireAt: $response['autoExpireAt'],
        );
    }
}
