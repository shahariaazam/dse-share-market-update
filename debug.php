<?php

include("library/Scraper.php");

$scraper = new Scraper();
$scrapData = $scraper->scrapData('http://www.dsebd.org');

var_dump($scrapData);