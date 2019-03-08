<?php
require "vendor/autoload.php";
// use GuzzleHttp\Client;
global $headers;
$headers=[
  "Content-type"=>"application/json",
  "Authorization"=>"Bearer ya29.GlvGBglwu10jwJYYskvkS1k0t3XqYDN6onbC-YoKt5sLIUebMmQzM_j5XT0rJXXVO660WnEQmBTR9phZpPbUlshwpTQJWbV1u7jXWdV1laXsGl-iJA0UdXp8sbv3" //will expires

];

function createNewSpreadsheet(){
    global $headers;
    $client = new \GuzzleHttp\Client();
    $response=$client->post('https://sheets.googleapis.com/v4/spreadsheets', ['headers' => $headers]);
    $json=json_decode($response->getBody());
    var_dump($json);
    $spread_sheet_id=$json->spreadsheetId;
    return $spread_sheet_id;
}
function fillCells($spread_sheet_id, $rows){

    global $headers;
    $body= [
      "requests"=> [
        [
          'updateCells'=>[
            "fields"=>"userEnteredValue",
            'start'=>[
              "sheetId"=> 0,
              "rowIndex"=> 0,
              "columnIndex"=> 0,
            ],
            'rows'=>[
              [
                'values'=>[
                  [],
                  ["userEnteredValue"=>["stringValue"=> "国語"]],
                  ["userEnteredValue"=>["stringValue"=> "算数"]],
                  ["userEnteredValue"=>["stringValue"=> "理科"]],
                ]
              ],
              [
                'values'=>[
                  ["userEnteredValue"=>["stringValue"=> "points"]],
                  ["userEnteredValue"=>["stringValue"=> "１０"]],
                  ["userEnteredValue"=>["stringValue"=> "２０"]],
                  ["userEnteredValue"=>["stringValue"=> "３０"]],
                ]
              ]
            ]
          ]
        ]
      ]
    ];
    $client = new \GuzzleHttp\Client();
    $response=$client->post('https://sheets.googleapis.com/v4/spreadsheets/'.$spread_sheet_id.':batchUpdate', ['headers' => $headers,'json' => $body]);
    $json=json_decode($response->getBody());
    var_dump($json);
}
function createNewSpreadsheetFromArray(array $rows){
  $spread_sheet_id=createNewSpreadsheet();
  fillCells($spread_sheet_id, $rows);
}
$rows=array();
createNewSpreadsheetFromArray($rows);
