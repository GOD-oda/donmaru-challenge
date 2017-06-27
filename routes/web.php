<?php

Route::get('/', function () {
    return view('top');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('{provider_name}', 'Auth\LoginController@redirectToProvider');
    Route::get('{provider_name}/callback', 'Auth\LoginController@handleProviderCallback');
});
Route::get('logout', 'Auth\LoginController@logout');

Route::get('user/{user_id}/don', 'DonsController@index');
