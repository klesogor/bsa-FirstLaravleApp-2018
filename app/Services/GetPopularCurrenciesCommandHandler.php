<?php

namespace App\Services;

use App\Traits\WorksWithCoinsRepository;


class GetPopularCurrenciesCommandHandler
{
    const POPULAR_COUNT = 3;

    use WorksWithCoinsRepository;

    public function handle(int $count = self::POPULAR_COUNT): array
    {
        return $this->getWrappedCoins()
            ->sortByDesc(function($item) {
                return $item->getPrice();
            })
            ->take($count)
            ->all();
    }
}