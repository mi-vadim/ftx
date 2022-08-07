<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Markets as MarketsDictionary;
use FTX\Api\Traits\TransformsTimestamps;

class Markets extends HttpApi
{
    use TransformsTimestamps;

    public function all()
    {
        return $this->respond($this->http->get(MarketsDictionary::MARKETS_URI));
    }

    public function get(string $market)
    {
        return $this->respond($this->http->get(MarketsDictionary::MARKETS_URI.'/'.$market));
    }

    public function orderbook(string $market, int $depth = null)
    {
        return $this->respond($this->http->get(MarketsDictionary::MARKETS_URI.'/'.$market.'/orderbook', compact('depth')));
    }

    public function trades(string $market, ?int $limit = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->http->get(MarketsDictionary::MARKETS_URI.'/'.$market.'/trades', compact('limit', 'start_time', 'end_time')));
    }

    public function candles(string $market, int $resolution, ?int $limit = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->http->get(MarketsDictionary::MARKETS_URI.'/'.$market.'/candles', compact('limit', 'resolution', 'start_time', 'end_time')));
    }

}
