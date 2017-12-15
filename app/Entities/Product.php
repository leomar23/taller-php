<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = 
    [
        'category_id',
        'status_product_id',
        'name',  
        'description',
        'bar_code',
        'image',
        'price',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Status()
    {
        return $this->belongsTo(StatusProduct::class);
    }

    // LEO
    public function OrderDetail()
    {
        return $this->belongsToMany(OrderDetail::class);
    }

}
