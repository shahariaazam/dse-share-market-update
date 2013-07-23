<?php

include ("library/api/Request.php");

$api = new Request();
$requestType = $_REQUEST['output'];

if(empty($requestType)){
    exit;
}
if($requestType == "json")
{
    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    print_r($api->getResponse($requestType));
}else{
    exit;
}