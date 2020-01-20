<?php

use Illuminate\Http\Request;


/*FAQ routes*/
Route::post('/post/create', 'PostController@store');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::post('/post/update/{id}', 'PostController@update');
Route::delete('/post/delete/{id}', 'PostController@delete');
Route::get('/posts', 'PostController@index');

/*AUTH routes*/

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('profile', 'UserController@getAuthenticatedUser');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
