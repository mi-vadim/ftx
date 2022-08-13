<?php

namespace FTX\Tests;

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

        $ftx = new FTX($http);

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
