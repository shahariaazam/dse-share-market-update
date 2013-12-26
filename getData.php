<?php

error_reporting(1);

include("library/api/Request.php");

$api = new Request();
$requestType = $_REQUEST['output'];

if (empty($requestType)) {
    exit;
}

function saveCache($dir = null, $fileName = null, $data = null, $keep = true)
{
    $tempFile = fopen($dir . '/' . $fileName, "w");
    fputs($tempFile, $data);
    fclose($tempFile);
    if ($keep === false) {
        unlink($tempFile);
    }
    return $tempFile;
}

function generateJson()
{
    date_default_timezone_set('Asia/Dhaka');

    $time1 = new DateTime(date('Y-m-d h:i:s'));
    $time2 = new DateTime(date('Y-m-d h:i:s', filectime('cache/dseData.json')));
    $interval = $time1->diff($time2);

    if ($interval->i > 0 || file_exists('cache/dseData.json') === false) {
        unlink('cache/dseData.json');
        $api = new Request();
        saveCache('cache', "dseData.json", $api->getResponse('json'));
    }
}

if ($requestType == "json") {

    //re-generate json cache file if the previous file was created more than 1 min ago
    generateJson();

    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    print(file_get_contents('cache/dseData.json'));
} else {
    exit;
}