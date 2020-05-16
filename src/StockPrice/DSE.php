<?php

namespace ShahariaAzam\BDStockExchange\StockPrice;


use DOMDocument;
use DOMXPath;
use Sunra\PhpSimple\HtmlDomParser;
use Symfony\Component\DomCrawler\Crawler;

class DSE
{
    /**
     * @var string
     */
    protected $sourceUrl = "https://www.dsebd.org";
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

        foreach ($dom->filterXPath("//a[contains(concat(' ',normalize-space(@class),' '),' abhead ')]") as $node) {
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
            'company' => $cleaned[0][0],
            'lastTrade' => $cleaned[0][1],
            'changeAmount' => $cleaned[0][2],
            'changePercent' => $cleaned[0][3]."%",
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