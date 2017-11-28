<?php

use Illuminate\Database\Seeder;
use Taller\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => 'cliente',
                'display_name' => 'Cliente',
                'description' => 'Cliente del sitio'
            ],
            [
                'name' => 'despachador',
                'display_name' => 'Despachador',
                'description' => 'Despachadores de sitio'
            ],
            [
                'name' => 'gerente',
                'display_name' => 'Gerente',
                'description' => 'Gerentes del sitio'
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Administradores del sitio'
            ]
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
