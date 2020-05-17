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

/**
 * PricingEntity class
 *
 * @package  ShahariaAzam\BDStockExchange
 */


namespace ShahariaAzam\BDStockExchange;

class PricingEntity
{
    /**
     * @var string
     */
    private $company;

    /**
     * @var float
     */
    private $lastTradeValue;

    /**
     * @var float
     */
    private $changeInAmount;

    /**
     * @var float
     */
    private $changeInPercentage;

    /**
     * @var float|null
     */
    private $highPrice;

    /**
     * @var float|null
     */
    private $lowPrice;

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return PricingEntity
     */
    public function setCompany(string $company): PricingEntity
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return float
     */
    public function getLastTradeValue(): float
    {
        return $this->lastTradeValue;
    }

    /**
     * @param float $lastTradeValue
     * @return PricingEntity
     */
    public function setLastTradeValue(float $lastTradeValue): PricingEntity
    {
        $this->lastTradeValue = $lastTradeValue;
        return $this;
    }

    /**
     * @return float
     */
    public function getChangeInAmount(): float
    {
        return $this->changeInAmount;
    }

    /**
     * @param float $changeInAmount
     * @return PricingEntity
     */
    public function setChangeInAmount(float $changeInAmount): PricingEntity
    {
        $this->changeInAmount = $changeInAmount;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getChangeInPercentage()
    {
        return $this->changeInPercentage;
    }

    /**
     * @param float $changeInPercentage
     * @return PricingEntity
     */
    public function setChangeInPercentage(float $changeInPercentage): PricingEntity
    {
        $this->changeInPercentage = $changeInPercentage;
        return $this;
    }

    /**
     * @TODO We can get this only for CSE. For DSE we need to parse data
     *
     * @return float|null
     */
    public function getHighPrice()
    {
        return $this->highPrice;
    }

    /**
     * @param float|null $highPrice
     * @return PricingEntity
     */
    public function setHighPrice($highPrice)
    {
        $this->highPrice = $highPrice;
        return $this;
    }

    /**
     * @TODO We can get this only for CSE. For DSE we need to parse data
     *
     * @return float|null
     */
    public function getLowPrice()
    {
        return $this->lowPrice;
    }

    /**
     * @param float|null $lowPrice
     * @return PricingEntity
     */
    public function setLowPrice($lowPrice)
    {
        $this->lowPrice = $lowPrice;
        return $this;
    }

    /**
     * Transform entity into array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'company' => $this->getCompany(),
            'lastTradeValue' => $this->getLastTradeValue(),
            'changeInAmount' => $this->getChangeInAmount(),
            'changeInPercentage' => $this->getChangeInPercentage(),
            'highPrice' => $this->getHighPrice(),
            'lowPrice' => $this->getLowPrice()
        ];
    }
}
