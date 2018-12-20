<?php

Auth::routes();

Route::get('/', 'CapsulesController@index');

// 全ユーザ
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {

    Route::get('/purchase-page', 'CapsulesController@index')->name('CapsulesController.index');
    Route::post('/purchase-page', 'CapsulesController@confirm')->name('CapsulesController.confirm');
    Route::get('/confirm/{name}', 'CapsulesController@confirm');
    Route::post('/confirm', 'PurchaseHistoryController@complete');

    Route::get('/purchase-history', 'PurchaseHistoryController@index')->name('PurchaseHistoryController.index');
    Route::post('/purchase-history', 'PurchaseHistoryController@complete')->name('PurchaseHistoryController.complete');
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {


    Route::get('/charge', 'ChargeController@index')->name('ChargeController.index');
    Route::post('/charge', 'ChargeController@store')->name('ChargeController.store');

    Route::get('/import-history', 'ImportHistoryController@index')->name('ImportHistoryController.index');
    Route::post('/import-history', 'ImportHistoryController@store')->name('ImportHistoryController.store');
});

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {

});
