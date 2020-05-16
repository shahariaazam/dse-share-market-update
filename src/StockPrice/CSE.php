<?php

namespace ShahariaAzam\BDStockExchange\StockPrice;


use DOMDocument;
use DOMXPath;
use Sunra\PhpSimple\HtmlDomParser;

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
        $html = HtmlDomParser::str_get_html($this->getWebpage());

        $data['dom'] = $data['simple_dom'] = array();

        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $x = new DOMXPath($dom);

        $stockDom = $x->query("//*[@id=\"dataTable\"]/tbody/tr");

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
            'changeAmount' => $cleaned[0][6] - $cleaned[0][2]
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