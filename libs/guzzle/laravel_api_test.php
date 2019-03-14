<<?php

require "vendor/autoload.php";

$token = "Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxx";

$client = new \GuzzleHttp\Client();

$res = $client->request('POST', 'http://localhost:8000/api/dbselect', [
   'form_params' => [
       "sql_query"=>"show tables",
     ],
   'headers' => [
     'Accept'=> 'application/json',
     'Authorization'=> $token,
     ]
]);
echo $res->getBody()."\n";
echo $res->getStatusCode()."\n";
