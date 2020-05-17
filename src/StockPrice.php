<?php

namespace ShahariaAzam\BDStockExchange;

use Nyholm\Psr7\Request;
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

    /**
     * @var PricingEntity[]
     */
    private $pricing;

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
     * @return StockPrice
     * @throws StockExceptions
     */
    public function fetch()
    {
        if (empty($this->stockExchange->getPricing())) {
            $this->stockExchange->setHttpClient($this->httpClient)
                ->fetchStockPrices();
        }

        return $this;
    }

    /**
     * @return PricingEntity[]
     * @throws StockExceptions
     */
    public function getPricing()
    {
        if (empty($this->stockExchange->getPricing())) {
            $this->fetch();
        }
        
        return $this->stockExchange->getPricing();
    }

    /**
     * @return array
     * @throws StockExceptions
     */
    public function toArray()
    {
        if (empty($this->stockExchange->getPricing())) {
            $this->fetch();
        }

        return $this->stockExchange->toArray();
    }
}
