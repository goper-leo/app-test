<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function() {
    Route::prefix('passers')->group(function() {
      Route::name('get.passers')->get('', 'PassersController@index');
      Route::name('store.passer')->post('store', 'PassersController@store');
      Route::name('sort.passer')->get('sort', 'PassersController@sort');
    });

});
