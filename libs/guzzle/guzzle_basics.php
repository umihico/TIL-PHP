<?php
require "vendor/autoload.php";

function helloworld()
{
  $url = "http://google.com";

  $client = new \GuzzleHttp\Client();
  $res = $client->request("GET", $url);

  echo $res->getBody()."\n";
  echo $res->getStatusCode()."\n";
  echo $res->getHeaderLine("content-type")."\n";
}

use GuzzleHttp\Client;
function helloworld2()
{
  $url = "http://google.com";

  $client = new Client();
  $res = $client->request("GET", $url);

  echo $res->getBody()."\n";
  echo $res->getStatusCode()."\n";
  echo $res->getHeaderLine("content-type")."\n";
}

helloworld();
helloworld2();
