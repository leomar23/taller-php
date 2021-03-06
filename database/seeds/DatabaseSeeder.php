<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(BusinessTableSeeder::class);
        $this->call(StatusProductTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(BusinessProductTableSeeder::class);
    }
}
