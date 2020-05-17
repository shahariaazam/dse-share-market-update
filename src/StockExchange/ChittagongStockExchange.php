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

namespace ShahariaAzam\BDStockExchange\StockExchange;

use Nyholm\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use ShahariaAzam\BDStockExchange\PricingEntity;
use ShahariaAzam\BDStockExchange\StockExchangeInterface;
use Symfony\Component\DomCrawler\Crawler;

class ChittagongStockExchange implements StockExchangeInterface
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
     * @var string
     */
    private $endpoint;

    /**
     * @var PricingEntity[]
     */
    private $pricing;

    public function __construct()
    {
        $this->endpoint = "https://www.cse.com.bd/market/current_price";
    }

    /**
     * @return StockExchangeInterface
     */
    public function fetchStockPrices()
    {
        $request = new Request('GET', $this->endpoint);
        $response = $this->httpClient->sendRequest($request);
        $dom = new Crawler((string) $response->getBody());

        $stockDom = $dom->filterXPath("//*[@id=\"dataTable\"]/tbody/tr");

        foreach ($stockDom as $node) {
            $this->pricing[] = $this->cleanData($node->nodeValue);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setHttpClient(ClientInterface $client)
    {
        $this->httpClient = $client;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setHttpHeaders(array $headers = [])
    {
        $this->httpHeaders= $headers;
        return $this;
    }

    /**
     * @return PricingEntity[]
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    public function toArray()
    {
        if (count($this->pricing) < 1) {
            return [];
        }

        return array_map(function (PricingEntity $entity) {
            return $entity->toArray();
        }, $this->pricing);
    }

    /**
     * @param $data
     * @return PricingEntity
     */
    protected function cleanData($data)
    {
        $data = utf8_decode($data);
        preg_match_all('([\w!\d+(?:.\d+)?!]+)', $data, $cleaned);

        $pricingData = array_pop($cleaned);

        $pricingEntity = new PricingEntity();
        $pricingEntity->setCompany($pricingData[1]);
        $pricingEntity->setLastTradeValue((float) $pricingData[2]);
        $pricingEntity->setHighPrice((float)$pricingData[4]);
        $pricingEntity->setLowPrice((float)$pricingData[5]);
        $pricingEntity->setChangeInAmount((float) $pricingData[6] - (float) $pricingData[2]);
        return $pricingEntity;
    }
}
