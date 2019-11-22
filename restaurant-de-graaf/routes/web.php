<?php

Route::get('/', 'PagesController@home');
Route::get('/menu', 'PagesController@menu');
Route::get('/reserveren', 'PagesController@reservation');
Route::post('/reserveren', 'ReserveringController@post');
Route::get('/contact', 'PagesController@contact');
Route::get('/faq', 'PagesController@faq');
Route::get('/servicevoorwaarden', 'PagesController@service_condition');
Route::get('/wachtwoord-vergeten', 'PagesController@forgot_password');

Route::get('/profiel', 'ProfileController@home');
Route::put('/profiel', 'ProfileController@update');
Route::delete('/profiel', 'ProfileController@destroy');
Route::delete('/reservering', 'ReserveringController@destroy');
Route::get('/profiel/account_geactiveerd', 'ProfileController@account_activated');
Route::get('/profiel/account_not_activated', 'ProfileController@account_not_activated');
Route::get('/profiel/account_blocked', 'ProfileController@account_blocked');
Route::get('/profiel/account_blocked_password', 'ProfileController@account_blocked_password');

Route::get('/beheer', 'Beheer\BeheerController@index');
Route::get('/beheer/gebruikers', 'Beheer\UserController@index');
Route::get('/beheer/reserveringen', 'Beheer\BeheerController@index');
Route::get('/beheer/producten', 'Beheer\ProductController@index');
Route::get('/beheer/tafels', 'Beheer\TafelsController@index');

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});


Auth::routes(['verify' => true]);
