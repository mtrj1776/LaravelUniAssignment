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
Route::get('/users', 'UserController@index');

Route::get('/users/{user_id}', 'UserController@getUser');

// ThreadController routes
Route::get('/threads', 'ThreadController@index');

Route::get('/threads/{id}', 'ThreadController@getThread');