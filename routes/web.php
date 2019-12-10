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
    return view('welcome');
});

// UserController routes
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::post('users', 'UserController@store')->name('users.store');
    // Parameters must come after no parameter routes
Route::get('/users/{user_id}', 'UserController@show')->name('users.show');
Route::delete('users/{user_id}', 'UserController@destroy')->name('users.destroy');

// ThreadController routes
Route::get('/threads', 'ThreadController@index')->name('threads.index');



Route::get('/threads/{id}', 'ThreadController@show')->name('threads.show');