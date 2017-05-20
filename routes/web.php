<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/loginme','loginController@login');
Route::get('/loginme2/{user}','loginController@login2');
Route::get('/loginme3/{user_1}','loginController@login3');

