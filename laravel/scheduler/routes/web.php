<?php


use App\Schedule;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  $schedules=Schedule::all();
  $content_table_name="全スケジュール";
  return view('schedules',['schedules'=>$schedules, 'content_table_name'=>$content_table_name]);
});


Route::post('/add', function (Request $request) {
    $request->validate([
        'name'=>'required|max:255',
        'date'=>'required|date_format:"Ymd"',
    ]);

    $schelude=new Schedule;//ORM
    $schelude->name = $request->name;
    $schelude->date = $request->date;
    $schelude->save();
    return redirect('/');
});

Route::delete('/del_schedule', function (Request $request) {
    Schedule::where("id",$request->id)->first()->delete();
    return redirect('/');
});
Route::post('/search', function (Request $request) {
    $request->validate([
        'date'=>'required|date_format:"Ymd"',
    ]);
    $date=$request->date;
    $matched_schedules = Schedule::where('date', 'like', '%'.$date)->get();
    $content_table_name="検索結果";
    return view('schedules',['schedules'=>$matched_schedules, 'content_table_name'=>$content_table_name]);
});
