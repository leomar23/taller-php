<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserStatus extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = 
    [
    	'name'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }

}
