<?php


//Route::get('/', function () {
//    return redirect("/home");
//});

use App\Slc;

Route::get('slc.js', function () {
    $json = json_encode(array_merge(Slc::scriptVariables(), []));
    $js = <<<js
window.Slc = {$json};
js;
    return response($js)->header('Content-Type', 'text/javascript');
})->name('slc.js');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/{any?}', 'HomeController@index')->name('home');
});

