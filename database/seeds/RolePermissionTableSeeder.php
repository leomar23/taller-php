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

        foreach ($permission as $key => $value) {
            $role->attachPermission($value);
        }

        $permission2 = Permission::all();
        $role2 = Role::query()->where('name', 'gerente')->first();

        foreach ($permission2 as $key => $value2) {
            $role2->attachPermission($value2);
        }

        $permission3 = Permission::query()->whereIn('id', [10, 14, 22, 30, 34, 38, 42])->get();
        $role3 = Role::query()->where('name', 'despachador')->first();

        foreach ($permission3 as $key => $value3) {
            $role3->attachPermission($value3);
        }

        $permission4 = Permission::query()->whereIn('id', [14, 30, 34, 38, 42])->get();
        $role4 = Role::query()->where('name', 'cliente')->first();

        foreach ($permission4 as $key => $value4) {
            $role4->attachPermission($value4);
        }

    }
}
