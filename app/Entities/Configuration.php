<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Configuration extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    'name',
    'value',
    'description'
	];

}
