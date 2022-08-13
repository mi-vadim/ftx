<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;
use FTX\Responses\LeveragedTokens\BalancesResponse;
use FTX\Responses\LeveragedTokens\TokenCreationResponse;
use FTX\Responses\LeveragedTokens\TokenInfoResponse;
use FTX\Responses\LeveragedTokens\TokenRedemptionResponse;

class LeveragedTokens extends HttpApi
{
    /**
     * List leveraged tokens
     *
     * @return TokenInfoResponse[]
     */
    public function all() : array
    {
        return TokenInfoResponse::collection(
            response: $this->get(Endpoint::LEVERAGED_TOKENS->value)
        );
    }

    /**
     * Get token info
     *
     * @param string $token_name
     * @return TokenInfoResponse
     */
    public function info(string $token_name) : TokenInfoResponse
    {
        return TokenInfoResponse::fromResponse(
            response: $this->get(Endpoint::LEVERAGED_INFO->withID($token_name))
        );
    }

    /**
     * Get leveraged token balances
     *
     * @return BalancesResponse[]
     */
    public function balances() : array
    {
        return BalancesResponse::collection(
            response: $this->get(Endpoint::LEVERAGED_TOKENS_BALANCES->value)
        );
    }

    /**
     * List leveraged token creation requests
     *
     * @return TokenCreationResponse
     */
    public function creationRequests() : TokenCreationResponse
    {
        return TokenCreationResponse::fromResponse(
            response: $this->get(Endpoint::LEVERAGED_TOKENS_CREATIONS->value)
        );
    }

    /**
     * Request leveraged token creation
     *
     * @param string $token_name
     * @param float $size
     * @return TokenCreationResponse
     */
    public function requestCreation(string $token_name, float $size) : TokenCreationResponse
    {
        return TokenCreationResponse::fromResponse(
            response: $this->post(Endpoint::LEVERAGED_INFO->withID($token_name) . '/create', null, compact('size'))
        );
    }

    /**
     * List leveraged token redemption requests
     *
     * @return TokenRedemptionResponse
     */
    public function redemptions() : TokenRedemptionResponse
    {
        return TokenRedemptionResponse::fromResponse(
            response: $this->get(Endpoint::LEVERAGED_TOKENS_REDEMPTIONS->value)
        );
    }

    /**
     * Request leveraged token redemption
     *
     * @param string $token_name
     * @param float $size
     * @return TokenRedemptionResponse
     */
    public function requestRedemption(string $token_name, float $size): TokenRedemptionResponse
    {
        return TokenRedemptionResponse::fromResponse(
            response: $this->post(Endpoint::LEVERAGED_INFO->withID($token_name) . '/redeem', null, compact('size'))
        );
    }
}
