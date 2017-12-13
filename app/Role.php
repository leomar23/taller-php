<?php

namespace Taller;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	/*protected $fillable = [
        'name', 
        'display_name', 
        'description'
    ];

	protected $table = 'roles';

	public function Permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }*/
}
