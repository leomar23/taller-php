<?php

use Illuminate\Database\Seeder;
use Taller\User;
use Taller\Role;
use Taller\Entities\UserStatus;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Activo'
            ],
            [
                'name' => 'Inactivo'
            ],
            [
                'name' => 'Rechazado'
            ],
            [
                'name' => 'Bloqueado'
            ],
            [
                'name' => 'Pendiente'
            ],
        ];

        foreach ($status as $key => $value) {
            UserStatus::create($value);
        }

        DB::table('users')->insert([
            'name' => 'AdminPHP',
            'last_name' => 'Administrador',
            'phone' => '0800111',
            'gender' => 'Male',
            'birth_date' => new DateTime,
            'email' => 'tallerphp@gmail.com',
            'password' => bcrypt('Soyeladmin'),
            'status_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Johnie',
            'last_name' => 'Bravo',
            'phone' => '02185446',
            'gender' => 'Male',
            'birth_date' => new DateTime,
            'email' => 'ger@gmail.com',
            'password' => bcrypt('321'),
            'status_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Jane',
            'last_name' => 'Watson',
            'phone' => '02415487',
            'gender' => 'Female',
            'birth_date' => new DateTime,
            'email' => 'des@gmail.com',
            'password' => bcrypt('321'),
            'status_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Cli-enta',
            'last_name' => 'Q. Public',
            'phone' => '08001711',
            'gender' => 'Female',
            'birth_date' => new DateTime,
            'email' => 'cli@gmail.com',
            'password' => bcrypt('321'),
            'status_id' => 1,
        ]);

        $user = User::query()->where('email', 'tallerphp@gmail.com')->first();
        $role = Role::query()->where('name', 'admin')->first();
        $user->attachRole($role);

        $user2 = User::query()->where('email', 'ger@gmail.com')->first();
        $role2 = Role::query()->where('name', 'gerente')->first();
        $user2->attachRole($role2);

        $user3 = User::query()->where('email', 'des@gmail.com')->first();
        $role3 = Role::query()->where('name', 'despachador')->first();
        $user3->attachRole($role3);

        $user4 = User::query()->where('email', 'cli@gmail.com')->first();
        $role4 = Role::query()->where('name', 'cliente')->first();
        $user4->attachRole($role4);
    }
}
