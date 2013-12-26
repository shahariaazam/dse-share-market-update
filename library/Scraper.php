<?php

include("library/simpleHtmlDom/simple_html_dom.php");

class Scraper
{
    public function scrapData($url = null)
    {
        $html = $this->getDataByCurl($url);

        $data['dom'] = $data['simple_dom'] = array();

        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $x = new DOMXPath($dom);

        foreach ($x->query("//a[contains(concat(' ',normalize-space(@class),' '),' abhead ')]") as $node) {
            $array[] = $this->cleanData($node->nodeValue);
        }
        return $array;
    }

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

    protected function getDataByCurl ($url) {
        $ch = curl_init ($url) ;
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
        $res = curl_exec ($ch) ;
        curl_close ($ch) ;
        return ($res) ;
    }
}
