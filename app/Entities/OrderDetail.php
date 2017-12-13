<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderDetail extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = 
    [
    	'product_id',
    	'quantity'
    ];

    public function Product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

}
