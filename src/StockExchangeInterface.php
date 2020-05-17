<?php


namespace ShahariaAzam\BDStockExchange;

use Psr\Http\Client\ClientInterface;

interface StockExchangeInterface
{
    /**
     * @param ClientInterface $client
     * @return StockExchangeInterface
     */
    public function setHttpClient(ClientInterface $client);

    /**
     * @param array $headers
     * @return array
     */
    public function setHttpHeaders(array $headers = []);

    /**
     * @return StockExchangeInterface
     * @throws StockExceptions
     */
    public function fetchStockPrices();

    /**
     * @return PricingEntity[]
     */
    public function getPricing();

    /**
     * @return array
     */
    public function toArray();
}
