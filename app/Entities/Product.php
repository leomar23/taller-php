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
        'user_id',
        'category_id',
        'type_product_id'
        'status_product_id',
        'name', 
        'url', 
        'description',
        'bar_code',
        'stock',
        'image',
        'price',
        'active'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Status()
    {
        return $this->belongsTo(StatusProduct::class);
    }

    public function Media()
    {
        return $this->hasMany(Media::class);
    }

    public function TypeProduct()
    {
        return $this->belongsTo(TypeProduct::class);
    }

    // LEO
    public function OrderDetail()
    {
        return $this->belongsToMany(OrderDetail::class);
    }

}
