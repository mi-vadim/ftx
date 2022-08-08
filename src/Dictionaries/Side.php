<?php
declare(strict_types=1);

namespace FTX\Dictionaries;

enum Side : string
{
    case SIDE_BUY = 'buy';
    case SIDE_SELL = 'sell';
}
