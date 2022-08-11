<?php
declare(strict_types=1);

namespace FTX\Responses\Support;

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

    public static function fromArray(array $data): static
    {
        return new self(
            id: $data['id'],
            title: $data['title'],
            time: $data['time'],
            category: $data['category'],
            status: $data['status'],
            error: $data['error'],
            fiatDeposit: $data['fiatDeposit'],
            depositHelpRequest: $data['depositHelpRequest'],
            autoExpireAt: $data['autoExpireAt'],
        );
    }
}
