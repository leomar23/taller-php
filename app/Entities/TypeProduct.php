<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TypeProduct extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'type_products';
    protected $fillable = ['category_id','name'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
