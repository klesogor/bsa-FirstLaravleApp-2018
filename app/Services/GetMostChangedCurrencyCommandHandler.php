<?php

namespace App\Services;

use App\Traits\WorksWithCoinsRepository;

class GetMostChangedCurrencyCommandHandler
{
    use WorksWithCoinsRepository;
    public function handle(): Currency
    {
        return $this->getWrappedCoins()
            ->sortByDesc(function($item) {
                return $item->getDailyChangePercent();
            })
            ->first();
    }
}