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

/*
Nota para "Mi del futuro": cuando vayas a crear una ruta cuyo nombre es igual a alguna 
de las rutas que vienen por defecto, debes colocarle un nombre diferente a esta, así 
vayan a apuntar al mismo método del controlador o tengan la misma Url.

Por ejemplo: si vas a crear una nueva ruta para create su name no puede ser modelo.create
debería ser modelo.create.algo.
*/
Route::get('/items/company/{companyid}', 'Itemcontroller@index')->name('items.company');
Route::get('/items/{item}/state', 'Itemcontroller@state')->name('items.state');
Route::get('/items/create/{companyid}', 'Itemcontroller@create')->name('items.create.company');

Route::resource('items', 'ItemController');

Route::get('/{email}', 'UserController@edit')->name('user.edit');
Route::put('/users/{user}', 'UserController@update')->name('user.update');
