<?php

Route::resource('unidades', 'Api\\UnidadesController');
Route::get('unidades-estoque','Api\\UnidadesController@estoque');