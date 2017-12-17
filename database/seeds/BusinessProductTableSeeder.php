<?php

use Illuminate\Database\Seeder;

class BusinessProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bus_prods = [
            [
                'business_id' => '1',
                'product_id' => '1',
                'stock' => 100,
                'price' => 0,

            ],
            [
                'business_id' => '1',
                'product_id' => '2',
                'stock' => 120,
                'price' => 0,                
            ],
            [
                'business_id' => '1',
                'product_id' => '3',
                'stock' => 300,
                'price' => 0,                
            ]
        ];

        foreach ($bus_prods as $key => $value) {
            DB::table('business_products')->insert($value);
        }
    }
}
