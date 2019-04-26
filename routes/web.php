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



Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    foreach (File::files(app()->path() . '/Routes/auth') as $file) {
        require $file;
    }
});

Auth::routes();
