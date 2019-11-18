<?php

Route::get('/', 'PagesController@home');

Route::get('/account_not_activated', 'PagesController@account_not_activated');

Route::get('/account_blocked', 'PagesController@account_blocked');

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/profile', function() {
    return view('profile');
});

Auth::routes();
