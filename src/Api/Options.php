<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\Options as OptionsDictionary;

class Options extends HttpApi
{
    use TransformsTimestamps;

    /**
     * List quote requests
     *
     * @return mixed
     */
    public function requests()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_REQUESTS_URI));
    }

    /**
     * Your quote requests
     *
     * @return mixed
     */
    public function myRequests()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_MY_REQUESTS_URI));
    }

    /**
     * Cancel quote request
     *
     * @param string $request_id
     * @return mixed
     */
    public function cancelRequest(string $request_id)
    {
        return $this->respond($this->http->delete(OptionsDictionary::OPTIONS_URI.'/requests/'.$request_id));
    }

    /**
     * Get quotes for your quote request
     *
     * @param string $request_id
     * @return mixed
     */
    public function quotesForRequest(string $request_id)
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_URI.'/requests/'.$request_id.'/quotes'));
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
        return $this->respond($this->http->post(OptionsDictionary::OPTIONS_URI.'/requests/'.$request_id.'/quotes', null, compact('price')));
    }

    /**
     * Get my quotes
     *
     * @return mixed
     */
    public function myQuotes()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_MY_QUOTES_URI));
    }

    /**
     * Cancel quote
     *
     * @param string $quote_id
     * @return mixed
     */
    public function cancelQuote(string $quote_id)
    {
        return $this->respond($this->http->delete(OptionsDictionary::OPTIONS_URI.'/quotes/'.$quote_id));
    }

    /**
     * Accept options quote
     *
     * @param string $quote_id
     * @return mixed
     */
    public function acceptQuote(string $quote_id)
    {
        return $this->respond($this->http->post(OptionsDictionary::OPTIONS_URI.'/quotes/'.$quote_id.'/accept'));
    }

    /**
     * Get account options info
     *
     * @return mixed
     */
    public function accountInfo()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_ACCOUNT_INFO_URI));
    }

    /**
     * Get options positions
     *
     * @return mixed
     */
    public function positions()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_POSITIONS_URI));
    }

    /**
     * Get options fills
     *
     * @param int|null $limit
     * @return mixed
     */
    public function fills(int $limit = null)
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_FILLS_URI));
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

        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_TRADES_URI, compact('limit', 'start_time', 'end_time')));
    }
}
