<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 06.07.2018
 * Time: 12:41
 */

namespace App\Traits;


use App\Services\CurrencyRepositoryInterface;

trait WorksWithCoinsRepository
{
    private $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    final protected function getWrappedCoins()
    {
        return collect($this->repository->findAll());
    }
}