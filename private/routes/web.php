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

//--
//Non-grouped routes
Route::get('/', 'Base\AppController@index');
Route::get('dashboard', 'Dashboard\DashboardController@index');

//--
//Customer module
Route::group(['prefix' => 'customer'], function() {
    Route::get('/', 'Customer\CustomerController@index');
    Route::get('add', 'Customer\CustomerController@add');
    Route::get('edit/{id}', 'Customer\CustomerController@edit');
    Route::any('delete/{id}', 'Customer\CustomerController@delete');
    Route::post('save/{id?}', 'Customer\CustomerController@save');
});

//--
// Auto-generate routes
Auth::routes();
