<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Taller\Entities\Product;

class Business extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = 
    [
    	'name',
    	'owner_id',
    	'location'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
