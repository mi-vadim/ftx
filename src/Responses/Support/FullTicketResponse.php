<?php
declare(strict_types=1);

namespace FTX\Responses\Support;

use FTX\Responses\AbstractResponser;

class FullTicketResponse extends AbstractResponser
{
    /** @param MessageResponse[] $messages */
    public function __construct(
        public readonly TicketResponse $ticket,
        public readonly array          $messages,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        $messages = [];

        foreach ($data['messages'] as $message) {
            $messages[] = MessageResponse::fromArray($message);
        }

        return new self(
            ticket: TicketResponse::fromArray($data['ticket']),
            messages: $messages
        );
    }
}
