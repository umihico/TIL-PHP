<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

trait dateSearchClass{
    protected function hello_world(){
        return 'hello_world';
    }
}

class ItemWithHistoryController extends McodeParserableController{
    use dateSearchClass;
    public function index(Request $http_request):view{
        Log::debug($this->hello_world());
        return view('welcome');
    }
}
