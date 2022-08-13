<?php
declare(strict_types=1);

namespace FTX;

use FTX\Api\TriggerOrders;
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
        protected HttpClient            $client,
        public readonly Subaccounts     $subaccounts,
        public readonly Markets         $markets,
        public readonly Futures         $futures,
        public readonly Account         $account,
        public readonly Wallet          $wallet,
        public readonly Orders          $orders,
        public readonly TriggerOrders   $conditionalOrders,
        public readonly Fills           $fills,
        public readonly FundingPayments $funding,
        public readonly LeveragedTokens $leverageTokens,
        public readonly Options         $options,
        public readonly SpotMargin      $spot,
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

        return new self(
            client: $httpClient,
            subaccounts: new Subaccounts($httpClient),
            markets: new Markets($httpClient),
            futures: new Futures($httpClient),
            account: new Account($httpClient),
            wallet: new Wallet($httpClient),
            orders: new Orders($httpClient),
            conditionalOrders: new TriggerOrders($httpClient),
            fills: new Fills($httpClient),
            funding: new FundingPayments($httpClient),
            leverageTokens: new LeveragedTokens($httpClient),
            options: new Options($httpClient),
            spot: new SpotMargin($httpClient),
        );
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
}
