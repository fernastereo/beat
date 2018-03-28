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
//Route::resource('items', 'ItemController');
Route::get('/index/{companyid}', 'Itemcontroller@index');

Route::get('/{email}', 'UserController@edit')->name('user.edit');

Route::put('/users/{user}', 'UserController@update')->name('user.update');
