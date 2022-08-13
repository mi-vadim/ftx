<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;
use FTX\Responses\Spot\BorrowedHistoryResponse;
use FTX\Responses\Spot\BorrowRatesResponse;
use FTX\Responses\Spot\DailyBorrowedAmountResponse;
use FTX\Responses\Spot\LendingHistoryResponse;
use FTX\Responses\Spot\LendingInfoResponse;
use FTX\Responses\Spot\LendingRatesResponse;
use FTX\Responses\Spot\MarketInfoResponse;

class SpotMargin extends HttpApi
{
    /**
     * Get borrow rates
     *
     * @return BorrowRatesResponse[]
     */
    public function borrowRates(): array
    {
        return BorrowRatesResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_BORROW_RATES->value)
        );
    }

    /**
     * Get lending rates
     *
     * @return LendingRatesResponse[]
     */
    public function lendingRates(): array
    {
        return LendingRatesResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_LENDING_RATES->value)
        );
    }

    /**
     * Get daily borrowed amounts
     *
     * @return DailyBorrowedAmountResponse[]
     */
    public function borrowSummary(): array
    {
        return DailyBorrowedAmountResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_BORROW_SUMMARY->value)
        );
    }

    /**
     * Get market info
     *
     * @param string $market
     * @return MarketInfoResponse[]
     */
    public function marketInfo(string $market): array
    {
        return MarketInfoResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_MARKET_INFO->value, compact('market'))
        );
    }

    /**
     * Get my borrow history
     *
     * @return BorrowedHistoryResponse[]
     */
    public function borrowHistory(): array
    {
        return BorrowedHistoryResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_BORROW_HISTORY->value)
        );
    }

    /**
     * Get my lending history
     *
     * @return LendingHistoryResponse[]
     */
    public function lendingHistory() : array
    {
        return LendingHistoryResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_LENDING_HISTORY->value)
        );
    }

    /**
     * Get lending history
     *
     * @param string|null $coin
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return LendingHistoryResponse[]
     */
    public function globalLendingHistory(?string $coin = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null): array
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);
        return LendingHistoryResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_HISTORY->value, compact('coin', 'start_time', 'end_time'))
        );
    }

    /**
     * Get lending offers
     *
     * @return LendingInfoResponse[]
     */
    public function offers(): array
    {
        return LendingInfoResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_OFFERS->value)
        );
    }

    /**
     * Submit lending offer
     *
     * @param string $coin
     * @param float $size
     * @param float $rate
     * @return array
     */
    public function submitLendingOffer(string $coin, float $size, float $rate): array
    {
        return $this
            ->post(Endpoint::SPOT_MARGIN_OFFERS->value, null, compact('coin', 'size', 'rate'))
            ->toArray();
    }

    /**
     * Get lending info
     *
     * @return LendingInfoResponse[]
     */
    public function lendingInfo(): array
    {
        return LendingInfoResponse::collection(
            response: $this->get(Endpoint::SPOT_MARGIN_LENDING_INFO->value)
        );
    }
}
