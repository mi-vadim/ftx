<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;
use FTX\Responses\Market\HistoricalResponse;
use FTX\Responses\Market\MarketResponse;
use FTX\Responses\Market\OrderBookResponse;
use FTX\Responses\Market\TradesResponse;

class Markets extends HttpApi
{
    /**
     * Get markets
     *
     * @return MarketResponse[]
     */
    public function all(): array
    {
        return MarketResponse::collection(
            response: $this->get(Endpoint::MARKETS->value)
        );
    }

    /**
     * Get single market
     *
     * @param string $market
     * @return MarketResponse
     */
    public function market(string $market) : MarketResponse
    {
        return MarketResponse::fromResponse(
            response: $this->get(Endpoint::MARKETS->withID($market))
        );
    }

    /**
     * Get orderbook
     *
     * @param string $market
     * @param int|null $depth
     * @return OrderBookResponse
     */
    public function orderbook(string $market, int $depth = null) : OrderBookResponse
    {
        return OrderBookResponse::fromResponse(
            response: $this->get(Endpoint::MARKETS->withID($market) . '/orderbook', compact('depth'))
        );
    }

    /**
     * Get trades
     *
     * @param string $market
     * @param int|null $limit
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return TradesResponse[]
     */
    public function trades(string $market, ?int $limit = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null) : array
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return TradesResponse::collection(
            response: $this->get(Endpoint::MARKETS->withID($market) . '/trades', compact('limit', 'start_time', 'end_time'))
        );
    }

    /**
     * Get historical prices
     *
     * @param string $market
     * @param int $resolution
     * @param int|null $limit
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return HistoricalResponse[]
     */
    public function history(string $market, int $resolution, ?int $limit = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null): array
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return HistoricalResponse::collection(
            response: $this->get(Endpoint::MARKETS->withID($market) . '/candles', compact('limit', 'resolution', 'start_time', 'end_time'))
        );
    }

}
