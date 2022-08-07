<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Support\PendingWithdrawalRequest;
use FTX\Dictionaries\Wallet as WalletDictionary;

class Wallet extends HttpApi
{
    /**
     * Get coins
     *
     * @return mixed
     */
    public function coins()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_COINS_URI));
    }

    /**
     * Get balances
     *
     * @return mixed
     */
    public function balances()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_BALANCES_URI));
    }

    /**
     * Get balances of all accounts
     *
     * @return mixed
     */
    public function allBalances()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_ALL_BALANCES_URI));
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
        return $this->respond($this->http->get(WalletDictionary::WALLET_DEPOSIT_ADDRESS_URI.'/'.$coin, compact('method')));
    }

    /**
     * Get deposit address list
     *
     * @return mixed
     */
    public function addressesList()
    {
        return $this->respond($this->http->post('/wallet/deposit_address/list'));
    }

    /**
     * Get deposit history
     *
     * @return mixed
     */
    public function deposits()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_DEPOSITS_URI));
    }

    /**
     * Get withdrawal history
     *
     * @return mixed
     */
    public function withdrawals()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_WITHDRAWALS_URI));
    }

    /**
     * Get withdrawal fees
     *
     * @param PendingWithdrawalRequest $pendingWithdrawalRequest
     * @return mixed
     */
    public function fees(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_WITHDRAWAL_FEES_URI, $pendingWithdrawalRequest->toArray()));
    }

    /**
     * Get saved addresses
     *
     * @return mixed
     */
    public function savedAddresses()
    {
        return $this->respond($this->http->get('/wallet/saved_addresses'));
    }

    /**
     * Delete saved addresses
     *
     * @param string $savedAddressId
     * @return void
     */
    public function deleteSavedAddress(string $savedAddressId)
    {
        $this->respond($this->http->delete("/wallet/saved_addresses/{$savedAddressId}"));
    }

    /**
     * Request withdrawal
     *
     * @param PendingWithdrawalRequest $pendingWithdrawalRequest
     * @return mixed
     */
    public function withdraw(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->respond($this->http->post(WalletDictionary::WALLET_WITHDRAWALS_URI, null, $pendingWithdrawalRequest->toArray()));
    }

    public function createWithdrawalRequest(string $coin, float $size, string $address) : PendingWithdrawalRequest
    {
        return new PendingWithdrawalRequest($this, compact('coin', 'size', 'address'));
    }
}
