<?php
declare(strict_types=1);

namespace FTX\Tests\Client;

use FTX\Client\HttpClient;
use FTX\Tests\FTXTestCase;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Mock\Client;

class HttpClientTest extends FTXTestCase
{
    protected HttpClient $http;
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Client();

        $this->http = new HttpClient(
            $this->client,
            Psr17FactoryDiscovery::findRequestFactory(),
            Psr17FactoryDiscovery::findUrlFactory(),
            Psr17FactoryDiscovery::findStreamFactory(),
            'https://ftx.com/api'
        );
    }

    public function testSubaccountHeaderIsAdded(): void
    {
        $this->http->subaccount = 'foo';

        $this->http->get('foo');

        $this->assertEquals('foo', $this->client->getLastRequest()->getHeaderLine('FTX-SUBACCOUNT'));
    }

    public function testCredentialsHeadersAreAdded(): void
    {
        $this->http->apiKey = 'foo';
        $this->http->apiSecret = 'bar';

        $this->http->get('foo');

        $time = time()*1000;

        $signature = hash_hmac('sha256', $time.'GET/api/foo', 'bar');

        $this->assertEquals('foo', $this->client->getLastRequest()->getHeaderLine('FTX-KEY'));
        $this->assertEquals($this->client->getLastRequest()->getHeaderLine('FTX-TS'), $time);
        $this->assertEquals($this->client->getLastRequest()->getHeaderLine('FTX-SIGN'), $signature);
    }
}
