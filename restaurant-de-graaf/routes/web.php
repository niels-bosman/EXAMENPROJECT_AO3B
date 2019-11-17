<?php

Route::get('/', 'PagesController@home');

Route::get('/account', 'UserController@home');
Route::get('/account/{user}', 'UserController@show');
Route::get('/account/{user}/edit', 'UserController@edit');
Route::post('/account/registreer', 'UserController@create');
Route::patch('/account/{user}', 'UserController@update');
Route::delete('/account/{user}', 'UserController@delete');

Route::get('/account/login', 'UserController@login');
Route::post('/account/login', 'UserController@checkAccountActivation');

Route::get('/account_blocked', 'PagesController@account_blocked');
