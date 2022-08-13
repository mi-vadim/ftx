<?php
declare(strict_types=1);

namespace FTX\Responses\Support;

use FTX\Client\HttpResponse;
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

    public static function fromResponse(HttpResponse $response): static
    {
        $messages = [];

        foreach ($response->getAttribute('messages') as $message) {
            $messages[] = MessageResponse::fromResponse($message);
        }

        return new self(
            ticket: TicketResponse::fromResponse($response->getAttribute('ticket')),
            messages: $messages
        );
    }
    
    public static function fromArray(array $response): static
    {
        $messages = [];

        foreach ($response['messages'] as $message) {
            $messages[] = MessageResponse::fromResponse($message);
        }

        return new self(
            ticket: TicketResponse::fromArray($response['ticket']),
            messages: $messages
        );
    }
}
