<?php

include("library/simpleHtmlDom/simple_html_dom.php");

class Scraper
{
    public function scrapData($url = null)
    {
        $html = file_get_contents($url);

        $data['dom'] = $data['simple_dom'] = array();

        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $x = new DOMXPath($dom);

        foreach ($x->query("//a[contains(concat(' ',normalize-space(@class),' '),' abhead ')]") as $node) {
            $afterClean = $this->cleanData($node->nodeValue);
            $array[]    = $this->buildArray($afterClean);
        }
        return $array;
    }

    protected function cleanData($data = null)
    {
        $data = utf8_decode($data);
        $string = str_replace(" ", '', $data);
        return $newData = str_replace("&nbsp;", '*', htmlentities($string));
    }

    protected function buildArray($data = null)
    {
        $newData = explode('*', $data);
        $withoutEmptyValue = array_filter($newData, 'strlen');
        return array_values($withoutEmptyValue);
    }
}
