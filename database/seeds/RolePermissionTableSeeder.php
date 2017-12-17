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

        DB::table('permission_role')->where([['permission_id', '>', 45], ['role_id', '=', 4]])->delete();

        $permission2 = Permission::query()->whereIn('id', [34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 47])->get();
        $role2 = Role::query()->where('name', 'gerente')->first();

        foreach ($permission2 as $key => $value2) {
            $role2->attachPermission($value2);
        }

        $permission3 = Permission::query()->whereIn('id', [38, 40, 42, 44, 46])->get();
        $role3 = Role::query()->where('name', 'despachador')->first();

        foreach ($permission3 as $key => $value3) {
            $role3->attachPermission($value3);
        }

        $permission4 = Permission::query()->whereIn('id', [14, 30, 34, 38, 39, 42])->get();
        $role4 = Role::query()->where('name', 'cliente')->first();

        foreach ($permission4 as $key => $value4) {
            $role4->attachPermission($value4);
        }

    }
}
