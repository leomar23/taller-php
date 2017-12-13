<?php

use Illuminate\Database\Seeder;
use Taller\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Alimentos',
                'description' => 'Son cosas que se comen'
            ],
            [
                'name' => 'Juguetes',
                'description' => 'Para jugar'
            ],
            [
                'name' => 'Vestimenta',
                'description' => 'Ropa y afines'
            ]
        ];

        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
