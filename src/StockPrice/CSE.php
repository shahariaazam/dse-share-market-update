<?php

namespace ShahariaAzam\BDStockExchange\StockPrice;

use Symfony\Component\DomCrawler\Crawler;

class CSE
{
    /**
     * @var string
     */
    protected $sourceUrl = "https://www.cse.com.bd/market/current_price";
    protected $curlUserAgent = "Shaharia's Tools - Make life easier everyday";

    /**
     * @var array
     */
    protected $pricingData;

    /**
     * @return array
     */
    public function getPricing()
    {
        $dom = new Crawler($this->getWebpage());

        $stockDom = $dom->filterXPath("//*[@id=\"dataTable\"]/tbody/tr");

        foreach ($stockDom as $node){
            $array[] = $this->cleanData($node->nodeValue);
        }

        return $array;
    }

    /**
     * @param null $data
     * @return array
     */
    protected function cleanData($data = null)
    {
        $data = utf8_decode($data);
        preg_match_all('([\w!\d+(?:\.\d+)?!]+)', $data, $cleaned);

        return $newArray = array(
            'company' => $cleaned[0][1],
            'lastTrade' => $cleaned[0][2],
            'high_price' => $cleaned[0][4],
            'low_price' => $cleaned[0][5],
            'yesterday_closing' => $cleaned[0][6],
            'changeAmount' => (float) $cleaned[0][6] - (float) $cleaned[0][2]
            //'changeAmount' => $cleaned[0][6] - $cleaned[0][2],
            //'changePercent' => ((($cleaned[0][6] - $cleaned[0][2])/$cleaned[0][6])*100)."%",
        );
    }

    /**
     * @param array $options
     * @return bool|string
     *
     * @TODO need to check any error on HTTP request
     */
    protected function getWebpage(array $options = [])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->sourceUrl,
            CURLOPT_USERAGENT => $this->curlUserAgent
        ]);
        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;
    }
}