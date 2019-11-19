<?php

Route::get('/', 'PagesController@home');
Route::get('/menu', 'PagesController@menu');
Route::get('/reserveren', 'PagesController@reservation');
Route::get('/contact', 'PagesController@contact');
Route::get('/faq', 'PagesController@faq');
Route::get('/servicevoorwaarden', 'PagesController@service_condition');
Route::get('/wachtwoord-vergeten', 'PagesController@forgot_password');

Route::get('/profiel', 'UserController@home');
Route::get('/profiel/edit', 'UserController@edit');
Route::post('/profiel/edit', 'UserController@update');
Route::get('/profiel/delete', 'UserController@account_terminate');
Route::post('/profiel/delete', 'UserController@confirmAccount_terminate');
Route::get('/account_not_activated', 'UserController@account_not_activated');
Route::get('/account_blocked', 'UserController@account_blocked');

Route::get('/account_not_activated', 'PagesController@account_not_activated');

Route::get('/account_blocked', 'PagesController@account_blocked');

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Auth::routes();
