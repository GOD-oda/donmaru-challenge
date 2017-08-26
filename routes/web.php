<?php

Route::get('/', 'TopController@index');

Route::group(['prefix' => 'login'], function () {
    Route::get('{provider_name}', 'Auth\LoginController@redirectToProvider');
    Route::get('{provider_name}/callback', 'Auth\LoginController@handleProviderCallback');
});
Route::get('logout', 'Auth\LoginController@logout');

Route::get('user/{user_id}/shop/{shop_id}/don', 'DonsController@index');

Route::get('don/create', 'DonsController@create')->name('don.create');
Route::post('don','DonsController@store')->name('don.store');

