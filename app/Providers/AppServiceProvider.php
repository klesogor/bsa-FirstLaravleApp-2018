<?php

namespace App\Providers;

use App\Services\CurrencyGenerator;
use App\Services\CurrencyRepository;
use App\Services\CurrencyRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CurrencyRepositoryInterface::class, function(){
            return new CurrencyRepository(CurrencyGenerator::generate());
        });
    }
}
