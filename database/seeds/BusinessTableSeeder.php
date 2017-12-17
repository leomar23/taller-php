<?php

use Illuminate\Database\Seeder;
use Taller\Entities\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses = [
            [
                'name' => 'Tata',
                'owner_id' => '2',
                'location' => 'location_text'
            ],
            [
                'name' => 'Disco',
                'owner_id' => '2',
                'location' => 'location_text 2'
            ],
            [
                'name' => 'Tienda Inglesa',
                'owner_id' => '2',
                'location' => 'location_text 3'
            ]
        ];

        foreach ($businesses as $key => $value) {
            Business::create($value);
        }
    }
}
