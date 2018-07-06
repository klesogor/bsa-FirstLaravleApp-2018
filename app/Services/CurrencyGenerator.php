<?php

namespace App\Services;

use GuzzleHttp\Client;

class CurrencyGenerator
{
    const LINK_BASE = 'https://s2.coinmarketcap.com/static/img/coins/128x128/';

    public static function generate(): array
    {
        $client = new Client();
        $data = $client->get('https://api.coinmarketcap.com/v2/ticker/', [
            'query' => [
                'limit' => 10
            ]
        ])->getBody();

        $data = (json_decode($data,true))['data'];
        $currencies = [];
        foreach ($data as $result){
            $currencies[] = new Currency(
                $result['id'],
                $result['name'],
                $result['quotes']['USD']['price'],
                static::LINK_BASE.$result['id'].'.png',
                $result['quotes']['USD']['percent_change_24h']
            );
        }
        return $currencies;

    }
}