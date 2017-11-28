<?php

use Illuminate\Database\Seeder;
use Taller\Role;
use Taller\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::all();
        $role = Role::query()->where('name', 'admin')->first();
        //$role2 = Role::query()->where('name', 'owner')->first();

        foreach ($permission as $key => $value) {
            $role->attachPermission($value);
            //$role2->attachPermission($value);
        }
    }
}
