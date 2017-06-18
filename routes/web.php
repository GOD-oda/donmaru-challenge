<?php

Route::get('/', function () {
    return view('top');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('{provider_name}', 'Auth\LoginController@redirectToProvider');
    Route::get('{provider_name}/callback', 'Auth\LoginController@handleProviderCallback');
});
Route::get('logout', 'Auth\LoginController@logout');

Route::get('home', function () {
    return 'loged in!!!';
});

Route::resource('don', 'DonsController');
