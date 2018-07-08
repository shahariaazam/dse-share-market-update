<?php

include("library/Scraper.php");

$scraper = new Scraper();
$scrapData = $scraper->scrapData('https://www.dsebd.org');

var_dump($scrapData);