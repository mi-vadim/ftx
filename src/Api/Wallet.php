<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Support\PendingWithdrawalRequest;
use FTX\Dictionaries\Wallet as WalletDictionary;

class Wallet extends HttpApi
{
    public function coins()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_COINS_URI));
    }

    public function balances()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_BALANCES_URI));
    }

    public function allBalances()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_ALL_BALANCES_URI));
    }

    public function depositAddress(string $coin, ?string $method = null)
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_DEPOSIT_ADDRESS_URI.'/'.$coin, compact('method')));
    }

    public function deposits()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_DEPOSITS_URI));
    }

    public function withdrawals()
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_WITHDRAWALS_URI));
    }

    public function createWithdrawalRequest(string $coin, float $size, string $address) : PendingWithdrawalRequest
    {
        return new PendingWithdrawalRequest($this, compact('coin', 'size', 'address'));
    }

    public function fees(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->respond($this->http->get(WalletDictionary::WALLET_WITHDRAWAL_FEES_URI, $pendingWithdrawalRequest->toArray()));
    }

    public function withdraw(PendingWithdrawalRequest $pendingWithdrawalRequest)
    {
        return $this->respond($this->http->post(WalletDictionary::WALLET_WITHDRAWALS_URI, null, $pendingWithdrawalRequest->toArray()));
    }
}
