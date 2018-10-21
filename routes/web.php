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

Route::get('/purchase-history', 'PurchaseHistoryController@index');

Route::get('/purchase-page', 'CapsulesController@index');

route::get('/import-history', 'ImportHistoryController@index');
route::post('/import-history/create', 'ImportHistoryController@store');


Route::get('/confirm/{name}', 'CapsulesController@confirm');
Route::post('/confirm', 'PurchaseHistoryController@complete');
