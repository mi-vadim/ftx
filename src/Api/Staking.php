<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Responses\Stacking\BalancesResponse;
use FTX\Responses\Stacking\RewardsResponse;
use FTX\Responses\Stacking\StakeResponse;
use FTX\Responses\Stacking\UnstakeResponse;

class Staking extends HttpApi
{
    /**
     * Get stakes
     *
     * @return StakeResponse[]
     */
    public function stakes(): array
    {
        return StakeResponse::collection(
            response: $this->get('/staking/stakes')
        );
    }

    /**
     * Stake request
     *
     * @param string $coin
     * @param float $size
     * @return StakeResponse
     */
    public function stake(string $coin, float $size): StakeResponse
    {
        return StakeResponse::fromResponse(
            response: $this->post('/srm_stakes/stakes', [], compact('coin', 'size'))
        );
    }

    /**
     * Unstake request
     *
     * @param string $coin
     * @param float $size
     * @return UnstakeResponse
     */
    public function unstake(string $coin, float $size): UnstakeResponse
    {
        return UnstakeResponse::fromResponse(
            response: $this->post('/staking/unstake_requests', [], compact('coin', 'size'))
        );
    }

    /**
     * All unstake requests
     *
     * @return UnstakeResponse[]
     */
    public function unstakeRequests(): array
    {
        return UnstakeResponse::collection(
            response: $this->get('/staking/unstake_requests', [])
        );
    }

    /**
     * Cancel unstake request
     *
     * @param int $requestID
     * @return array
     */
    public function cancelUnstake(int $requestID): array
    {
        return $this->delete('/staking/unstake_requests/' . $requestID)->toArray();
    }

    /**
     * Get stake balances
     *
     * Returns actively staked, scheduled for unstaking and lifetime rewards balances
     *
     * @return BalancesResponse[]
     */
    public function balances(): array
    {
        return BalancesResponse::collection(
            response: $this->get('/staking/balances')
        );
    }

    /**
     * Get staking rewards
     *
     * @return RewardsResponse[]
     */
    public function rewards(): array
    {
        return RewardsResponse::collection(
            response: $this->get('/staking/staking_rewards')
        );
    }
}
