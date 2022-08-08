<?php
declare(strict_types=1);

namespace FTX\Api\Support;

use FTX\Dictionaries\OrderType;
use FTX\Dictionaries\Side;

class PendingConditionalOrder extends PendingRequest
{
    public function buy(string $market) : self
    {
        $this->attributes['market'] = $market;
        $this->attributes['side'] = Side::SIDE_BUY->value;

        return $this;
    }

    public function sell(string $market) : self
    {
        $this->attributes['market'] = $market;
        $this->attributes['side'] = Side::SIDE_SELL->value;

        return $this;
    }

    public function takeProfit(float $size, float $triggerPrice, ?float $orderPrice = null) : self
    {
        $this->attributes['type'] = OrderType::TYPE_TAKE_PROFIT->value;
        $this->attributes['size'] = $size;
        $this->attributes['triggerPrice'] = $triggerPrice;
        $this->attributes['orderPrice'] = $orderPrice;

        return $this;
    }

    public function stop(float $size, float $triggerPrice, ?float $orderPrice = null) : self
    {
        $this->attributes['type'] = OrderType::TYPE_STOP->value;
        $this->attributes['size'] = $size;
        $this->attributes['triggerPrice'] = $triggerPrice;
        $this->attributes['orderPrice'] = $orderPrice;

        return $this;
    }

    public function trailingStop(float $size, float $trailValue) : self
    {
        $this->attributes['type'] = OrderType::TYPE_TRAILING_STOP->value;
        $this->attributes['size'] = $size;
        $this->attributes['trailValue'] = $trailValue;

        return $this;
    }

    public function reduceOnly() : self
    {
        $this->attributes['reduceOnly'] = true;

        return $this;
    }

    public function retryUntilFilled(bool $retry) : self
    {
        $this->attributes['retryUntilFilled'] = $retry;

        return $this;
    }

    public function place()
    {
        return $this->api->place($this);
    }
}
