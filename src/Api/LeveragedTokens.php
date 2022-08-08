<?php
declare(strict_types=1);

namespace FTX\Api;


use FTX\Dictionaries\Endpoint;

class LeveragedTokens extends HttpApi
{
    /**
     * List leveraged tokens
     *
     * @return mixed
     */
    public function all()
    {
        return $this->respond($this->get(Endpoint::LEVERAGED_TOKENS->value));
    }

    /**
     * Get token info
     *
     * @param string $token_name
     * @return mixed
     */
    public function info(string $token_name)
    {
        return $this->respond($this->get(Endpoint::LEVERAGED_INFO->withID($token_name)));
    }

    /**
     * Get leveraged token balances
     *
     * @return mixed
     */
    public function balances()
    {
        return $this->respond($this->get(Endpoint::LEVERAGED_TOKENS_BALANCES->value));
    }

    /**
     * List leveraged token creation requests
     *
     * @return mixed
     */
    public function creationRequests()
    {
        return $this->respond($this->get(Endpoint::LEVERAGED_TOKENS_CREATIONS->value));
    }

    /**
     * Request leveraged token creation
     *
     * @param string $token_name
     * @param float $size
     * @return mixed
     */
    public function requestCreation(string $token_name, float $size)
    {
        return $this->respond($this->post(Endpoint::LEVERAGED_INFO->withID($token_name) . '/create', null, compact('size')));
    }

    /**
     * List leveraged token redemption requests
     *
     * @return mixed
     */
    public function redemptions()
    {
        return $this->respond($this->get(Endpoint::LEVERAGED_TOKENS_REDEMPTIONS->value));
    }

    /**
     * Request leveraged token redemption
     *
     * @param string $token_name
     * @param float $size
     * @return mixed
     */
    public function requestRedemption(string $token_name, float $size)
    {
        return $this->respond($this->post(Endpoint::LEVERAGED_INFO->withID($token_name) . '/redeem', null, compact('size')));
    }
}
