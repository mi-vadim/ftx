<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Support\PendingWithdrawalRequest;
use FTX\Client\HttpClient;
use FTX\Dictionaries\Endpoint;

class Wallet extends HttpApi
{
    /**
     * Get coins
     *
     * @return mixed
     */
    public function coins()
    {
        return $this->get(Endpoint::WALLET_COINS->value)->toArray();
    }

    /**
     * Get balances
     *
     * @return mixed
     */
    public function balances()
    {
        return $this->get(Endpoint::WALLET_BALANCES->value)->toArray();
    }

    /**
     * Get balances of all accounts
     *
     * @return mixed
     */
    public function allBalances()
    {
        return $this->get(Endpoint::WALLET_ALL_BALANCES->value)->toArray();
    }

    /**
     * Get deposit address
     *
     * @param string $coin
     * @param string|null $method
     * @return mixed
     */
    public function depositAddress(string $coin, ?string $method = null)
    {
        return $this->get(Endpoint::WALLET_DEPOSIT_ADDRESS->withID($coin), compact('method'))
            ->toArray();
    }

    /**
     * Get deposit address list
     *
     * @return mixed
     */
    public function addressesList()
    {
        return $this->post('/wallet/deposit_address/list')->toArray();
    }

    /**
     * Get deposit history
     *
     * @return mixed
     */
    public function depositsHistory()
    {
        return $this->get(Endpoint::WALLET_DEPOSITS->value)->toArray();
    }

    /**
     * Get withdrawal history
     *
     * @return mixed
     */
    public function withdrawalsHistory()
    {
        return $this->get(Endpoint::WALLET_WITHDRAWALS->value)->toArray();
    }

    /**
     * Request withdrawal
     *
     * @param PendingWithdrawalRequest $pendingWithdrawalRequest
     * @return mixed
     */
    public function withdraw(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->post(Endpoint::WALLET_WITHDRAWALS->value, null, $pendingWithdrawalRequest->toArray())->toArray();
    }

    public function createWithdrawalRequest(string $coin, float $size, string $address) : PendingWithdrawalRequest
    {
        return new PendingWithdrawalRequest($this, compact('coin', 'size', 'address'));
    }

    /**
     * Get airdrops
     *
     * This endpoint provides you with updates to your AMPL balances based on AMPL rebases.
     *
     * @return array
     */
    public function airdrops(): array
    {
       return $this->get('/wallet/airdrops')->toArray();
    }

    /**
     * Get withdrawal fees
     *
     * @param PendingWithdrawalRequest $pendingWithdrawalRequest
     * @return mixed
     */
    public function fees(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->get(Endpoint::WALLET_WITHDRAWAL_FEES->value, $pendingWithdrawalRequest->toArray())->toArray();
    }

    /**
     * Get saved addresses
     *
     * @return mixed
     */
    public function savedAddresses()
    {
        return $this->get('/wallet/saved_addresses')->toArray() ;
    }

    /**
     * Create saved addresses
     *
     * @return array
     */
    public function createSavedAddress()
    {
        return $this->post(Endpoint::SPOT_MARGIN_LENDING_HISTORY->value)->toArray();
    }

    /**
     * Delete saved addresses
     *
     * @param string $savedAddressId
     * @return array
     */
    public function deleteSavedAddress(string $savedAddressId)
    {
        return $this->delete("/wallet/saved_addresses/{$savedAddressId}")->toArray();
    }

}
