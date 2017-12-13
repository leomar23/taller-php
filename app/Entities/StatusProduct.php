<?php

namespace Taller\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Taller\User;

class StatusProduct extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'user_id',
    	'name',
    	'comment'
    ];

    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/

}
