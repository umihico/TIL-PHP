<?php
require "vendor/autoload.php";
// use GuzzleHttp\Client;
global $headers, $data;
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
    $rows_json=[];
    foreach ($rows as $row) {
      $row_json=[];
      foreach ($row as $cell_value) {
        $row_json[]=["userEnteredValue"=>["stringValue"=> $cell_value]];
      }
      $rows_json[]=[['values'=>$row_json]];
    }
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
            'rows'=>$rows_json
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
$rows=[
  ['a1','b1','c1'],
  ['a2','b2','c2'],
];
createNewSpreadsheetFromArray($rows);
