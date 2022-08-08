<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;

class Subaccounts extends HttpApi
{
    /**
     * Get all subaccounts
     *
     * @return mixed
     */
    public function all()
    {
        return $this->respond($this->get(Endpoint::SUBACCOUNTS->value));
    }

    /**
     * Create subaccount
     *
     * @param string $nickname
     * @return mixed
     */
    public function create(string $nickname)
    {
        return $this->respond($this->post(Endpoint::SUBACCOUNTS->value, null, compact('nickname')));
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
        return $this->respond($this->post(Endpoint::SUBACCOUNTS_UPDATE_NAME->value, null, compact('nickname', 'newNickname')));
    }

    /**
     * Delete subaccount
     *
     * @param string $nickname
     * @return mixed
     */
    public function remove(string $nickname)
    {
        return $this->respond($this->delete(Endpoint::SUBACCOUNTS->value, null, compact('nickname')));
    }

    /**
     * Get subaccount balances
     *
     * @param string $nickname
     * @return mixed
     */
    public function balances(string $nickname)
    {
        return $this->respond($this->get(Endpoint::SUBACCOUNTS->withID($nickname) . '/balances'));
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
        return $this->respond($this->post(Endpoint::SUBACCOUNTS_TRANSFER->value, null, compact('coin', 'size', 'source', 'destination')));
    }
}
