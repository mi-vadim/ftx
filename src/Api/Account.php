<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;

class Account extends HttpApi
{
    /**
     * Get account information
     *
     * @return mixed
     */
    public function info()
    {
        return $this->respond($this->get(Endpoint::ACCOUNTS->value));
    }

    /**
     * Request historical balances and positions snapshot
     *
     * @return mixed
     */
    public function requestHistoricalBalances()
    {
        return $this->respond($this->post(Endpoint::HISTORICAL_BALANCES->value));
    }

    /**
     * Get historical balances and positions snapshot
     *
     * @param int $requestID
     * @return mixed
     */
    public function historicalBalance(int $requestID)
    {
        $endpoint = Endpoint::HISTORICAL_BALANCES;
        return $this->respond($this->get($endpoint->withID((string) $requestID)));
    }

    /**
     * Get all historical balances and positions snapshots
     *
     * @return mixed
     */
    public function historicalBalances()
    {
        return $this->respond($this->get(Endpoint::HISTORICAL_BALANCES->value));
    }

    /**
     * Get positions
     *
     * @param bool $showAvgPrice
     * @return mixed
     */
    public function positions(bool $showAvgPrice = false): mixed
    {
        return $this->respond($this->get(Endpoint::POSITIONS->value, compact('showAvgPrice')));
    }

    /**
     * Change account leverage
     *
     * @param int $leverage Desired account-wide leverage setting
     * @return mixed
     */
    public function changeAccountLeverage(int $leverage)
    {
        return $this->respond($this->post(Endpoint::ACCOUNTS_LEVERAGE->value, null, compact('leverage')));
    }
}
