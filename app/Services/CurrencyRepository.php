<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 06.07.2018
 * Time: 11:41
 */

namespace App\Services;


class CurrencyRepository implements CurrencyRepositoryInterface
{

    /**
     * @param Currency []
     */
    private $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    /**
     * @return Currency[]
     */
    public function findAll(): array
    {
        return $this->currencies;
    }
}