<?php

namespace App\Services;

use App\Traits\WorksWithCoinsRepository;

class GetCurrenciesCommandHandler
{
    use WorksWithCoinsRepository;

    public function handle(): array
    {
        return $this->repository->findAll();
    }
}