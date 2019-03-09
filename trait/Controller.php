<?php
namespace App\Http\Controllers;
use App\Traits\dateSearch;


class ItemWithHistoryController extends McodeParserableController{
    use dateSearch;
    public function index(Request $http_request):view{
        Log::debug($this->hello_world());
        return view('welcome');
    }
}
