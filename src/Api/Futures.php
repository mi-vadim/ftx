<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\Futures as FuturesDictionary;

class Futures extends HttpApi
{
    use TransformsTimestamps;

    /**
     * List all futures
     *
     * @return mixed
     */
    public function all()
    {
        return $this->respond($this->http->get(FuturesDictionary::FUTURES_URI));
    }

    /**
     * Get future
     *
     * @param string $future
     * @return mixed
     */
    public function get(string $future)
    {
        return $this->respond($this->http->get(FuturesDictionary::FUTURES_URI.'/'.$future));
    }

    /**
     * Get future stats
     *
     * @param string $future
     * @return mixed
     */
    public function stats(string $future)
    {
        return $this->respond($this->http->get(FuturesDictionary::FUTURES_URI.'/'.$future.'/stats'));
    }

    /**
     * Get funding rates
     *
     * @param string|null $future
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return mixed
     */
    public function fundingRates(?string $future = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->http->get(FuturesDictionary::FUNDING_RATES_URI, compact('future', 'start_time', 'end_time')));
    }

    /**
     * Get expired futures
     *
     * @return mixed
     */
    public function expired()
    {
        return $this->respond($this->http->get("/expired_futures"));
    }

    /**
     * Get historical index
     *
     * @param string $marketName
     * @param int $resolution
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return mixed
     */
    public function historical(string $marketName, int $resolution = 300, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->http->get("/indexes/{$marketName}/candles?", compact('resolution', 'start_time', 'end_time')));
    }
}
