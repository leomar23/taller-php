<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class OrderStatus extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'id',
    	'name',
    ];

    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/

}