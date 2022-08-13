<?php
declare(strict_types=1);

namespace FTX\Api;

use FTX\Responses\Convert\QuoteStatusResponse;
use FTX\Responses\Convert\RequestQuoteResponse;

class Convert extends HttpApi
{
    /**
     * Request quote
     *
     * @param string $fromCoin
     * @param string $toCoin
     * @param float $size
     * @return RequestQuoteResponse
     */
    public function requestQuote(string $fromCoin, string $toCoin, float $size) : RequestQuoteResponse
    {
        return RequestQuoteResponse::fromResponse(
            response: $this->post('/otc/quotes', [], compact('fromCoin', 'toCoin', 'size'))
        );
    }

    /**
     * Get quote status
     *
     * @param int $quoteID
     * @return QuoteStatusResponse
     */
    public function status(int $quoteID) : QuoteStatusResponse
    {
        return QuoteStatusResponse::fromResponse(
            response: $this->get('/otc/quotes/' . $quoteID)
        );
    }

    /**
     * Accept quote
     *
     * @param int $quoteID
     * @return array
     */
    public function accept(int $quoteID): array
    {
        return $this->get('/otc/quotes/' . $quoteID . '/accept')->toArray();
    }
}
