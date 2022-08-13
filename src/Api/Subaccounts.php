<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;
use FTX\Responses\Subaccount\BalanceResponse;
use FTX\Responses\Subaccount\SubaccountResponse;

class Subaccounts extends HttpApi
{
    /**
     * Get all subaccounts
     *
     * @return SubaccountResponse[]
     */
    public function all(): array
    {
        return SubaccountResponse::collection(
            $this->get(Endpoint::SUBACCOUNTS->value)
        );
    }

    /**
     * Create subaccount
     *
     * @param string $nickname
     * @return SubaccountResponse
     * @throws \JsonException
     */
    public function create(string $nickname): SubaccountResponse
    {
        return SubaccountResponse::fromResponse(
            $this->post(Endpoint::SUBACCOUNTS->value, null, compact('nickname'))
        );
    }

    /**
     * Change subaccount name
     *
     * @param string $nickname Current nickname of subaccount
     * @param string $newNickname New nickname of subaccount
     * @return mixed
     */
    public function rename(string $nickname, string $newNickname)
    {
        return $this->post(Endpoint::SUBACCOUNTS_UPDATE_NAME->value, null, compact('nickname', 'newNickname'))
            ->toArray();
    }

    /**
     * Delete subaccount
     *
     * @param string $nickname
     * @return mixed
     */
    public function remove(string $nickname)
    {
        return $this->delete(Endpoint::SUBACCOUNTS->value, null, compact('nickname'))->toArray();
    }

    /**
     * Get subaccount balances
     *
     * @param string $nickname
     * @return BalanceResponse[]
     */
    public function balances(string $nickname) : array
    {
        $balances = [];
        $balancesResponse = $this->get(Endpoint::SUBACCOUNTS->withID($nickname) . '/balances')->toArray();

        foreach ($balancesResponse as $balance) {
            $balances[] = BalanceResponse::fromResponse($balance);
        }

        return $balances;
    }

    /**
     * Transfer between subaccounts
     *
     * @param string $coin
     * @param float $size
     * @param string|null $source
     * @param string|null $destination
     * @return mixed
     */
    public function transfer(string $coin, float $size, ?string $source = null, ?string $destination = null)
    {
        return $this->post(Endpoint::SUBACCOUNTS_TRANSFER->value, null, compact('coin', 'size', 'source', 'destination'))
            ->toArray();
    }
}
