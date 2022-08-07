<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Account as AccountDictionary;

class Account extends HttpApi
{
    public function get()
    {
        return $this->respond($this->http->get(AccountDictionary::ACCOUNTS_URI));
    }

    public function requestHistoricalBalances()
    {
        return $this->respond($this->http->post(AccountDictionary::HISTORICAL_BALANCES_URI));
    }

    public function historicalBalance(int $requestID)
    {
        return $this->respond($this->http->get(AccountDictionary::HISTORICAL_BALANCES_URI . "/$requestID"));
    }

    public function historicalBalances()
    {
        return $this->respond($this->http->get(AccountDictionary::HISTORICAL_BALANCES_URI));
    }

    public function positions(bool $showAvgPrice = false)
    {
        return $this->respond($this->http->get(AccountDictionary::POSITIONS_URI, compact('showAvgPrice')));
    }

    public function changeAccountLeverage(int $leverage)
    {
        return $this->respond($this->http->post(AccountDictionary::ACCOUNTS_LEVERAGE_URI, null, compact('leverage')));
    }
}
