<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;

class Markets extends HttpApi
{
    /**
     * Get markets
     *
     * @return mixed
     */
    public function all()
    {
        return $this->respond($this->get(Endpoint::MARKETS->value));
    }

    /**
     * Get single market
     *
     * @param string $market
     * @return mixed
     */
    public function market(string $market)
    {
        return $this->respond($this->get(Endpoint::MARKETS->withID($market)));
    }

    /**
     * Get orderbook
     *
     * @param string $market
     * @param int|null $depth
     * @return mixed
     */
    public function orderbook(string $market, int $depth = null)
    {
        return $this->respond($this->get(Endpoint::MARKETS->withID($market) . '/orderbook', compact('depth')));
    }

    /**
     * Get trades
     *
     * @param string $market
     * @param int|null $limit
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return mixed
     */
    public function trades(string $market, ?int $limit = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->get(Endpoint::MARKETS->withID($market) . '/trades', compact('limit', 'start_time', 'end_time')));
    }

    /**
     * Get historical prices
     *
     * @param string $market
     * @param int $resolution
     * @param int|null $limit
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return mixed
     */
    public function history(string $market, int $resolution, ?int $limit = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->get(Endpoint::MARKETS->withID($market) . '/candles', compact('limit', 'resolution', 'start_time', 'end_time')));
    }

}
