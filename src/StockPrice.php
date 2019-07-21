<?php

namespace ShahariaAzam\BDStockExchange;


use ShahariaAzam\BDStockExchange\StockPrice\DSE;

class StockPrice
{
    /**
     * StockPrice constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        //Check whether cURL is enabled
        if(!function_exists('curl_version')){
            throw new \Exception("cURL is not enabled in your server.");
        }
    }

    /**
     * @return array
     */
    public function getDSEPricing()
    {
        return (new DSE())->getPricing();
    }
}