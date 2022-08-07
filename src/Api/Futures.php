<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\Futures as FuturesDictionary;

class Futures extends HttpApi
{
    use TransformsTimestamps;

    public function all()
    {
        return $this->respond($this->http->get(FuturesDictionary::FUTURES_URI));
    }

    public function get(string $future)
    {
        return $this->respond($this->http->get(FuturesDictionary::FUTURES_URI.'/'.$future));
    }

    public function stats(string $future)
    {
        return $this->respond($this->http->get(FuturesDictionary::FUTURES_URI.'/'.$future.'/stats'));
    }

    public function fundingRates(?string $future = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->http->get(FuturesDictionary::FUNDING_RATES_URI, compact('future', 'start_time', 'end_time')));
    }

}
