<?php
declare(strict_types=1);

namespace FTX;

use FTX\Api\ConditionalOrders;
use FTX\Api\SpotMargin;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use FTX\Api\Account;
use FTX\Api\Fills;
use FTX\Api\FundingPayments;
use FTX\Api\Futures;
use FTX\Api\LeveragedTokens;
use FTX\Api\Markets;
use FTX\Api\Options;
use FTX\Api\Orders;
use FTX\Api\Subaccounts;
use FTX\Api\Wallet;
use FTX\Client\HttpClient;

final class FTX
{
    private const BASE_URI = 'https://ftx.com/api';

    public function __construct(
        protected HttpClient $client
    ){}

    public static function create(string $apiKey = null, string $apiSecret = null) : self
    {
        $httpClient = new HttpClient(
            Psr18ClientDiscovery::find(),
            Psr17FactoryDiscovery::findRequestFactory(),
            Psr17FactoryDiscovery::findUrlFactory(),
            Psr17FactoryDiscovery::findStreamFactory(),
            self::BASE_URI
        );

        if ($apiKey && $apiSecret) {
            $httpClient->authenticate($apiKey, $apiSecret);
        }

        return new self($httpClient);
    }

    public function getClient(): HttpClient
    {
        return $this->client;
    }

    public function onSubAccount(string $subAccount) : self
    {
        $this->client->subaccount($subAccount);

        return $this;
    }

    public function subAccounts() : Subaccounts
    {
        return new Subaccounts($this->client);
    }

    public function markets() : Markets
    {
        return new Markets($this->client);
    }

    public function futures() : Futures
    {
        return new Futures($this->client);
    }

    public function account() : Account
    {
        return new Account($this->client);
    }

    public function wallet() : Wallet
    {
        return new Wallet($this->client);
    }

    public function orders() : Orders
    {
        return new Orders($this->client);
    }

    public function conditionalOrders() : ConditionalOrders
    {
        return new ConditionalOrders($this->client);
    }

    public function fills() : Fills
    {
        return new Fills($this->client);
    }

    public function fundingPayments() : FundingPayments
    {
        return new FundingPayments($this->client);
    }

    public function leveragedTokens() : LeveragedTokens
    {
        return new LeveragedTokens($this->client);
    }

    public function options() : Options
    {
        return new Options($this->client);
    }

    public function spotMargin() : SpotMargin
    {
        return new SpotMargin($this->client);
    }
}
