<?php
declare(strict_types=1);

namespace FTX\Api;

use DateTimeInterface;
use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\Fills as FillsDictionary;

class Fills extends HttpApi
{
    use TransformsTimestamps;

    public function all(
        ?string $market = null,
        ?DateTimeInterface $start_time = null,
        ?DateTimeInterface $end_time = null,
        ?string $order = null,
        ?int $orderId = null
    )
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return $this->respond($this->http->get(
            FillsDictionary::FILLS_URI,
            compact('market', 'start_time', 'end_time', 'order', 'orderId'))
        );
    }
}
