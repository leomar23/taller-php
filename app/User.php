<?php

namespace Taller;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Taller\Entities\UserStatus;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'last_name',
        'phone',
        'birth_date',
        'gender',
        'email',         
        'password',
        'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function UserStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }

    public function Business()
    {
        return $this->hasOne(Business::class);
    }
}
