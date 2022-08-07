<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\Options as OptionsDictionary;

class Options extends HttpApi
{
    use TransformsTimestamps;

    public function requests()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_REQUESTS_URI));
    }

    public function myRequests()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_MY_REQUESTS_URI));
    }

    public function cancelRequest(string $request_id)
    {
        return $this->respond($this->http->delete(OptionsDictionary::OPTIONS_URI.'/requests/'.$request_id));
    }

    public function quotesForRequest(string $request_id)
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_URI.'/requests/'.$request_id.'/quotes'));
    }

    public function createQuote(string $request_id, float $price)
    {
        return $this->respond($this->http->post(OptionsDictionary::OPTIONS_URI.'/requests/'.$request_id.'/quotes', null, compact('price')));
    }

    public function myQuotes()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_MY_QUOTES_URI));
    }

    public function cancelQuote(string $quote_id)
    {
        return $this->respond($this->http->delete(OptionsDictionary::OPTIONS_URI.'/quotes/'.$quote_id));
    }

    public function acceptQuote(string $quote_id)
    {
        return $this->respond($this->http->post(OptionsDictionary::OPTIONS_URI.'/quotes/'.$quote_id.'/accept'));
    }

    public function accountInfo()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_ACCOUNT_INFO_URI));
    }

    public function positions()
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_POSITIONS_URI));
    }

    public function fills(int $limit = null)
    {
        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_FILLS_URI));
    }

    public function trades(int $limit = null, \DateTimeInterface $start_time = null, \DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->http->get(OptionsDictionary::OPTIONS_TRADES_URI, compact('limit', 'start_time', 'end_time')));
    }
}
