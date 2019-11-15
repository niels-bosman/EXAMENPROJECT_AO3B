<?php

Route::get('/', 'PagesController@home');

Route::get('/account_not_activated', 'PagesController@account_not_activated');

Route::get('/account_blocked', 'PagesController@account_blocked');

