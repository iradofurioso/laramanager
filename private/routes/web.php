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

// Rotas não agrupadas
Route::get('/', 'Base\AppController@login');
Route::get('/home', 'Base\AppController@index');
Route::get('dashboard', 'Dashboard\DashboardController@index');

// Módulo clientes
Route::group(['prefix' => 'clientes'], function() {
    Route::get('/', 'Cliente\ClienteController@index');
    Route::get('add', 'Cliente\ClienteController@add');
    Route::get('edit/{id}', 'Cliente\ClienteController@edit');
    Route::any('delete/{id}', 'Cliente\ClienteController@delete');
    Route::post('save/{id?}', 'Cliente\ClienteController@save');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
