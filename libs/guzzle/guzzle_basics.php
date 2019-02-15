<?php
require "vendor/autoload.php";

$url = "http://google.com";

$client = new \GuzzleHttp\Client();
$res = $client->request("GET", $url);

echo $res->getBody()."\n";
echo $res->getStatusCode()."\n";
echo $res->getHeaderLine("content-type")."\n";
