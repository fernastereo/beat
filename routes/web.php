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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessageController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessageController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessageController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessageController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessageController@update']);
    Route::get('contacts/{id}', ['as' => 'messages.contacts', 'uses' => 'MessageController@contacts']);
});
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/users/{email}', 'UserController@edit')->name('user.edit');
Route::put('/users/{user}', 'UserController@update')->name('user.update');

