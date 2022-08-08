<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\Endpoint;

class Futures extends HttpApi
{
    /**
     * List all futures
     *
     * @return mixed
     */
    public function all()
    {
        return $this->respond($this->get(Endpoint::FUTURES->value));
    }

    /**
     * Get future
     *
     * @param string $future
     * @return mixed
     */
    public function future(string $future)
    {
        return $this->respond($this->get(Endpoint::FUTURES->withID($future)));
    }

    /**
     * Get future stats
     *
     * @param string $future
     * @return mixed
     */
    public function stats(string $future)
    {
        return $this->respond($this->get(Endpoint::FUTURES->withID($future) . '/stats'));
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

        return $this->respond($this->get(Endpoint::FUNDING_RATES->value, compact('future', 'start_time', 'end_time')));
    }

    /**
     * Get index weights
     *
     * Note that this only applies to index futures, e.g. ALT/MID/SHIT/EXCH/DRAGON.
     *
     * @param string $indexName
     * @return mixed
     */
    public function indexWeight(string $indexName)
    {
        return $this->respond($this->get("/indexes/{$indexName}/weights"));
    }

    /**
     * Get expired futures
     *
     * @return mixed
     */
    public function expired(): mixed
    {
        return $this->respond($this->get(Endpoint::EXPIRED_FUTURES->value));
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

        return $this->respond($this->get("/indexes/{$marketName}/candles?", compact('resolution', 'start_time', 'end_time')));
    }
}
