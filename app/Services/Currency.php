<?php

namespace App\Services;



//please see AutoGetter trait. I planned to use it, but I'm not sure if it's a great idea.
class Currency
{
    private $id;
    private $name;
    private $price;
    private $imageUrl;
    private $dailyChangePercent;

    public function __construct(int $id, string $name, float $price, string $url, float $dailyChange)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->imageUrl = $url;
        $this->dailyChangePercent = $dailyChange;
    }

    public function setPrice(float $price)
    {
        if ($price <= 0)
            throw new \RuntimeException('Coin price should be greater than zero!');
        $this->price = $price;
    }

    /** Getters section **/


    public function getPrice()
    {
        return $this->price;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDailyChangePercent()
    {
        return $this->dailyChangePercent;
    }

}