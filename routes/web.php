<?php

Route::get('/{any}', function () {
  return view('post');
})->where('any', '.*');
Auth::routes();

/*FAQ routes*//*
Route::post('/post/create', 'PostController@store');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::post('/post/update/{id}', 'PostController@update');
Route::delete('/post/delete/{id}', 'PostController@delete');
Route::get('/posts', 'PostController@index');
 */
/*AUTH routes*//*

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('profile', 'UserController@getAuthenticatedUser');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Route::get('init', 'UserController@init');
Route::get('logout', 'UserController@logout'); */


/*AUTH routes*/
/* Route:prefix('auth'->group(function() {
    Route::get('init', 'UserController@init');
    Route::get('login', 'UserController@login');
    Route::get('register', 'UserController@register');
    Route::get('logout', 'UserController@logout');
})); */
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); */
