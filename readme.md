
# FTX PHP Wrapper

Wrapper over the API provided by the [FTX exchange](https://docs.ftx.com/).


## Installation

You can install the package via composer:

```bash
  composer require mi-vadim/ftx
```

## Basic usage

```php
use FTX\FTX;

$ftx = FTX::create(
    'your_key_here',
    'your_secret_here'
);
```

Also you can use all free enpoints of FTX (without auth):

```php
use FTX\FTX;

$ftx = FTX::create();
```
## Features

#### Subaccounts:

  - Login as Subaccount
  - Get all subaccounts: `$ftx->subaccount->all()`
  - Create subaccount
  - Change subaccount name
  - Delete subaccount
  - Get subaccount balances
  - Transfer between subaccounts

```php
$ftx->subaccounts->balances(),
$ftx->subaccounts->all(),
$ftx->subaccounts->transfer(),
$ftx->subaccounts->remove(),
$ftx->subaccounts->rename(),
$ftx->subaccounts->create(),
```
<hr>

#### Markets:
- Get markets
- Get single market
- Get orderbook
- Get trades
- Get historical prices

```php
$ftx->markets->all(),
$ftx->markets->history(),
$ftx->markets->trades(),
$ftx->markets->orderbook(),
$ftx->markets->market(),
```
<hr>

#### Futures:
- List all futures
- Get future
- Get future stats
- Get funding rates
- Get index weights
- Get expired futures
- Get historical index
- Get index constituents

```php
$ftx->futures->all(),
$ftx->futures->expired(),
$ftx->futures->indexWeight(),
$ftx->futures->rates(),
$ftx->futures->future(),
$ftx->futures->historical(),
$ftx->futures->indexConstituents(),
$ftx->futures->stats(),
```
<hr>

#### Account:
- Get account information
- Request historical balances and positions snapshot
- Get historical balances and positions snapshot
- Get all historical balances and positions snapshots
- Get positions
- Change account leverage

```php
$ftx->account->positions();
$ftx->account->historicalBalances(),
$ftx->account->historicalBalance(),
$ftx->account->info(),
$ftx->account->changeAccountLeverage(),
$ftx->account->requestHistoricalBalances(),
```
<hr>

#### Wallet:
- Get coins
- Get balances
- Get balances of all accounts
- Get deposit address
- Get deposit address list
- Get deposit history
- Get withdrawal history
- Request withdrawal
- Get airdrops
- Get withdrawal fees
- Get saved addresses
- Create saved addresses
- Delete saved addresses

```php
$ftx->wallet->coins(),
$ftx->wallet->balances(),
$ftx->wallet->allBalances(),
$ftx->wallet->depositAddress(),
$ftx->wallet->addressesList(),
$ftx->wallet->depositsHistory(),
$ftx->wallet->withdrawalsHistory(),
$ftx->wallet->createWithdrawalRequest()->withdraw(),
$ftx->wallet->airdrops(),
$ftx->wallet->fees(),
$ftx->wallet->savedAddresses(),
$ftx->wallet->createSavedAddress(),
$ftx->wallet->deleteSavedAddress(),
```
<hr>

#### Orders:
- Get open orders
- Get order history
- Get open trigger orders
- Get trigger order triggers
- Get trigger order history
- Place order
- Place trigger order
- Modify order
- Modify order by client ID
- Modify trigger order
- Get order status
- Get order status by client id
- Cancel order
- Cancel order by client id
- Cancel open trigger order
- Cancel all orders

```php
$ftx->orders->history(),
$ftx->orders->create(),
$ftx->orders->status(),
$ftx->orders->statusByClientID(),
$ftx->orders->place(),
$ftx->orders->open(),
$ftx->orders->modifyByClientID(),
$ftx->orders->modify(),
$ftx->orders->cancelByClientID(),
$ftx->orders->cancel(),
$ftx->orders->cancelAll(),
```
<hr>

#### Fills:

```php
$ftx->fills->all()
```
<hr>

#### Funding:

```php
$ftx->funding->all()
```
<hr>

#### Leveraged Tokens:

- List leveraged tokens
- Get token info
- Get leveraged token balances
- List leveraged token creation requests
- Request leveraged token creation
- List leveraged token redemption requests
- Request leveraged token redemption

```php
$ftx->leverageTokens->all(),
$ftx->leverageTokens->info(),
$ftx->leverageTokens->balances(),
$ftx->leverageTokens->creationRequests(),
$ftx->leverageTokens->requestCreation(),
$ftx->leverageTokens->redemptions(),
$ftx->leverageTokens->requestRedemption(),
```
<hr>

#### Options:

- List quote requests
- Your quote requests
- Create quote request
- Cancel quote request
- Get quotes for your quote request
- Create quote
- Get my quotes
- Cancel quote
- Accept options quote
- Get account options info
- Get options positions
- Get public options trades
- Get options fills
- Get 24h option volume
- Get historical volumes
- Get option open interest
- Get historical option open interest

```php
$ftx->options->requests(),
$ftx->options->myRequests(),
$ftx->options->cancelRequest(),
$ftx->options->quotesForRequest(),
$ftx->options->createQuote(),
$ftx->options->myQuotes(),
$ftx->options->cancelQuote(),
$ftx->options->acceptQuote(),
$ftx->options->accountInfo(),
$ftx->options->positions(),
$ftx->options->fills(),
$ftx->options->trades(),
```
<hr>


#### Stacking:

- Get stakes
- Get all unstake requests
- Get stake balances
- Unstake request
- Cancel unstake request
- Get staking rewards
- Stake request

```php
$ftx->staking->stakes(),
$ftx->staking->stake(),
$ftx->staking->unstake(),
$ftx->staking->unstakeRequests(),
$ftx->staking->cancelUnstake(),
$ftx->staking->balances(),
$ftx->staking->rewards(),
```
<hr>


#### Convert:

- Request quote
- Get quote status
- Accept quote

```php
$ftx->convert->requestQuote(),
$ftx->convert->status(),
$ftx->convert->accept(),
```
<hr>


#### Spot Margin:

- Get lending history
- Get borrow rates
- Get lending rates
- Get daily borrowed amounts
- Get market info
- Get my borrow history
- Get my lending history
- Get lending offers
- Get lending info
- Submit lending offer

```php
$ftx->spot->borrowRates(),
$ftx->spot->lendingRates(),
$ftx->spot->borrowSummary(),
$ftx->spot->marketInfo(),
$ftx->spot->borrowHistory(),
$ftx->spot->lendingHistory(),
$ftx->spot->globalLendingHistory(),
$ftx->spot->offers(),
$ftx->spot->submitLendingOffer(),
$ftx->spot->lendingInfo(),
```
<hr>

#### Latency statistics:

```php
$ftx->latency->statistics()
```
<hr>

#### Support tickets:

- Get all support tickets
- Get support ticket messages
- Create new ticket
- Send a support message
- Update the status of your support ticket
- Count total number of unread support messages
- Mark support messages read

```php
$ftx->support->tickets(),
$ftx->support->createTicket(),
$ftx->support->messages(),
$ftx->support->addMessage(),
$ftx->support->status(),
$ftx->support->countUnread(),
$ftx->support->markAsRead(),
```
<hr>


## Tests

Will be there soon.....

