
![Code Checks](https://github.com/shahariaazam/DSE-Share-Market-Update/workflows/Code-Checks/badge.svg)
![Build](https://scrutinizer-ci.com/g/shahariaazam/DSE-Share-Market-Update/badges/build.png?b=master)
![Code Coverage](https://scrutinizer-ci.com/g/shahariaazam/DSE-Share-Market-Update/badges/coverage.png?b=master)
![Code Rating](https://scrutinizer-ci.com/g/shahariaazam/DSE-Share-Market-Update/badges/quality-score.png?b=master)
![Code Intellegence](https://scrutinizer-ci.com/g/shahariaazam/DSE-Share-Market-Update/badges/code-intelligence.svg?b=master)

![Dhaka Stock Exchange & Chittagong Stock Exchange Pricing Data Library in PHP](https://i.imgur.com/ilr49U7.jpg)

## Bangladesh Stock Exchange

This PHP library provides a simple way to get and parse the stock price for [Dhaka Stock Exchange](https://www.dsebd.org) & [Chittagong Stock Exchange](https://www.cse.com.bd/) in real time directly
from the official website.

### Installation

Install this library via `composer` by running the following command

`composer require shahariaazam/bd-stock-exchange`


Note: This library has been upgraded from it's old (legacy) code and made it as a standard library.
if you still want to use legacy (OLD) codes, you can find that in [old-legacy-codes](https://github.com/shahariaazam/DSE-Share-Market-Update/tree/old-legacy-codes) branch.

Or you can download OLD codes as `zip`. [Click here](https://github.com/shahariaazam/DSE-Share-Market-Update/raw/old-legacy-codes/dse.zip) to download old codes.


### Usage

After installing you can simply get the latest Dhaka Stock Exchange price data

#### Get Bangladeshi Stock Exchange Share Price
```php
<?php

use ShahariaAzam\BDStockExchange\StockExchange\ChittagongStockExchange;
use ShahariaAzam\BDStockExchange\StockExchange\DhakaStockExchange;
use ShahariaAzam\BDStockExchange\StockPrice;

require "vendor/autoload.php";

$dse = new DhakaStockExchange();    // For Dhaka Stock Exchange
// $cse = new ChittagongStockExchange();    // For Chittagong Stock Exchange

$stock = new StockPrice();
$stock->setStockExchange($dse);
var_dump($stock->getPricing()->toArray());
```

And you are done. You will get the following output

```
array(350) {
  [0] =>
  array(6) {
    'company' =>
    string(9) "1JANATAMF"
    'lastTradeValue' =>
    double(4.1)
    'changeInAmount' =>
    double(0)
    'changeInPercentage' =>
    double(0)
  }
```

### Contribution

This is a helpful PHP library for programmers who want to get the latest Bangladesh stock exchange market data 
in their PHP application.

I always welcome any people who want to contribute to this library if it helps. You can contribute by doing -

- Creating Issue from [https://github.com/shahariaazam/DSE-Share-Market-Update/issues/new](https://github.com/shahariaazam/DSE-Share-Market-Update/issues/new)
- Fixing existing issues from [https://github.com/shahariaazam/DSE-Share-Market-Update/issues](https://github.com/shahariaazam/DSE-Share-Market-Update/issues)
- Extending library by forking and send a pull request to merge. To fork this repository, go to [https://github.com/shahariaazam/DSE-Share-Market-Update/fork](https://github.com/shahariaazam/DSE-Share-Market-Update/fork).
  
  After writing codes to fix issues or extending this library, please send me a pull request and I will be happy to 
  see and merge if everything is OK.
  
To see all the contributors, please [click here](https://github.com/shahariaazam/DSE-Share-Market-Update/graphs/contributors)
  
### License

MIT


### Connect with me

Social:
[LinkedIn](https://bd.linkedin.com/in/shaharia) | [Twitter](https://twitter.com/shaharia) | [Facebook](https://facebook.com/shahariaazamweb)

Website:
[blog.shaharia.com](https://blog.shaharia.com/get-bangladesh-stock-market-dse-cse-share-price-in-php) | [shaharia.com](https://www.shaharia.com)
