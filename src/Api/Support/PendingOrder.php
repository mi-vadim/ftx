<?php
declare(strict_types=1);

namespace FTX\Api\Support;

use FTX\Dictionaries\OrderType;
use FTX\Dictionaries\Side;

class PendingOrder extends PendingRequest
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

    public function market(float $size) : self
    {
        $this->attributes['type'] = OrderType::TYPE_MARKET->value;
        $this->attributes['size'] = $size;
        $this->attributes['price'] = null;

        return $this;
    }

    public function limit(float $size, float $price) : self
    {
        $this->attributes['type'] = OrderType::TYPE_LIMIT->value;
        $this->attributes['size'] = $size;
        $this->attributes['price'] = $price;

        return $this;
    }

    public function reduceOnly() : self
    {
        $this->attributes['reduceOnly'] = true;

        return $this;
    }

    public function immediateOrCancel() : self
    {
        $this->attributes['ioc'] = true;

        return $this;
    }

    public function postOnly() : self
    {
        $this->attributes['postOnly'] = true;

        return $this;
    }

    public function withClientId($clientId) : self
    {
        $this->attributes['clientId'] = $clientId;

        return $this;
    }

    public function place()
    {
        return $this->api->place($this);
    }
}
