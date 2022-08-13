<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Dictionaries\Endpoint;
use FTX\Responses\Funding\FundingResponse;

class FundingPayments extends HttpApi
{
    /**
     * Funding Payments
     *
     * @param string|null $future
     * @param \DateTimeInterface|null $start_time
     * @param \DateTimeInterface|null $end_time
     * @return mixed
     */
    public function all(?string $future = null, ?\DateTimeInterface $start_time = null, ?\DateTimeInterface $end_time = null)
    {
        [$start_time, $end_time] = $this->transformTimestamps($start_time, $end_time);

        return FundingResponse::fromResponse(
            $this->get(Endpoint::FUNDING_PAYMENTS->value, compact('future', 'start_time', 'end_time'))
        );
    }

}
