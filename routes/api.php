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
Route::group(['prefix'=>'/currencies'],function(){

    Route::get('/','CurrenciesController@allCurrenciesJson');

    Route::get('/unstable','CurrenciesController@unstableCurrencyJson');

    Route::get('/popular/{limit?}','CurrenciesController@topCurrenciesJson');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
