<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Responses\Latency\StatisticsResponse;

class Latency extends HttpApi
{
    /**
     * Latency statistics
     *
     * See latency statistics for a period of time and for one or all subaccounts.
     *
     * @param string $account
     * @param int|null $days
     * @return StatisticsResponse
     */
    public function statistics(string $account = '_main', ?int $days = null) : StatisticsResponse
    {
        return StatisticsResponse::fromResponse(
            response: $this->get('/stats/latency_stats', compact('days', 'account'))
        );
    }
}
