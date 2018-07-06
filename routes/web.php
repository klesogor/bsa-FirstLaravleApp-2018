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

Route::group(['prefix'=>'currencies'],function(){

   Route::get('/popular',function(){ // closure this time
        $repository = App::make(\App\Services\CurrencyRepositoryInterface::class);
        $coins = (new \App\Services\GetPopularCurrenciesCommandHandler($repository))->handle();
        $coins = array_map(function($item){
            return \App\Services\CurrencyPresenter::present($item);
        },$coins);
        return view('home')->with(['coins'=>$coins]);
   })->name('home');

});
