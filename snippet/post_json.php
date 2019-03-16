require 'vendor/autoload.php';
if($base_products_cd!=$products_cd){
    $url="https://script.google.com/macros/s/AKfycbwNxg2IoI_LeIIvH6O9tVGc7Ye6TedDokZsOne5gHHCWyxH7tlc/exec";
    $rows=[
        ['old',$base_products_cd,'new',$products_cd],
    ];
    $client = new GuzzleHttp\Client();
    $client->request('POST', $url, [GuzzleHttp\RequestOptions::JSON =>$rows]);
}
