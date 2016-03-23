<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
    Route::get('/columns_get', 'HomeController@getBasicObjectData')->name('get_rows');
});


Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/admin', 'Admin\HomeController@index');
    Route::resource('/admin/columns', 'Admin\ColumnsController');
    Route::resource('/admin/rows', 'Admin\RowsController');
});
