DSE-Share-Market-Update
=======================

Real time Share Market Update Data of Dhaka Stock Exchange, Bangladesh.


### Primary Feature

This project is enough to scrap the latest share market data of Dhaka Stock Exchange and build array to make it flexible for other data format.


### Usage

After cloning this Git repo you can use it directly.
Run `DSE-Share-Market-Update/debug.php`....

```php
  <?php

    include("library/Scraper.php");
    
    $scraper = new Scraper();
    $scrapData = $scraper->scrapData('http://www.dsebd.org');
    
    var_dump($scrapData);
```

The above code is written in `debug.php`. So you can run by yourself easily by copy/page the above code to any file in your root director.

### Output

When you will run `debug.php` file then the output should be like the following:

```php
    array (size=285)
      0 => 
        array (size=4)
          'company' => string '1JANATAMF' (length=9)
          'lastTrade' => string '6.00' (length=4)
          'changeAmount' => string '0.00' (length=4)
          'changePercent' => string '0.00%' (length=5)
      1 => 
        array (size=4)
          'company' => string '1STPRIMFMF' (length=10)
          'lastTrade' => string '26.00' (length=5)
          'changeAmount' => string '0.20' (length=4)
          'changePercent' => string '0.78%' (length=5)
      2 => 
        array (size=4)
          'company' => string '3RDICB' (length=6)
          'lastTrade' => string '190.10' (length=6)
          'changeAmount' => string '0.00' (length=4)
          'changePercent' => string '0.00%' (length=5)
      3 => 
        array (size=4)
          'company' => string '4THICB' (length=6)
          'lastTrade' => string '190.00' (length=6)
          'changeAmount' => string '0.00' (length=4)
          'changePercent' => string '0.00%' (length=5)
      4 => 
        array (size=4)
          'company' => string '6THICB' (length=6)
          'lastTrade' => string '52.10' (length=5)
          'changeAmount' => string '-0.50' (length=5)
          'changePercent' => string '-0.95%' (length=6)
      5 => 
        array (size=4)
          'company' => string '8THICB' (length=6)
          'lastTrade' => string '52.20' (length=5)
          'changeAmount' => string '-0.80' (length=5)
          'changePercent' => string '-1.51%' (length=6)
      6 => 
        array (size=4)
          'company' => string 'AAMRATECH' (length=9)
          'lastTrade' => string '37.10' (length=5)
          'changeAmount' => string '-0.10' (length=5)
          'changePercent' => string '-0.27%' (length=6)
      7 => 
        array (size=4)
          'company' => string 'ABB1STMF' (length=8)
          'lastTrade' => string '7.10' (length=4)
          'changeAmount' => string '0.00' (length=4)
          'changePercent' => string '0.00%' (length=5)
```

### Intercept of the Element of Array

`1st element` of the array is `The Trading Code`
`2nd element` of the array is `Last Trade Price`
`3rd element` of the array is `Change value`
`4th element` of the array is `Change in percentage`

### Access API to get json formatted data

just use this URL to get data for public use `http://dse-share-update.ap01.aws.af.cm/getData.php?output={format}`. So you can easily integrate
this data in your apps. In the above link `format` is the output response format i.e `json`. Now we currently provide only `json` data as response type.
So the final URL will be `http://dse-share-update.ap01.aws.af.cm/getData.php?output=json`

### Support

If you are having any trouble with API or about this apps. Then please write down Issues from https://github.com/shahariaazam/DSE-Share-Market-Update/issues
or if you need more quick assistance please mail at shaharia.azam@gmail.com

### How to Contribute

[Fork](https://github.com/shahariaazam/DSE-Share-Market-Update/fork) this repo and send pull request of your modification.

### License

The `DSE-Share-Market-Update` is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

Contributors
===============
G. M. Shaharia Azam
[http://www.shahariaazam.com](http://www.shahariaazam.com)

To view more contributors [click here](https://github.com/shahariaazam/DSE-Share-Market-Update/contributors)
