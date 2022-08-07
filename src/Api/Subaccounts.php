<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Subaccounts as SubaccountsDictionary;

class Subaccounts extends HttpApi
{
    public function all()
    {
        return $this->respond($this->http->get(SubaccountsDictionary::SUBACCOUNTS_URI));
    }

    public function create(string $nickname)
    {
        return $this->respond($this->http->post(SubaccountsDictionary::SUBACCOUNTS_URI, null, compact('nickname')));
    }

    public function rename(string $nickname, string $newNickname)
    {
        return $this->respond($this->http->post(SubaccountsDictionary::SUBACCOUNTS_UPDATE_NAME_URI, null, compact('nickname', 'newNickname')));
    }

    public function delete(string $nickname)
    {
        return $this->respond($this->http->delete(SubaccountsDictionary::SUBACCOUNTS_URI, null, compact('nickname')));
    }

    public function balances(string $nickname)
    {
        return $this->respond($this->http->get(SubaccountsDictionary::SUBACCOUNTS_URI.'/'.$nickname.'/balances'));
    }

    public function transfer(string $coin, float $size, ?string $source = null, ?string $destination = null)
    {
        return $this->respond($this->http->post(SubaccountsDictionary::SUBACCOUNTS_TRANSFER_URI, null, compact('coin', 'size', 'source', 'destination')));
    }
}
