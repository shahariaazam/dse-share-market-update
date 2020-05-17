<?php
/**
 * StockPriceTest class
 *
 * @package  ShahariaAzam\BDStockExchange\Tests
 */


namespace ShahariaAzam\BDStockExchange\Tests;

use Http\Message\StreamFactory\DiactorosStreamFactory;
use Http\Mock\Client;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use ShahariaAzam\BDStockExchange\PricingEntity;
use ShahariaAzam\BDStockExchange\StockExchange\ChittagongStockExchange;
use ShahariaAzam\BDStockExchange\StockExchange\DhakaStockExchange;
use ShahariaAzam\BDStockExchange\StockPrice;

class StockPriceTest extends TestCase
{
    private $dataDirectory;

    public function setUp(): void
    {
        parent::setUp();
        $this->dataDirectory = dirname( __DIR__ ) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR;
    }

    public function testDSEStockPrice()
    {
        $dse = new DhakaStockExchange();

        $stock = new StockPrice();
        $stock->setHttpClient($this->buildHttpMockClient($this->dataDirectory . 'dse.html'));
        $stock->setStockExchange($dse);
        $pricing = $stock->getPricing();

        $this->assertIsArray($pricing);
        $this->assertIsObject($pricing[0]);
        $this->assertTrue($pricing[0] instanceof PricingEntity);
        $this->assertEquals('1JANATAMF', $pricing[0]->getCompany());
        $this->assertEquals(4.1, $pricing[0]->getLastTradeValue());
        $this->assertEquals(0, $pricing[0]->getChangeInAmount());
        $this->assertEquals(0, $pricing[0]->getChangeInPercentage());
        $this->assertNull($pricing[0]->getHighPrice());
        $this->assertNull($pricing[0]->getLowPrice());
    }

    public function testCSEStockPrice()
    {
        $dse = new ChittagongStockExchange();

        $stock = new StockPrice();
        $stock->setHttpClient($this->buildHttpMockClient($this->dataDirectory . 'cse.html'));
        $stock->setStockExchange($dse);
        $pricing = $stock->getPricing();

        $this->assertIsArray($pricing);
        $this->assertIsObject($pricing[0]);
        $this->assertTrue($pricing[0] instanceof PricingEntity);
        $this->assertEquals('1JANATAMF', $pricing[0]->getCompany());
        $this->assertEquals(4.1, $pricing[0]->getLastTradeValue());
        $this->assertEquals(0, $pricing[0]->getChangeInAmount());
        $this->assertNull($pricing[0]->getChangeInPercentage());
        $this->assertEquals(4.1, $pricing[0]->getHighPrice());
        $this->assertEquals(4.1, $pricing[0]->getLowPrice());
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
