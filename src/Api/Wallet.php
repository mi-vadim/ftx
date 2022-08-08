<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Support\PendingWithdrawalRequest;
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
        return $this->respond($this->get(Endpoint::WALLET_COINS->value));
    }

    /**
     * Get balances
     *
     * @return mixed
     */
    public function balances()
    {
        return $this->respond($this->get(Endpoint::WALLET_BALANCES->value));
    }

    /**
     * Get balances of all accounts
     *
     * @return mixed
     */
    public function allBalances()
    {
        return $this->respond($this->get(Endpoint::WALLET_ALL_BALANCES->value));
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
        return $this->respond($this->get(Endpoint::WALLET_DEPOSIT_ADDRESS->withID($coin), compact('method')));
    }

    /**
     * Get deposit address list
     *
     * @return mixed
     */
    public function addressesList()
    {
        return $this->respond($this->post('/wallet/deposit_address/list'));
    }

    /**
     * Get deposit history
     *
     * @return mixed
     */
    public function depositsHistory()
    {
        return $this->respond($this->get(Endpoint::WALLET_DEPOSITS->value));
    }

    /**
     * Get withdrawal history
     *
     * @return mixed
     */
    public function withdrawalsHistory()
    {
        return $this->respond($this->get(Endpoint::WALLET_WITHDRAWALS->value));
    }

    /**
     * Request withdrawal
     *
     * @param PendingWithdrawalRequest $pendingWithdrawalRequest
     * @return mixed
     */
    public function withdraw(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->respond($this->post(Endpoint::WALLET_WITHDRAWALS->value, null, $pendingWithdrawalRequest->toArray()));
    }

    public function createWithdrawalRequest(string $coin, float $size, string $address) : PendingWithdrawalRequest
    {
        return new PendingWithdrawalRequest($this, compact('coin', 'size', 'address'));
    }

    /**
     * Get withdrawal fees
     *
     * @param PendingWithdrawalRequest $pendingWithdrawalRequest
     * @return mixed
     */
    public function fees(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->respond($this->get(Endpoint::WALLET_WITHDRAWAL_FEES->value, $pendingWithdrawalRequest->toArray()));
    }

    /**
     * Get saved addresses
     *
     * @return mixed
     */
    public function savedAddresses()
    {
        return $this->respond($this->get('/wallet/saved_addresses'));
    }

    /**
     * Create saved addresses
     *
     * @return void
     */
    public function createSavedAddress()
    {
        return $this->respond($this->post(Endpoint::SPOT_MARGIN_LENDING_HISTORY->value));
    }

    /**
     * Delete saved addresses
     *
     * @param string $savedAddressId
     * @return void
     */
    public function deleteSavedAddress(string $savedAddressId)
    {
        $this->respond($this->delete("/wallet/saved_addresses/{$savedAddressId}"));
    }

}
