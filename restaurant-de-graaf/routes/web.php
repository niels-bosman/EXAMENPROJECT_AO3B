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

//Route::get('/beheer', 'Beheer\BeheerController@index');
Route::get('/beheer', 'ProfileController@home');

//Route::get('/beheer/klanten', 'Beheer\UserController@index');
Route::get('/beheer/klanten', 'ProfileController@home');

//Route::put('/beheer/klanten', 'Beheer\UserController@block');
Route::put('/beheer/klanten', 'ProfileController@home');

//Route::delete('/beheer/klanten', 'Beheer\UserController@destroy');
Route::delete('/beheer/klanten', 'ProfileController@home');

//Route::get('/beheer/klanten/{user}', 'Beheer\UserController@show');
Route::get('/beheer/klanten/{user}', 'ProfileController@home');

//Route::put('/beheer/klanten/{user}', 'Beheer\UserController@update');
Route::put('/beheer/klanten/{user}', 'ProfileController@home');

//Route::get('/beheer/klanten/pdf/{reservation}', 'PDFController@index');
Route::get('/beheer/klanten/pdf/{reservation}', 'ProfileController@home');

//Route::get('/beheer/klanten/{user}/block', 'Beheer\UserController@block');
Route::get('/beheer/klanten/{user}/block', 'ProfileController@home');

//Route::get('/beheer/reserveringen', 'Beheer\ReserveringController@index');
Route::get('/beheer/reserveringen', 'ProfileController@home');

//Route::get('/beheer/reserveren/new', 'Beheer\NieuweReserveringController@index');
Route::get('/beheer/reserveren/new', 'ProfileController@home');

//Route::post('/beheer/reserveren/new', 'Beheer\NieuweReserveringController@create');
Route::post('/beheer/reserveren/new', 'ProfileController@home');

//Route::get('/beheer/reserveringen/{id}', 'Beheer\BeheerController@get');
Route::get('/beheer/reserveringen/{id}', 'ProfileController@home');

//Route::put('/beheer/reserveringen/{id}', 'Beheer\BeheerController@put');
Route::put('/beheer/reserveringen/{id}', 'ProfileController@home');
//Route::delete('/beheer/reserveringen/{reservation_code}', 'Beheer\ReserveringController@delete');
Route::delete('/beheer/reserveringen/{reservation_code}', 'ProfileController@home');

//Route::delete('/beheer/reserveringen/bestelling/{id}', 'Beheer\BeheerController@destroyBestelling');
Route::delete('/beheer/reserveringen/bestelling/{id}', 'ProfileController@home');

//Route::get('/beheer/reserveringen/{id}/bestellingen/add', 'Beheer\BeheerController@getBestellingen');
Route::get('/beheer/reserveringen/{id}/bestellingen/add', 'ProfileController@home');

//Route::post('/beheer/reserveringen/{id}/bestellingen/add', 'Beheer\BeheerController@postBestellingen');
Route::post('/beheer/reserveringen/{id}/bestellingen/add', 'ProfileController@home');

//Route::get('/beheer/producten', 'Beheer\ProductController@index');
Route::get('/beheer/producten', 'ProfileController@home');

//Route::delete('/beheer/producten', 'Beheer\ProductController@delete');
Route::delete('/beheer/producten', 'ProfileController@home');

//Route::post('/beheer/producten/new', 'Beheer\ProductController@post');
Route::post('/beheer/producten/new', 'ProfileController@home');

//Route::get('/beheer/producten/new', 'Beheer\ProductController@getNew');
Route::get('/beheer/producten/new', 'ProfileController@home');

//Route::get('/beheer/producten/{id}', 'Beheer\ProductController@get');
Route::get('/beheer/producten/{id}', 'ProfileController@home');

//Route::put('/beheer/producten/{id}', 'Beheer\ProductController@put');
Route::put('/beheer/producten/{id}', 'ProfileController@home');

//Route::get('/beheer/tafels', 'Beheer\TafelsController@index');
Route::get('/beheer/tafels', 'ProfileController@home');

//Route::get('/beheer/tafels/{id}', 'Beheer\TafelsController@detail');
Route::get('/beheer/tafels/{id}', 'ProfileController@home');

//Route::put('/beheer/tafels/{id}', 'Beheer\TafelsController@update');
Route::put('/beheer/tafels/{id}', 'ProfileController@home');


Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});


Auth::routes(['verify' => true]);
