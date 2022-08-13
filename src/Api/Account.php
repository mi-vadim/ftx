<?php
declare(strict_types=1);

namespace FTX\Api;

use DateTimeInterface;
use FTX\Dictionaries\Endpoint;
use FTX\Responses\Account\AccountInfo;
use FTX\Responses\Account\Position;
use FTX\Responses\Account\RequestSnapshot;
use FTX\Responses\Account\Snapshot;
use JsonException;

class Account extends HttpApi
{
    /**
     * Get account information
     *
     * @return AccountInfo
     * @throws JsonException
     */
    public function info() : AccountInfo
    {
        return AccountInfo::fromResponse(
            response: $this->get(Endpoint::ACCOUNTS->value)
        );
    }

    /**
     * Request historical balances and positions snapshot
     *
     * @param array $accounts
     * @param DateTimeInterface|null $endTime
     * @return RequestSnapshot
     * @throws JsonException
     */
    public function requestHistoricalBalances(array $accounts, ?DateTimeInterface $endTime): RequestSnapshot
    {
        [$endTime] = $this->transformTimestamps($endTime);

        return RequestSnapshot::fromResponse(
            response: $this->post(Endpoint::HISTORICAL_BALANCES->value, null, [
                'accounts' => $accounts,
                'end_time' => $endTime
            ])
        );
    }

    /**
     * Get historical balances and positions snapshot
     *
     * @param int $requestID
     * @return mixed
     * @throws JsonException
     */
    public function historicalBalance(int $requestID): Snapshot
    {
        return Snapshot::fromResponse(
            response: $this->get(Endpoint::HISTORICAL_BALANCES->withID((string) $requestID))
        );
    }

    /**
     * Get all historical balances and positions snapshots
     *
     * @return Snapshot[]
     * @throws JsonException
     */
    public function historicalBalances(): array
    {
        return Snapshot::collection(
            response: $this->get(Endpoint::HISTORICAL_BALANCES->value)
        );
    }

    /**
     * Get positions
     *
     * @param bool $showAvgPrice
     * @return mixed
     * @throws JsonException
     */
    public function positions(bool $showAvgPrice = false): Position
    {
        return Position::fromResponse(
            response: $this->get(Endpoint::POSITIONS->value, compact('showAvgPrice'))
        );
    }

    /**
     * Change account leverage
     *
     * @param int $leverage Desired account-wide leverage setting
     * @return array
     * @throws JsonException
     */
    public function changeAccountLeverage(int $leverage): array
    {
        return $this
            ->post(Endpoint::ACCOUNTS_LEVERAGE->value, null, compact('leverage'))
            ->toArray();
    }
}
