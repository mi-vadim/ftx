<?php
declare(strict_types=1);

namespace FTX\Api;

use DateTimeInterface;
use FTX\Dictionaries\Endpoint;

class Fills extends HttpApi
{
    /**
     * Fills
     *
     * @param string|null $market
     * @param DateTimeInterface|null $start_time
     * @param DateTimeInterface|null $end_time
     * @param string|null $order
     * @param int|null $orderId
     * @return mixed
     */
    public function all(
        ?string $market = null,
        ?DateTimeInterface $start_time = null,
        ?DateTimeInterface $end_time = null,
        ?string $order = null,
        ?int $orderId = null
    )
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->get(
            Endpoint::FILLS->value,
            compact('market', 'start_time', 'end_time', 'order', 'orderId'))
        );
    }
}
