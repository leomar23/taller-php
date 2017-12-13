<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = 
    [
    	'user_id',
    	'order_detail_id',
    	'shipping_place',
    	'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function OrderDetail()
    {
        return $this->hasOne(OrderDetail::class);
    }

}
