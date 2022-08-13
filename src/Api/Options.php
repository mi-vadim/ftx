<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;

class Options extends HttpApi
{
    /**
     * List quote requests
     *
     * @return mixed
     */
    public function requests()
    {
        return $this->get(Endpoint::OPTIONS_REQUESTS->value)->toArray();
    }

    /**
     * Your quote requests
     *
     * @return mixed
     */
    public function myRequests()
    {
        return $this->get(Endpoint::OPTIONS_MY_REQUESTS->value)->toArray();
    }

    /**
     * Cancel quote request
     *
     * @param string $request_id
     * @return mixed
     */
    public function cancelRequest(string $request_id)
    {
        return $this->delete(Endpoint::OPTIONS_REQUESTS->withID($request_id))->toArray();
    }

    /**
     * Get quotes for your quote request
     *
     * @param string $request_id
     * @return mixed
     */
    public function quotesForRequest(string $request_id)
    {
        return $this->get(Endpoint::OPTIONS_REQUESTS->withID($request_id) . '/quotes')->toArray();
    }

    /**
     * Create quote
     *
     * @param string $request_id
     * @param float $price
     * @return mixed
     */
    public function createQuote(string $request_id, float $price)
    {
        return $this->post(Endpoint::OPTIONS_REQUESTS->withID($request_id) . '/quotes', null, compact('price'))->toArray();
    }

    /**
     * Get my quotes
     *
     * @return mixed
     */
    public function myQuotes()
    {
        return $this->get(Endpoint::OPTIONS_MY_QUOTES->value)->toArray();
    }

    /**
     * Cancel quote
     *
     * @param string $quote_id
     * @return mixed
     */
    public function cancelQuote(string $quote_id)
    {
        return $this->delete(Endpoint::OPTIONS_QUOTES->withID($quote_id))->toArray();
    }

    /**
     * Accept options quote
     *
     * @param string $quote_id
     * @return mixed
     */
    public function acceptQuote(string $quote_id)
    {
        return $this->post(Endpoint::OPTIONS_QUOTES->withID($quote_id) . '/accept')->toArray();
    }

    /**
     * Get account options info
     *
     * @return mixed
     */
    public function accountInfo()
    {
        return $this->get(Endpoint::OPTIONS_ACCOUNT_INFO->value)->toArray();
    }

    /**
     * Get options positions
     *
     * @return mixed
     */
    public function positions()
    {
        return $this->get(Endpoint::OPTIONS_POSITIONS->value)->toArray();
    }

    /**
     * Get options fills
     *
     * @param int|null $limit
     * @return mixed
     */
    public function fills(int $limit = null)
    {
        return $this->get(Endpoint::OPTIONS_FILLS->value)->toArray();
    }

    /**
     * Get public options trades
     *
     * @param int|null $limit
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return mixed
     */
    public function trades(int $limit = null, \DateTimeInterface $start_time = null, \DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->get(Endpoint::OPTIONS_TRADES->value, compact('limit', 'start_time', 'end_time'))->toArray();
    }
}
