<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Account as AccountDictionary;

class Account extends HttpApi
{
    /**
     * Get account information
     *
     * @return mixed
     */
    public function get()
    {
        return $this->respond($this->http->get(AccountDictionary::ACCOUNTS_URI));
    }

    /**
     * Request historical balances and positions snapshot
     *
     * @return mixed
     */
    public function requestHistoricalBalances()
    {
        return $this->respond($this->http->post(AccountDictionary::HISTORICAL_BALANCES_URI));
    }

    /**
     * Get historical balances and positions snapshot
     *
     * @param int $requestID
     * @return mixed
     */
    public function historicalBalance(int $requestID)
    {
        return $this->respond($this->http->get(AccountDictionary::HISTORICAL_BALANCES_URI . "/$requestID"));
    }

    /**
     * Get all historical balances and positions snapshots
     *
     * @return mixed
     */
    public function historicalBalances()
    {
        return $this->respond($this->http->get(AccountDictionary::HISTORICAL_BALANCES_URI));
    }

    /**
     * Get positions
     *
     * @param bool $showAvgPrice
     * @return mixed
     */
    public function positions(bool $showAvgPrice = false): mixed
    {
        return $this->respond($this->http->get(AccountDictionary::POSITIONS_URI, compact('showAvgPrice')));
    }

    /**
     * Change account leverage
     *
     * @param int $leverage Desired account-wide leverage setting
     * @return mixed
     */
    public function changeAccountLeverage(int $leverage)
    {
        return $this->respond($this->http->post(AccountDictionary::ACCOUNTS_LEVERAGE_URI, null, compact('leverage')));
    }
}
