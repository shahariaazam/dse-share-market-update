![Get Realtime Trade Price for Dhaka Stock Exchange in PHP](http://imgwww.priyo.com/files/story/201408/dse_5.jpg)

## Bangladesh Stock Exchange

This PHP library provides a simple way to get and parse the stock price for Dhaka Stock Exchange in real time directly
from the official DSE website (https://www.dsebd.org)


### Installation

Install this library via `composer` by running the following command

`composer require shahariaazam/bd-stock-exchange`


Note: This library has been upgraded from it's old (legacy) code and made it as a standard library.
if you still want to use legacy (OLD) codes, you can find that in [old-legacy-codes](https://github.com/shahariaazam/DSE-Share-Market-Update/tree/old-legacy-codes) branch.

Or you can download OLD codes as `zip`. [Click here](https://github.com/shahariaazam/DSE-Share-Market-Update/raw/old-legacy-codes/dse.zip) to download old codes.


### Usage

After installing you can simply get the latest Dhaka Stock Exchange price data

####Dhaka Stock Exchnage
```php
<?php

require "vendor/autoload.php";

$dse = new \ShahariaAzam\BDStockExchange\StockPrice();
var_dump($dse->getDSEPricing());
```

And you are done. You will get the following output

```
array(339) {
  [0] =>
  array(4) {
    'company' =>
    string(9) "1JANATAMF"
    'lastTrade' =>
    string(4) "6.10"
    'changeAmount' =>
    string(5) "-0.10"
    'changePercent' =>
    string(6) "-1.61%"
  }
  [1] =>
  array(4) {
    'company' =>
    string(10) "1STPRIMFMF"
    'lastTrade' =>
    string(5) "12.10"
    'changeAmount' =>
    string(4) "0.20"
    'changePercent' =>
    string(5) "1.68%"
  }
  [2] =>
  array(4) {
    'company' =>
    string(8) "AAMRANET"
    'lastTrade' =>
    string(5) "75.10"
    'changeAmount' =>
    string(5) "-2.50"
    'changePercent' =>
    string(6) "-3.22%"
  }
```

####Chittagong Stock Exchange
```php
<?php

require "vendor/autoload.php";

$dse = new \ShahariaAzam\BDStockExchange\StockPrice();
var_dump($dse->getCSEPricing());
```

And you are done. You will get the following output

```
array(339) {
  [0] =>
  array(4) {
    'company' =>
    string(9) "1JANATAMF"
    'lastTrade' =>
    string(4) "6.10"
    'yesterday_closing' =>
    string(5) "5.60"
    'changeAmount' =>
    string(6) "0.4%"
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
[blog.shaharia.com](https://blog.shaharia.com) | [shaharia.com](https://www.shaharia.com)
