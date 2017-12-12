<?php

namespace Taller;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name', 
        'display_name', 
        'description'
    ];

    protected $table = 'permissions';

    public function Role()
    {
        return $this->hasMany(Role::class);
    }
}
