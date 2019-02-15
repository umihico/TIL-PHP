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

function methods()
{
  $client = new Client();
  $response = $client->get('http://httpbin.org/get');
  $response = $client->delete('http://httpbin.org/delete');
  $response = $client->head('http://httpbin.org/get');
  $response = $client->options('http://httpbin.org/get');
  $response = $client->patch('http://httpbin.org/patch');
  $response = $client->post('http://httpbin.org/post');
  $response = $client->put('http://httpbin.org/put');
}

use GuzzleHttp\Psr7\Request;
function request_directly()
{
  $request = new Request('PUT', 'http://httpbin.org/put');
  $response = $client->send($request, ['timeout' => 2]);
}

function getheader()
{
  $client = new Client();
  $response = $client->get('http://httpbin.org/get');
  $code = $response->getStatusCode(); // 200
  $reason = $response->getReasonPhrase(); // OK
  if ($response->hasHeader('Content-Length')) {
      echo "It exists\n";
      echo $response->getHeader('Content-Length')[0];
  }

  foreach ($response->getHeaders() as $name => $values) {
      echo $name . ': ' . implode(', ', $values) . "\r\n";
  }
}
function send_query()
{
  $client = new Client();
  $client->request('GET', 'http://httpbin.org', [
    'query' => ['foo' => 'bar']
  ]);
}
function send_postform()
{
  $client = new Client();
   // POST requests requires that you specify the POST fields as an array in the form_params request options.
  $response = $client->request('POST', 'http://httpbin.org/post', [
    'form_params' => [
        'field_name' => 'abc',
        'other_field' => '123',
        'nested_field' => [
            'nested' => 'hello'
        ]
    ]
]);
}

function specify_header()
{
  $client = new Client();
  $client->request('GET', 'http://httpbin.org/get', [
    'headers' => [
        'User-Agent' => 'testing/1.0',
        'Accept'     => 'application/json',
        'X-Foo'      => ['Bar', 'Baz']
    ]
  ]);
}

// helloworld();
// use_use();
// use_base_uri();
// methods();
// request_directly();
// getheader();
// send_query();
// send_postform();
specify_header();
