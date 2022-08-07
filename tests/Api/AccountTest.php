<?php
declare(strict_types=1);

namespace FTX\Tests\Api;

use FTX\Api\Account;
use Http\Mock\Client;

class AccountTest extends TestCase
{
    protected Account $account;
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->account = new Account($this->http);
    }

    public function testGet(): void
    {
        $this->account->get();

        $this->assertEquals('/api/account', $this->client->getLastRequest()->getUri()->getPath());
        $this->assertEquals('GET', $this->client->getLastRequest()->getMethod());
    }

    public function testChangeAccountLeverage(): void
    {
        $this->account->changeAccountLeverage(5);

        $responseBody = $this->client->getLastRequest()->getBody();
        $responseBody->rewind();
        $payload = json_decode($responseBody->getContents(), true);

        $this->assertEquals('/api/account/leverage', $this->client->getLastRequest()->getUri()->getPath());
        $this->assertEquals('POST', $this->client->getLastRequest()->getMethod());
        $this->assertEquals(['leverage' => 5], $payload);
    }

    public function testPositions(): void
    {
        $this->account->positions();

        $this->assertEquals('/api/positions', $this->client->getLastRequest()->getUri()->getPath());
        $this->assertEquals('GET', $this->client->getLastRequest()->getMethod());
    }
}
