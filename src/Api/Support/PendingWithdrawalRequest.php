<?php
declare(strict_types=1);

namespace FTX\Api\Support;

class PendingWithdrawalRequest extends PendingRequest
{
    public function withTag($tag) : self
    {
        $this->attributes['tag'] = $tag;

        return $this;
    }

    public function withPassword($password) : self
    {
        $this->attributes['password'] = $password;

        return $this;
    }

    public function withCode($code) : self
    {
        $this->attributes['code'] = $code;

        return $this;
    }

    public function fees()
    {
        return $this->api->fees($this);
    }

    public function withdraw()
    {
        return $this->api->withdraw($this);
    }
}
