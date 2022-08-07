<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Api\Traits\TransformsTimestamps;
use FTX\Dictionaries\FundingPayments as FundingPaymentsDictionary;

class FundingPayments extends HttpApi
{
    use TransformsTimestamps;

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
        return $this->respond($this->http->get(FundingPaymentsDictionary::FUNDING_PAYMENTS_URI, compact('future', 'start_time', 'end_time')));
    }

}
