<?php

declare(strict_types=1);

/**
 * StockPriceTest class
 *
 * @package  ShahariaAzam\BDStockExchange\Tests
 */

namespace ShahariaAzam\BDStockExchange\Tests;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use ShahariaAzam\BDStockExchange\StockExchange\ChittagongStockExchange;
use ShahariaAzam\BDStockExchange\StockExchange\DhakaStockExchange;
use ShahariaAzam\BDStockExchange\StockExchangeInterface;
use ShahariaAzam\BDStockExchange\StockPrice;

class StockPriceTest extends TestCase
{
    /**
     * @dataProvider getDSEDataProvider
     * @param StockExchangeInterface $stockExchange
     * @param $companyCode
     * @param $lastTradePrice
     * @param $changeInAmount
     * @param $changeInPercentage
     * @param $highPrice
     * @param $lowPrice
     */
    public function testDSEStockPrice(
        StockExchangeInterface $stockExchange,
        string $companyCode,
        float $lastTradePrice,
        $changeInAmount,
        $changeInPercentage,
        $highPrice,
        $lowPrice
    ) {
        $stock = new StockPrice($stockExchange);
        $pricing = $stock->getPricing();

        $this->assertSame($companyCode, $pricing[0]->getCompany());
        $this->assertSame($lastTradePrice, $pricing[0]->getLastTradeValue());
        $this->assertEquals($changeInAmount, $pricing[0]->getChangeInAmount());
        $this->assertEquals($changeInPercentage, $pricing[0]->getChangeInPercentage());
        $this->assertEquals($highPrice, $pricing[0]->getHighPrice());
        $this->assertEquals($lowPrice, $pricing[0]->getLowPrice());
    }

    public function getDSEDataProvider()
    {
        return [
            'stock price for 1JANATAMF from DSE' => [
                new DhakaStockExchange(
                    $this->buildHttpMockClient(__DIR__ . '/../data/dse.html')
                ),
                '1JANATAMF',
                4.1,
                0,
                0,
                null,
                null,
            ],
            'stock price for 1JANATAMF from CSE' => [
                new ChittagongStockExchange(
                    $this->buildHttpMockClient(__DIR__ . '/../data/cse.html')
                ),
                '1JANATAMF',
                4.1,
                0,
                null,
                4.1,
                4.1,
            ],
        ];
    }

    /**
     * @param $dataFile
     * @return ClientInterface
     */
    private function buildHttpMockClient($dataFile)
    {
        $response = new Response(200, [], file_get_contents($dataFile));

        /**
         * @var $mockHttpClient ClientInterface
         */
        $mockHttpClient = $this->getMockBuilder(ClientInterface::class)->getMock();
        $mockHttpClient->method('sendRequest')->willReturn($response);
        return $mockHttpClient;
    }
}
