<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Category extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'categories';

    protected $fillable = [
    'name',
    'description'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
