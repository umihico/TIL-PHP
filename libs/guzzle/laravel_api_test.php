


<?php
require "vendor/autoload.php";
$token = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImY5NjhhZDI5ZjdlOGVmMzA2NzdlNDA2MTY2ZjdhZmVhYTYxOTE3ZDBlY2MzZWJlNDZhOTI5Yzg4YmM1MzZjMGFhMGE0OTY0YjFlZGJlMDU2In0.eyJhdWQiOiIxMSIsImp0aSI6ImY5NjhhZDI5ZjdlOGVmMzA2NzdlNDA2MTY2ZjdhZmVhYTYxOTE3ZDBlY2MzZWJlNDZhOTI5Yzg4YmM1MzZjMGFhMGE0OTY0YjFlZGJlMDU2IiwiaWF0IjoxNTUyNTUwMzAxLCJuYmYiOjE1NTI1NTAzMDEsImV4cCI6MTU4NDE3MjcwMSwic3ViIjoiIiwic2NvcGVzIjpbIioiXX0.d_TQCjeQp4C2VICEiYJhf8acmgw36Vr0cMaSMSxBW8xRcfRNCkQaFc4PnC97fsPftgTaDkNb0EGFrlh_jDhD8KpK_TzMX9J9c5SNWElMYrlofLc3yGyGuklt9RLrVULzmJ2QOJrpBc9Ti48TotRvmOzHS0-RbRuZs7K2mksfRqi86SGAKOTT5BtHDaO9ZYAMWWP4J9DNLCbS_8twwZmNaYMdOp64iwYIZyS07lw9tHeV8_y-yncCeR-fLuyzK4vFTL2wwVihk8ZYVXoWx-Z6de9Fy-fglQu3N5uFJGu76mMj0sJ5eN7jc4UDsRyclh8s_gBEy52zcIqUjc35G9FAaYJzcZCrZBxajp79uKgK6KhBSz3WIFM1sOChAIVQn-SReh1jDp8Ftj4bqy-OfdDz9F9z_UkvoV3tLxFYGSfSn3REu_LJzkYgI06XwTLeyueyU8urOwAdpsEllzr0UbF48EP4XIRbEP3pkQTMza-44OGSUo6QnQdJVD-KLqvEYAG0elQVM6aTGznOy3JWXabKN0jomt61UJIpHziIfnd7hKQd88tTpXytBYfLatfWuqa45GvHdnH5oqpTUYQ-2o2Sa64tuq2z8IjIWwaZQKuCdsYza9_WRHSqY";
$client = new \GuzzleHttp\Client();
$res = $client->request('POST', 'http://localhost:8001/api/v3db/select', [
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
