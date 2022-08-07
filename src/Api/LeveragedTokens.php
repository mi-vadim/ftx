<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\LeveragedTokens as LeveragedTokensDictionary;

class LeveragedTokens extends HttpApi
{
    public function all()
    {
        return $this->respond($this->http->get(LeveragedTokensDictionary::LEVERAGED_TOKENS_URI));
    }

    public function info(string $token_name)
    {
        return $this->respond($this->http->get('lt/' . $token_name));
    }

    public function balances()
    {
        return $this->respond($this->http->get(LeveragedTokensDictionary::LEVERAGED_TOKENS_BALANCES_URI));
    }

    public function creationRequests()
    {
        return $this->respond($this->http->get(LeveragedTokensDictionary::LEVERAGED_TOKENS_CREATIONS_URI));
    }

    public function redemptions()
    {
        return $this->respond($this->http->get(LeveragedTokensDictionary::LEVERAGED_TOKENS_REDEMPTIONS_URI));
    }

    public function requestCreation(string $token_name, float $size)
    {
        return $this->respond($this->http->post('lt/'.$token_name.'/create', null, compact('size')));
    }

    public function requestRedemption(string $token_name, float $size)
    {
        return $this->respond($this->http->post('lt/'.$token_name.'/redeem', null, compact('size')));
    }
}
