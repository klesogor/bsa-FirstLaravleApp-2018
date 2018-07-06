<?php

namespace App\Http\Controllers;

use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;
use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function allCurrenciesJson(CurrencyRepositoryInterface $repository)
    {
        $currencies = (new GetCurrenciesCommandHandler($repository))->handle();
        $result = [];
        foreach ($currencies as $currency)
            $result[] = CurrencyPresenter::present($currency);
        return response($result);
    }

    public function unstableCurrencyJson()
    {
        $repository = app()->make(CurrencyRepositoryInterface::class);
        $coin = (new GetMostChangedCurrencyCommandHandler($repository))->handle();
        return response(CurrencyPresenter::present($coin));
    }

    public function topCurrenciesJson(int $limit = 3)
    {
        $repository = app()->make(CurrencyRepositoryInterface::class);
        $coins = (new GetPopularCurrenciesCommandHandler($repository))->handle($limit);
        $result = [];
        foreach ($coins as $coin)
            $result[] = CurrencyPresenter::present($coin);
        return response($result);
    }
}
