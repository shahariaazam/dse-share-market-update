<?php

namespace ShahariaAzam\BDStockExchange;

use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpClient\Psr18Client;

class StockPrice
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var array
     */
    private $httpHeaders;

    /**
     * @var StockExchangeInterface
     */
    private $stockExchange;

    public function __construct()
    {
        $this->httpHeaders = [];
        $this->httpClient = new Psr18Client();
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param ClientInterface $httpClient
     * @return StockPrice
     */
    public function setHttpClient(ClientInterface $httpClient): StockPrice
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return array
     */
    public function getHttpHeaders(): array
    {
        return $this->httpHeaders;
    }

    /**
     * @param array $httpHeaders
     * @return StockPrice
     */
    public function setHttpHeaders(array $httpHeaders): StockPrice
    {
        $this->httpHeaders = $httpHeaders;
        return $this;
    }

    /**
     * @return StockExchangeInterface
     */
    public function getStockExchange(): StockExchangeInterface
    {
        return $this->stockExchange;
    }

    /**
     * @param StockExchangeInterface $stockExchange
     * @return StockPrice
     */
    public function setStockExchange(StockExchangeInterface $stockExchange): StockPrice
    {
        $this->stockExchange = $stockExchange;
        return $this;
    }

    /**
     * @return StockExchangeInterface
     * @throws StockExceptions
     */
    public function getPricing()
    {
        return $this->stockExchange->setHttpClient($this->httpClient)
            ->fetchStockPrices();
    }
}
