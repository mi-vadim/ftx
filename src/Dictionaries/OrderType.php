<?php
declare(strict_types=1);

namespace FTX\Dictionaries;

enum OrderType : string
{
    case TYPE_LIMIT = 'limit';
    case TYPE_MARKET = 'market';
    case TYPE_STOP = 'stop';
    case TYPE_TAKE_PROFIT = 'takeProfit';
    case TYPE_TRAILING_STOP = 'trailingStop';
}
