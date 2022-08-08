<?php
declare(strict_types=1);

namespace FTX\Dictionaries;

enum Endpoint : string
{
    case ACCOUNTS                       = 'account';
    case POSITIONS                      = 'positions';
    case ACCOUNTS_LEVERAGE              = 'account/leverage';
    case HISTORICAL_BALANCES            = 'historical_balances/requests';
    case ORDERS                         = 'orders';
    case COND_ORDERS                    = 'conditional_orders';
    case COND_ORDERS_HISTORY            = 'conditional_orders/history';
    case FILLS                          = 'fills';
    case FUNDING_PAYMENTS               = 'funding_payments';
    case FUTURES                        = 'futures';
    case FUNDING_RATES                  = 'funding_rates';
    case EXPIRED_FUTURES                = 'expired_futures';
    case LEVERAGED_INFO                 = 'lt';
    case LEVERAGED_TOKENS               = 'lt/tokens';
    case LEVERAGED_TOKENS_BALANCES      = 'lt/balances';
    case LEVERAGED_TOKENS_CREATIONS     = 'lt/creations';
    case LEVERAGED_TOKENS_REDEMPTIONS   = 'lt/redemptions';
    case MARKETS                        = 'markets';

    case OPTIONS                        = 'options';
    case OPTIONS_REQUESTS               = 'options/requests';
    case OPTIONS_QUOTES                 = 'options/quotes';
    case OPTIONS_MY_REQUESTS            = 'options/my_requests';
    case OPTIONS_TRADES                 = 'options/trades';
    case OPTIONS_POSITIONS              = 'options/positions';
    case OPTIONS_FILLS                  = 'options/fills';
    case OPTIONS_ACCOUNT_INFO           = 'options/account_info';
    case OPTIONS_MY_QUOTES              = 'options/my_quotes';

    case ORDERS_HISTORY                 = 'orders/history';

    case SPOT_MARGIN                    = 'spot_margin';
    case SPOT_MARGIN_OFFERS             = 'spot_margin/offers';
    case SPOT_MARGIN_HISTORY            = 'spot_margin/history';
    case SPOT_MARGIN_BORROW_RATES       = 'spot_margin/borrow_rates';
    case SPOT_MARGIN_LENDING_RATES      = 'spot_margin/lending_rates';
    case SPOT_MARGIN_LENDING_INFO       = 'spot_margin/lending_info';
    case SPOT_MARGIN_BORROW_SUMMARY     = 'spot_margin/borrow_summary';
    case SPOT_MARGIN_MARKET_INFO        = 'spot_margin/market_info';
    case SPOT_MARGIN_BORROW_HISTORY     = 'spot_margin/borrow_history';
    case SPOT_MARGIN_LENDING_HISTORY    = 'spot_margin/lending_history';

    case SUBACCOUNTS                    = 'subaccounts';
    case SUBACCOUNTS_UPDATE_NAME        = 'subaccounts/update_name';
    case SUBACCOUNTS_TRANSFER           = 'subaccounts/transfer';
    case WALLET_COINS                   = 'wallet/coins';
    case WALLET_BALANCES                = 'wallet/balances';
    case WALLET_ALL_BALANCES            = 'wallet/all_balances';
    case WALLET_DEPOSIT_ADDRESS         = 'wallet/deposit_address';
    case WALLET_DEPOSITS                = 'wallet/deposits';
    case WALLET_WITHDRAWALS             = 'wallet/withdrawals';
    case WALLET_WITHDRAWAL_FEES         = 'wallet/withdrawal_fee';

    public function withID(string $id): string
    {
        return $this->value . '/' . $id;
    }
}
