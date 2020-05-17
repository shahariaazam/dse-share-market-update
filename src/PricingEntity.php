<?php
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
