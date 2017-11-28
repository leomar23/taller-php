<?php

use Illuminate\Database\Seeder;
use Taller\Entities\Coin;

class CoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coins = [
            [
                'name' => 'Pesos',
                'symbol' => '$'
            ],
            [
                'name' => 'Dolares',
                'symbol' => 'U$s'
            ],
            [
                'name' => 'Euros',
                'symbol' => '€'
            ]
        ];

        foreach ($coins as $key => $value) {
            Coin::create($value);
        }
    }
}
