<?php

namespace Shaharia\BDStockExchange\StockPrice;


use DOMDocument;
use DOMXPath;
use Sunra\PhpSimple\HtmlDomParser;

class DSE
{
    /**
     * @var string
     */
    protected $sourceUrl = "https://www.dsebd.org";

    /**
     * @var array
     */
    protected $pricingData;

    /**
     * @return array
     */
    public function getPricing()
    {
        $html = HtmlDomParser::file_get_html($this->sourceUrl);

        $data['dom'] = $data['simple_dom'] = array();

        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $x = new DOMXPath($dom);

        foreach ($x->query("//a[contains(concat(' ',normalize-space(@class),' '),' abhead ')]") as $node) {
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
        preg_match_all('([\w-\.]+)', $data, $cleaned);

        return $newArray = array(
            'company' => $cleaned[0][0],
            'lastTrade' => $cleaned[0][1],
            'changeAmount' => $cleaned[0][2],
            'changePercent' => $cleaned[0][3]."%",
        );
    }
}