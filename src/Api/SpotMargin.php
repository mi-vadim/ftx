<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;

class SpotMargin extends HttpApi
{
    /**
     * Get borrow rates
     *
     * @return mixed
     */
    public function borrowRates()
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_BORROW_RATES->value));
    }

    /**
     * Get lending rates
     *
     * @return mixed
     */
    public function lendingRates()
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_LENDING_RATES->value));
    }

    /**
     * Get daily borrowed amounts
     *
     * @return mixed
     */
    public function borrowSummary()
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_BORROW_SUMMARY->value));
    }

    /**
     * Get market info
     *
     * @param string $market
     * @return mixed
     */
    public function marketInfo(string $market)
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_MARKET_INFO->value, compact('market')));
    }

    /**
     * Get my borrow history
     *
     * @return mixed
     */
    public function borrowHistory()
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_BORROW_HISTORY->value));
    }

    /**
     * Get my lending history
     *
     * @return mixed
     */
    public function lendingHistory()
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_LENDING_HISTORY->value));
    }

    /**
     * Get lending history
     *
     * @param string|null $coin
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return mixed
     */
    public function globalLendingHistory(?string $coin = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_HISTORY->value, compact('coin', 'start_time', 'end_time')));
    }

    /**
     * Get lending offers
     *
     * @return mixed
     */
    public function offers()
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_OFFERS->value));
    }

    /**
     * Submit lending offer
     *
     * @param string $coin
     * @param float $size
     * @param float $rate
     * @return mixed
     */
    public function submitLendingOffer(string $coin, float $size, float $rate)
    {
        return $this->respond($this->post(Endpoint::SPOT_MARGIN_OFFERS->value, null, compact('coin', 'size', 'rate')));
    }

    /**
     * Get lending info
     *
     * @return mixed
     */
    public function lendingInfo()
    {
        return $this->respond($this->get(Endpoint::SPOT_MARGIN_LENDING_INFO->value));
    }
}
