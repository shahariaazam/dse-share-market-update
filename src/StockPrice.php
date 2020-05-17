<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2020 Shaharia Azam <mail@shaharia.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace ShahariaAzam\BDStockExchange;

use Nyholm\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use ShahariaAzam\BDStockExchange\StockExchange\ChittagongStockExchange;
use ShahariaAzam\BDStockExchange\StockExchange\DhakaStockExchange;
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

    /**
     * This method is only to maintain backward compatibility
     *
     * @deprecated Try to follow README for updated usage instruction. This method will be removed in next major release
     */
    public function getDSEPricing()
    {
        $this->setStockExchange(new DhakaStockExchange());
        $this->stockExchange->setHttpClient($this->httpClient)
            ->fetchStockPrices();
        return $this->stockExchange->toArray();
    }

    /**
     * This method is only to maintain backward compatibility
     *
     * @deprecated Try to follow README for updated usage instruction. This method will be removed in next major release
     */
    public function getCSEPricing()
    {
        $this->setStockExchange(new ChittagongStockExchange());
        $this->stockExchange->setHttpClient($this->httpClient)
            ->fetchStockPrices();
        return $this->stockExchange->toArray();
    }
}
