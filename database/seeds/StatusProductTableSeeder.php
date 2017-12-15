<?php

use Illuminate\Database\Seeder;
use Taller\Entities\StatusProduct;

class StatusProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$status = [
	        [
	        	'id' => 1,
	    		'name' => 'Activo',
	    		'comment' => 'Activo OK'
	    	],
	    	[
	        	'id' => 2,
	    		'name' => 'Inactivo',
	    		'comment' => 'Inactivo ERROR'
	    	]
    	];

    	foreach ($status as $key => $value) {
            StatusProduct::create($value);
        }
    }
}
