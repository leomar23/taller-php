<?php

use Illuminate\Database\Seeder;
use Taller\Entities\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'category_id' => 1,
                'status_product_id' => 1,
                'name' => 'Polenta',
                'description' => 'aaa',
                'bar_code' => '123',
                'image' => 'imagen1',
                'price' => 25,
            ],
            [
                'category_id' => 2,
                'status_product_id' => 1,
                'name' => 'LEGO',
                'description' => 'rrr',
                'bar_code' => '432',
                'image' => 'imagen2',
                'price' => 800,
            ],
            [
                'category_id' => 1,
                'status_product_id' => 1,
                'name' => 'Fideos',
                'description' => 'bbb',
                'bar_code' => '678',
                'image' => 'imagen3',
                'price' => 30,
            ],
            [
                'category_id' => 1,
                'status_product_id' => 1,
                'name' => 'Arroz',
                'description' => 'ccc',
                'bar_code' => '888',
                'image' => 'imagen4',
                'price' => 45,
            ]
        ];

        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
