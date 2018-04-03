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
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::get('/items/company/{companyid}', 'Itemcontroller@index')->name('items.index');
Route::get('/items/{item}/state', 'Itemcontroller@state')->name('items.state');
Route::resource('items', 'ItemController');

Route::get('/{email}', 'UserController@edit')->name('user.edit');
Route::put('/users/{user}', 'UserController@update')->name('user.update');
