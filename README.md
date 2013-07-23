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
    array (size=288)
      0 => 
        array (size=4)
          0 => string '1JANATAMF' (length=9)
          1 => string '6.60' (length=4)
          2 => string '-0.10' (length=5)
          6 => string '-1.49%' (length=6)
      1 => 
        array (size=4)
          0 => string '1STBSRS' (length=7)
          1 => string '96.00' (length=5)
          2 => string '-2.50' (length=5)
          6 => string '-2.54%' (length=6)
      2 => 
        array (size=4)
          0 => string '1STPRIMFMF' (length=10)
          1 => string '17.30' (length=5)
          2 => string '-1.10' (length=5)
          6 => string '-5.98%' (length=6)
      3 => 
        array (size=4)
          0 => string '2NDICB' (length=6)
          1 => string '307.00' (length=6)
          2 => string '-1.10' (length=5)
          6 => string '-0.36%' (length=6)
      4 => 
        array (size=4)
          0 => string '4THICB' (length=6)
          1 => string '190.10' (length=6)
          2 => string '-5.50' (length=5)
          6 => string '-2.81%' (length=6)
      5 => 
        array (size=4)
          0 => string '5THICB' (length=6)
          1 => string '180.00' (length=6)
          2 => string '-6.50' (length=5)
          6 => string '-3.49%' (length=6)
          more elements....
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
