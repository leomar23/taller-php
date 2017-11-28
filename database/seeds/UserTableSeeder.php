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
            'name' => 'TallerPHP',
            'last_name' => 'Administrador',
            'phone' => '00000000',
            'gender' => 'Male',
            'birth_date' => new DateTime,
            'email' => 'tallerphp@gmail.com',
            'password' => bcrypt('Soyeladmin'),
            'status_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'John',
            'last_name' => 'Doe',
            'phone' => '00000000',
            'gender' => 'Male',
            'birth_date' => new DateTime,
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('jdoe2017'),
            'status_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Jane',
            'last_name' => 'Doe',
            'phone' => '00000000',
            'gender' => 'Female',
            'birth_date' => new DateTime,
            'email' => 'janedoe@gmail.com',
            'password' => bcrypt('jdoe2017'),
            'status_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'John',
            'last_name' => 'Q. Public',
            'phone' => '00000000',
            'gender' => 'Female',
            'birth_date' => new DateTime,
            'email' => 'johnpublic@gmail.com',
            'password' => bcrypt('jpublic2017'),
            'status_id' => 1,
        ]);

        $user = User::query()->where('email', 'tallerphp@gmail.com')->first();
        $role = Role::query()->where('name', 'admin')->first();
        $user->attachRole($role);

        $user2 = User::query()->where('email', 'johndoe@gmail.com')->first();
        $role2 = Role::query()->where('name', 'gerente')->first();
        $user2->attachRole($role2);

        $user3 = User::query()->where('email', 'janedoe@gmail.com')->first();
        $role3 = Role::query()->where('name', 'despachador')->first();
        $user3->attachRole($role3);

        $user4 = User::query()->where('email', 'johnpublic@gmail.com')->first();
        $role4 = Role::query()->where('name', 'cliente')->first();
        $user4->attachRole($role4);
    }
}
