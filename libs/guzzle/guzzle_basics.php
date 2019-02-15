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
function use_use()
{
  $url = "http://google.com";

  $client = new Client();
  $res = $client->request("GET", $url);

  echo $res->getBody()."\n";
  echo $res->getStatusCode()."\n";
  echo $res->getHeaderLine("content-type")."\n";
}

function use_base_uri()
{
  $client = new Client(['base_uri' => 'https://api.github.com']);
  $response = $client->request('GET', 'users/umihico');
  echo $response->getBody()."\n";
  $response = $client->request('GET', '/users/umihico/repos');
  echo $response->getBody()."\n";
  // base_uri+URI=Result
  // "http://foo.com	/bar	http://foo.com/bar"
  // "http://foo.com/foo	/bar	http://foo.com/bar"
  // "http://foo.com/foo	bar	http://foo.com/bar"
  // "http://foo.com/foo/	bar	http://foo.com/foo/bar"
  // "http://foo.com	http://baz.com	http://baz.com"
  // "http://foo.com/?bar	bar	http://foo.com/bar"


}

// helloworld();
// use_use();
use_base_uri();
