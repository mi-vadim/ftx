<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\Endpoint;
use FTX\Responses\Futures\FundingRateResponse;
use FTX\Responses\Futures\FutureResponse;
use FTX\Responses\Futures\FutureStatResponse;
use FTX\Responses\Futures\HistoricalResponse;

class Futures extends HttpApi
{
    /**
     * List all futures
     *
     * @return FutureResponse[]
     */
    public function all(): array
    {
        return FutureResponse::collection(
            response: $this->get(Endpoint::FUTURES->value)
        );
    }

    /**
     * Get future
     *
     * @param string $future
     * @return FutureResponse
     */
    public function future(string $future) : FutureResponse
    {
        return FutureResponse::fromResponse(
            response: $this->get(Endpoint::FUTURES->withID($future))
        );
    }

    /**
     * Get future stats
     *
     * @param string $future
     * @return FutureStatResponse
     */
    public function stats(string $future): FutureStatResponse
    {
        return FutureStatResponse::fromResponse(
            response: $this->get(Endpoint::FUTURES->withID($future) . '/stats')
        );
    }

    /**
     * Get funding rates
     *
     * @param string|null $future
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return FundingRateResponse[]
     */
    public function fundingRates(?string $future = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null): array
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return FundingRateResponse::collection(
            response: $this->get(Endpoint::FUNDING_RATES->value, compact('future', 'start_time', 'end_time'))
        );
    }

    /**
     * Get index weights
     *
     * Note that this only applies to index futures, e.g. ALT/MID/SHIT/EXCH/DRAGON.
     *
     * @param string $indexName
     * @return mixed
     */
    public function indexWeight(string $indexName) : array
    {
        return $this->get("/indexes/{$indexName}/weights")->toArray();
    }

    /**
     * Get expired futures
     *
     * @return FutureResponse[]
     */
    public function expired(): array
    {
        return FutureResponse::collection(
            response: $this->get(Endpoint::EXPIRED_FUTURES->value)
        );
    }

    /**
     * Get historical index
     *
     * @param string $marketName
     * @param int $resolution
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return HistoricalResponse[]
     */
    public function historical(string $marketName, int $resolution = 300, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null): array
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return HistoricalResponse::collection(
            response: $this->get("/indexes/{$marketName}/candles?", compact('resolution', 'start_time', 'end_time'))
        );
    }
}
