<?php

use Illuminate\Database\Seeder;
use Taller\Entities\OrderStatus;

class OrderStatusTableSeeder extends Seeder
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
	    		'name' => 'Creado',
	    	],
	    	[
	        	'id' => 2,
	    		'name' => 'En proceso',
	    	],
	    	[
	        	'id' => 3,
	    		'name' => 'Entregado',
	    	],
    	];

    	foreach ($status as $key => $value) {
            OrderStatus::create($value);
        }
    }
}
