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
    return view('home');
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
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('posts', 'PostController@store')->name('posts.store');

// TagController routes
Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('tags/create', 'TagController@create')->name('tags.create');
Route::post('tags', 'TagController@store')->name('tags.store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
