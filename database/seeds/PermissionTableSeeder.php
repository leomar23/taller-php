<?php

use Illuminate\Database\Seeder;
use Taller\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                //ADMIN INDEX
                'name' => 'admin-index',
                'display_name' => 'Display Administrator view',
                'description' => 'See administrator view'
            ],
            [
                //ROLE
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                //PERMISSION
                'name' => 'permission-list',
                'display_name' => 'Display permission Listing',
                'description' => 'See only Listing Of permission'
            ],
            [
                'name' => 'permission-create',
                'display_name' => 'Create permission',
                'description' => 'Create New permission'
            ],
            [
                'name' => 'permission-edit',
                'display_name' => 'Edit permission',
                'description' => 'Edit permission'
            ],
            [
                'name' => 'permission-delete',
                'display_name' => 'Delete permission',
                'description' => 'Delete permission'
            ],
            [
                //USER
                'name' => 'user-list',
                'display_name' => 'Display user Listing',
                'description' => 'See only Listing Of user'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create user',
                'description' => 'Create New user'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit user',
                'description' => 'Edit user'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete user',
                'description' => 'Delete user'
            ],
            [
                //CATEGORY
                'name' => 'category-list',
                'display_name' => 'Display category Listing',
                'description' => 'See only Listing Of category'
            ],
            [
                'name' => 'category-create',
                'display_name' => 'Create category',
                'description' => 'Create New category'
            ],
            [
                'name' => 'category-edit',
                'display_name' => 'Edit category',
                'description' => 'Edit category'
            ],
            [
                'name' => 'category-delete',
                'display_name' => 'Delete category',
                'description' => 'Delete category'
            ],
            [
                //CONFIGURATION
                'name' => 'configuration-list',
                'display_name' => 'Display configuration Listing',
                'description' => 'See only Listing Of configuration'
            ],
            [
                'name' => 'configuration-create',
                'display_name' => 'Create configuration',
                'description' => 'Create New configuration'
            ],
            [
                'name' => 'configuration-edit',
                'display_name' => 'Edit configuration',
                'description' => 'Edit configuration'
            ],
            [
                'name' => 'configuration-delete',
                'display_name' => 'Delete configuration',
                'description' => 'Delete configuration'
            ],
            [
                //TYPE
                'name' => 'type-list',
                'display_name' => 'Display type Listing',
                'description' => 'See only Listing Of type'
            ],
            [
                'name' => 'type-create',
                'display_name' => 'Create type',
                'description' => 'Create New type'
            ],
            [
                'name' => 'type-edit',
                'display_name' => 'Edit type',
                'description' => 'Edit type'
            ],
            [
                'name' => 'type-delete',
                'display_name' => 'Delete type',
                'description' => 'Delete type'
            ],
            [
                //STATUS
                'name' => 'status-list',
                'display_name' => 'Display status Listing',
                'description' => 'See only Listing Of status'
            ],
            [
                'name' => 'status-create',
                'display_name' => 'Create status',
                'description' => 'Create New status'
            ],
            [
                'name' => 'status-edit',
                'display_name' => 'Edit status',
                'description' => 'Edit status'
            ],
            [
                'name' => 'status-delete',
                'display_name' => 'Delete status',
                'description' => 'Delete status'
            ],
            [
                //BUSINESSES
                'name' => 'business-list',
                'display_name' => 'Display businesses Listing',
                'description' => 'See only Listing Of Businesses'
            ],
            [
                'name' => 'business-create',
                'display_name' => 'Create Businesses',
                'description' => 'Create New Businesses'
            ],
            [
                'name' => 'business-edit',
                'display_name' => 'Edit Businesses',
                'description' => 'Edit Businesses'
            ],
            [
                'name' => 'business-delete',
                'display_name' => 'Delete Businesses',
                'description' => 'Delete Businesses'
            ],
            [
                //PRODUCTS
                'name' => 'products-list',
                'display_name' => 'Display products Listing',
                'description' => 'See only Listing Of Products'
            ],
            [
                'name' => 'products-create',
                'display_name' => 'Create Products',
                'description' => 'Create New Products'
            ],
            [
                'name' => 'products-edit',
                'display_name' => 'Edit Products',
                'description' => 'Edit Products'
            ],
            [
                'name' => 'products-delete',
                'display_name' => 'Delete Products',
                'description' => 'Delete Products'
            ],
            [
            //ORDERS
                'name' => 'orders-list',
                'display_name' => 'Display orders Listing',
                'description' => 'See only Listing Of Orders'
            ],
            [
                'name' => 'orders-create',
                'display_name' => 'Create Orders',
                'description' => 'Create New Orders'
            ],
            [
                'name' => 'orders-edit',
                'display_name' => 'Edit Orders',
                'description' => 'Edit Orders'
            ],
            [
                'name' => 'orders-delete',
                'display_name' => 'Delete Orders',
                'description' => 'Delete Orders'
            ],
            [
            //ORDERS_STATUSES
                'name' => 'orders_statuses-list',
                'display_name' => 'Display orders_statuses Listing',
                'description' => 'See only Listing Of Orders Statuses'
            ],
            [
                'name' => 'orders_statuses-create',
                'display_name' => 'Create Orders Statuses',
                'description' => 'Create New Statuses for Orders'
            ],
            [
                'name' => 'orders_statuses-edit',
                'display_name' => 'Edit Orders Satuses',
                'description' => 'Edit Orders Statuses'
            ],
            [
                'name' => 'orders_statuses-delete',
                'display_name' => 'Delete Orders Statuses',
                'description' => 'Delete Orders Statuses'
            ],





        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }

    }
}
