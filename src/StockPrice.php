<?php

namespace Shaharia\BDStockExchange;


use Shaharia\BDStockExchange\StockPrice\DSE;

class StockPrice
{
    /**
     * StockPrice constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function getDSEPricing()
    {
        return (new DSE())->getPricing();
    }
}