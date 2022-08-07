<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\SpotMargin as SpotMarginDictionary;

class SpotMargin extends HttpApi
{
    use TransformsTimestamps;

    /**
     * Get borrow rates
     *
     * @return mixed
     */
    public function borrowRates()
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/borrow_rates'));
    }

    /**
     * Get lending rates
     *
     * @return mixed
     */
    public function lendingRates()
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/lending_rates'));
    }

    /**
     * Get daily borrowed amounts
     *
     * @return mixed
     */
    public function borrowSummary()
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/borrow_summary'));
    }

    /**
     * Get market info
     *
     * @param string $market
     * @return mixed
     */
    public function marketInfo(string $market)
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/market_info', compact('market')));
    }

    /**
     * Get my borrow history
     *
     * @return mixed
     */
    public function borrowHistory()
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/borrow_history'));
    }

    /**
     * Get my lending history
     *
     * @return mixed
     */
    public function lendingHistory()
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/lending_history'));
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
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/history', compact('coin', 'start_time', 'end_time')));
    }

    /**
     * Get lending offers
     *
     * @return mixed
     */
    public function offers()
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/offers'));
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
        return $this->respond($this->http->post(SpotMarginDictionary::SPOTMARGIN_URI.'/offers', null, compact('coin', 'size', 'rate')));
    }

    /**
     * Get lending info
     *
     * @return mixed
     */
    public function lendingInfo()
    {
        return $this->respond($this->http->get(SpotMarginDictionary::SPOTMARGIN_URI.'/lending_info'));
    }
}
