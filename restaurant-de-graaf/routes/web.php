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
Route::get('/account_not_activated', 'PagesController@account_not_activated');
Route::get('/account_blocked', 'PagesController@account_blocked');

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Auth::routes();
