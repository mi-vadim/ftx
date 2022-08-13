<?php

namespace FTX\Tests;

use FTX\Api\Convert;
use FTX\Api\Latency;
use FTX\Api\Staking;
use FTX\Api\Support;
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
use FTX\FTX;

class FTXTest extends FTXTestCase
{
    public function testFTXAcceptsHttpClient(): void
    {
        $http = new HttpClient(
            Psr18ClientDiscovery::find(),
            Psr17FactoryDiscovery::findRequestFactory(),
            Psr17FactoryDiscovery::findUrlFactory(),
            Psr17FactoryDiscovery::findStreamFactory(),
            'https://ftx.com/api'
        );

        $ftx = new FTX(
            client: $http,
            subaccounts: new Subaccounts($http),
            markets: new Markets($http),
            futures: new Futures($http),
            account: new Account($http),
            wallet: new Wallet($http),
            orders: new Orders($http),
            conditionalOrders: new TriggerOrders($http),
            fills: new Fills($http),
            funding: new FundingPayments($http),
            leverageTokens: new LeveragedTokens($http),
            options: new Options($http),
            spot: new SpotMargin($http),
            staking: new Staking($http),
            convert: new Convert($http),
            latency: new Latency($http),
            support: new Support($http)
        );

        $this->assertEquals($ftx->getClient(), $http);
    }

    public function testFTXAcceptsCredentials(): void
    {
        $ftx = FTX::create('foo', 'bar');

        $this->assertEquals('foo', $ftx->getClient()->apiKey);
        $this->assertEquals('bar', $ftx->getClient()->apiSecret);
    }

    public function testIsPossibleToSpecifySubaccount(): void
    {
        $ftx = FTX::create('foo', 'bar');
        $ftx->onSubaccount('foo');

        $this->assertEquals('foo', $ftx->getClient()->apiKey);
        $this->assertEquals('bar', $ftx->getClient()->apiSecret);
        $this->assertEquals('foo', $ftx->getClient()->subaccount);
    }
}
