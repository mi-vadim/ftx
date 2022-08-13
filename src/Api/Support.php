<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;
use FTX\Responses\Support\FullTicketResponse;
use FTX\Responses\Support\MessageResponse;
use FTX\Responses\Support\TicketResponse;

class Support extends HttpApi
{
    /**
     * Get all support tickets
     *
     * Get all your support tickets (limit 100).
     *
     * @return TicketResponse[]
     */
    public function tickets(): array
    {
        return TicketResponse::collection(
            response: $this->get(Endpoint::SUPPORT_TICKETS->value, [])
        );
    }

    /**
     * Create new ticket
     *
     * @param string $title
     * @param string $category
     * @param string $message
     * @param int|null $fiatDepositId
     * @return array
     */
    public function createTicket(
        string $title,
        string $category,
        string $message,
        ?int $fiatDepositId = null
    ): array
    {
        return $this
            ->post(Endpoint::SUPPORT_TICKETS->value, [], compact('title', 'category', 'message', 'fiatDepositId'))
            ->toArray();
    }

    /**
     * Get support ticket messages
     *
     * View all messages for one support ticket. You can only view messages for support tickets for your account.
     *
     * @param int $ticketID
     * @return FullTicketResponse
     */
    public function messages(int $ticketID): FullTicketResponse
    {
        return FullTicketResponse::fromResponse(
            response: $this->get(Endpoint::SUPPORT_TICKETS->withID((string) $ticketID) . '/messages')
        );
    }

    /**
     * Add new message into ticket
     *
     * @param int $ticketID
     * @param string $message
     * @return array
     */
    public function addMessage(int $ticketID, string $message): array
    {
        return $this
            ->post(Endpoint::SUPPORT_TICKETS->withID((string) $ticketID), [], compact('message'))
            ->toArray();
    }


    /**
     * Update the status of your support ticket
     *
     * @param int $ticketID
     * @param string $status
     * @return array
     */
    public function status(int $ticketID, string $status = 'closed'): array
    {
        return $this->post(Endpoint::SUPPORT_TICKETS->withID((string) $ticketID) . '/status', [], compact('status'))
            ->toArray();
    }

    /**
     * Count total number of unread support messages
     *
     * Returns the total number of unread messages across all your support tickets.
     *
     * @return array
     */
    public function countUnread(): array
    {
        return $this->get(Endpoint::SUPPORT_TICKETS->value . '/count_unread')->toArray();
    }


    /**
     * Mark support messages read
     *
     * Marks all support messages for the given ticket as read.
     *
     * @param int $ticketID
     * @return array
     */
    public function markAsRead(int $ticketID): array
    {
        return $this->post(Endpoint::SUPPORT_TICKETS->withID((string) $ticketID) . '/status', [], [])
            ->toArray();
    }
}
