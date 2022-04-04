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

Route::get('logout','Auth\LoginController@logout');

// customer
Route::get('list','Customer\CustomerController@list')->name('listPage');
Route::post('insert_customer','Customer\CustomerController@insert')->name('insert');
Route::get('deleteCustomer/{id}','Customer\CustomerController@deleteCustomer')->name('delete');
Route::get('update/{id}','Customer\CustomerController@updateCustomer')->name('updateCustomer');
Route::post('update','Customer\CustomerController@update')->name('update');
