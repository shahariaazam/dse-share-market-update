<?php

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
        preg_match_all('([\w!\d+(?:\.\d+)?!]+)', $data, $cleaned);

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
