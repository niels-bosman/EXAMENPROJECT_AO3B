<?php

Route::get('/', 'PagesController@home');
Route::get('/menu', 'PagesController@menu');
Route::get('/reserveren', 'PagesController@reservation');
Route::post('/reserveren', 'ReserveringController@post');
Route::get('/contact', 'PagesController@contact');
Route::get('/faq', 'PagesController@faq');
Route::get('/servicevoorwaarden', 'PagesController@service_condition');
Route::get('/wachtwoord-vergeten', 'PagesController@forgot_password');
Route::get('/registreer', 'PagesController@create');

Route::get('/profiel', 'ProfileController@home');
Route::get('/profiel/pdf/{reservation}', 'PDFController@index');
Route::put('/profiel', 'ProfileController@update');
Route::delete('/profiel', 'ProfileController@destroy');
Route::delete('/reservering', 'ReserveringController@destroy');
Route::get('/profiel/account_geactiveerd', 'ProfileController@account_activated');
Route::get('/profiel/account_not_activated', 'ProfileController@account_not_activated');
Route::get('/profiel/account_blocked', 'ProfileController@account_blocked');
Route::get('/profiel/account_blocked_password', 'ProfileController@account_blocked_password');

Route::get('/beheer', 'Beheer\BeheerController@index');

Route::get('/beheer/gebruikers', 'Beheer\UserController@index');
Route::put('/beheer/gebruikers', 'Beheer\UserController@block');
Route::delete('/beheer/gebruikers', 'Beheer\UserController@destroy');

Route::get('/beheer/gebruikers/{user}', 'Beheer\UserController@show');
Route::put('/beheer/gebruikers/{user}', 'Beheer\UserController@update');
Route::get('/beheer/gebruikers/{user}/block', 'Beheer\UserController@block');

Route::get('/beheer/reserveringen', 'Beheer\ReserveringController@index');
Route::get('/beheer/reserveringen/{id}', 'Beheer\BeheerController@get');
Route::put('/beheer/reserveringen/{id}', 'Beheer\BeheerController@put');
Route::delete('/beheer/reserveringen/{reservation_code}', 'Beheer\ReserveringController@delete');
Route::delete('/beheer/reserveringen/{id}', 'Beheer\BeheerController@destroyBestelling');

Route::get('/beheer/reserveringen/{id}/bestellingen/add', 'Beheer\BeheerController@getBestellingen');
Route::post('/beheer/reserveringen/{id}/bestellingen/add', 'Beheer\BeheerController@postBestellingen');

Route::get('/beheer/producten', 'Beheer\ProductController@index');
Route::delete('/beheer/producten', 'Beheer\ProductController@delete');
Route::post('/beheer/producten/new', 'Beheer\ProductController@post');
Route::get('/beheer/producten/new', 'Beheer\ProductController@getNew');
Route::get('/beheer/producten/{id}', 'Beheer\ProductController@get');
Route::put('/beheer/producten/{id}', 'Beheer\ProductController@put');

Route::get('/beheer/tafels', 'Beheer\TafelsController@index');
Route::get('/beheer/tafels/{id}', 'Beheer\TafelsController@detail');
Route::put('/beheer/tafels/{id}', 'Beheer\TafelsController@update');


Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});


Auth::routes(['verify' => true]);
