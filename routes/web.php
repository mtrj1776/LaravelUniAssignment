<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/home');
});

// UserController routes
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::post('users', 'UserController@store')->name('users.store');
// Parameters must come after no parameter routes
Route::get('/users/{user_id}', 'UserController@show')->name('users.show');
Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');

// ThreadController routes
Route::get('/threads', 'ThreadController@index')->name('threads.index');

Route::get('/threads/{id}', 'ThreadController@show')->name('threads.show');

// PostController routes
Route::get('/posts/create/{id}', 'PostController@create')->name('posts.create');
Route::post('posts', 'PostController@store')->name('posts.store');
Route::post('/posts/update', 'PostController@update')->name('posts.update');
Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::post('posts/storeAjax', 'PostController@storeAjax')->name('posts.storeAjax');
Route::delete('posts/{id}', 'PostController@destroy')->name('posts.destroy');
Route::get('image/upload', 'PostController@imageShow')->name('image.show');
Route::post('image/store', 'PostController@imageStore')->name('image.store');
Route::get('ajaxRequest', 'PostController@ajaxRequest');

// TagController routes
Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('tags/create', 'TagController@create')->name('tags.create');
Route::post('tags', 'TagController@store')->name('tags.store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/gateway', 'Auth\LoginController@redirectToProvider')->name('login.gateway');
Route::get('login/gateway/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');