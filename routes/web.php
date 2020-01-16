<?php

Route::get('/{any}', function () {
  return view('post');
})->where('any', '.*');

/*AUTH routes*/
Route::prefix('auth')->group(function() {
    Route::get('init', 'UserController@init');
    Route::get('login', 'UserController@login');
    Route::get('register', 'UserController@register');
    Route::get('logout', 'UserController@logout');
});
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); */
