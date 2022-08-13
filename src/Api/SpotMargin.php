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
        return $this->get(Endpoint::SPOT_MARGIN_BORROW_RATES->value)->toArray();
    }

    /**
     * Get lending rates
     *
     * @return mixed
     */
    public function lendingRates()
    {
        return $this->get(Endpoint::SPOT_MARGIN_LENDING_RATES->value)->toArray();
    }

    /**
     * Get daily borrowed amounts
     *
     * @return mixed
     */
    public function borrowSummary()
    {
        return $this->get(Endpoint::SPOT_MARGIN_BORROW_SUMMARY->value)->toArray();
    }

    /**
     * Get market info
     *
     * @param string $market
     * @return mixed
     */
    public function marketInfo(string $market)
    {
        return $this->get(Endpoint::SPOT_MARGIN_MARKET_INFO->value, compact('market'))->toArray();
    }

    /**
     * Get my borrow history
     *
     * @return mixed
     */
    public function borrowHistory()
    {
        return $this->get(Endpoint::SPOT_MARGIN_BORROW_HISTORY->value)->toArray();
    }

    /**
     * Get my lending history
     *
     * @return mixed
     */
    public function lendingHistory()
    {
        return $this->get(Endpoint::SPOT_MARGIN_LENDING_HISTORY->value)->toArray();
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
        return $this->get(Endpoint::SPOT_MARGIN_HISTORY->value, compact('coin', 'start_time', 'end_time'))->toArray();
    }

    /**
     * Get lending offers
     *
     * @return mixed
     */
    public function offers()
    {
        return $this->get(Endpoint::SPOT_MARGIN_OFFERS->value)->toArray();
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
        return $this->post(Endpoint::SPOT_MARGIN_OFFERS->value, null, compact('coin', 'size', 'rate'))->toArray();
    }

    /**
     * Get lending info
     *
     * @return mixed
     */
    public function lendingInfo()
    {
        return $this->get(Endpoint::SPOT_MARGIN_LENDING_INFO->value)->toArray();
    }
}
