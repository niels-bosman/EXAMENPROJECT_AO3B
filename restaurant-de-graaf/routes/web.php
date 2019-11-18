<?php

Route::get('/', 'PagesController@home');
Route::get('/login', 'PagesController@login');
Route::post('/login', 'PagesController@checkLogin');
Route::get('/registreren', 'PagesController@create');
Route::post('/registreren', 'PagesController@createAccount');
Route::get('/menu', 'PagesController@menu');
Route::get('/reserveren', 'PagesController@reservation');
Route::get('/contact', 'PagesController@contact');
Route::get('/faq', 'PagesController@faq');
Route::get('/servicevoorwaarden', 'PagesController@service_condition');
Route::get('/wachtwoord-vergeten', 'PagesController@forgot_password');

Route::get('/user', 'UserController@home');
Route::get('/user/{user}', 'UserController@show');
Route::get('/user/{user}/edit', 'UserController@edit');
Route::post('/user/{user}/edit', 'UserController@update');
Route::get('/user/{user}/delete', 'UserController@account_terminate');
Route::post('/user/{user}/delete', 'UserController@confirmAccount_terminate');
Route::get('/user/{user}/account_not_activated', 'UserController@account_not_activated');
Route::get('/user/{user}/account_blocked', 'UserController@account_blocked');
