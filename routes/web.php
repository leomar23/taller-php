<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('admin',['as'=>'admin.index','uses'=>'AdminController@index','middleware' => ['permission:admin-index']]);

    Route::resource('users','UserController');
   
    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
    
    Route::get('coin/index',['as'=>'coin.index','uses'=>'CoinController@index']);//,'middleware' => ['permission:coin-list']]);
    Route::get('coin/create',['as'=>'coin.create','uses'=>'CoinController@create']);//,'middleware' => ['permission:coin-create']]);
    Route::post('coin/create',['as'=>'coin.store','uses'=>'CoinController@store']);//,'middleware' => ['permission:coin-create']]);

    //CATEGORY
    //Route::resource('category','CategoryController');
    
    //PRODUCT
    Route::get('product/admin',['as'=>'product.admin','uses'=>'ProductController@admin']);
    Route::get('product/create',['as'=>'product.create','uses'=>'ProductController@create']);
    Route::post('product/create',['as'=>'product.store','uses'=>'ProductController@store']);
    Route::get('product/{id}',['as'=>'product.show','uses'=>'ProductController@show']);
    Route::get('product/{id}/edit',['as'=>'product.edit','uses'=>'ProductController@edit']);
    Route::patch('product/{id}',['as'=>'product.update','uses'=>'ProductController@update']);
    Route::delete('product/{id}',['as'=>'product.destroy','uses'=>'ProductController@destroy','middleware' => ['permission:project-delete']]);
    
    //USER
    Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
    Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
    Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
    Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
    Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
    Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
    Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);

    //ROLE
    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
        
    //PERMISSION
    Route::get('permission',['as'=>'permission.index','uses'=>'PermissionController@index']);//,'middleware' => ['permission:permission-list|permission-create|permission-edit|permission-delete']]);
    Route::get('permission/create',['as'=>'permission.create','uses'=>'PermissionController@create']);//,'middleware' => ['permission:permission-create']]);
    Route::post('permission/create',['as'=>'permission.store','uses'=>'PermissionController@store']);//,'middleware' => ['permission:permission-create']]);
    Route::get('permission/{id}/edit',['as'=>'permission.edit','uses'=>'PermissionController@edit']);//,'middleware' => ['permission:permission-edit']]);
    Route::patch('permission/{id}',['as'=>'permission.update','uses'=>'PermissionController@update']);//,'middleware' => ['permission:permission-edit']]);
    Route::delete('permission/{id}',['as'=>'permission.destroy','uses'=>'PermissionController@destroy']);//,'middleware' => ['permission:permission-delete']]);

    //CATEGORY
    Route::get('category',['as'=>'category.index','uses'=>'CategoryController@index']);//,'middleware' => ['permission:category-list|category-create|category-edit|category-delete']]);
    Route::get('category/create',['as'=>'category.create','uses'=>'CategoryController@create']);//,'middleware' => ['permission:category-create']]);
    Route::post('category/create',['as'=>'category.store','uses'=>'CategoryController@store']);//,'middleware' => ['permission:category-create']]);
    Route::get('category/{id}/edit',['as'=>'category.edit','uses'=>'CategoryController@edit']);//,'middleware' => ['permission:category-edit']]);
    Route::patch('category/{id}',['as'=>'category.update','uses'=>'CategoryController@update']);//,'middleware' => ['permission:category-edit']]);
    Route::delete('category/{id}',['as'=>'category.destroy','uses'=>'CategoryController@destroy']);//,'middleware' => ['permission:category-delete']]);

    //BUSINESS
    Route::get('business',['as'=>'business.index','uses'=>'BusinessesController@index']);//,'middleware' => ['permission:business-list|business-create|business-edit|business-delete']]);
    Route::get('business/create',['as'=>'business.create','uses'=>'BusinessesController@create']);//,'middleware' => ['permission:business-create']]);
    Route::post('business/create',['as'=>'business.store','uses'=>'BusinessesController@store']);//,'middleware' => ['permission:business-create']]);
    Route::get('business/{id}/edit',['as'=>'business.edit','uses'=>'BusinessesController@edit']);//,'middleware' => ['permission:business-edit']]);
    Route::patch('business/{id}',['as'=>'business.update','uses'=>'BusinessesController@update']);//,'middleware' => ['permission:business-edit']]);
    Route::delete('business/{id}',['as'=>'business.destroy','uses'=>'BusinessesController@destroy']);//,'middleware' => ['permission:business-delete']]);

    //ORDERS
    Route::get('orders',['as'=>'orders.index','uses'=>'OrdersController@index']);//,'middleware' => ['permission:orders-list|orders-create|orders-edit|orders-delete']]);
    Route::get('orders/create',['as'=>'orders.create','uses'=>'OrdersController@create']);//,'middleware' => ['permission:orders-create']]);
    Route::post('orders/create',['as'=>'orders.store','uses'=>'OrdersController@store']);//,'middleware' => ['permission:orders-create']]);
    Route::get('orders/{id}/edit',['as'=>'orders.edit','uses'=>'OrdersController@edit']);//,'middleware' => ['permission:orders-edit']]);
    Route::patch('orders/{id}',['as'=>'orders.update','uses'=>'OrdersController@update']);//,'middleware' => ['permission:orders-edit']]);
    Route::delete('orders/{id}',['as'=>'orders.destroy','uses'=>'OrdersController@destroy']);//,'middleware' => ['permission:orders-delete']]);


    /*Route::get('product',['as'=>'product.index','uses'=>'ProductController@admin']);//,'middleware' => ['permission:project-list|product-create|product-edit|product-delete']]);
    Route::get('product/create',['as'=>'product.create','uses'=>'ProductController@create']);//,'middleware' => ['permission:project-create']]);
    Route::post('product/create',['as'=>'product.store','uses'=>'ProductController@store']);//,'middleware' => ['permission:project-create']]);
    Route::get('product/{id}',['as'=>'product.show','uses'=>'ProductController@show']);
    Route::get('product/{id}/edit',['as'=>'product.edit','uses'=>'ProductController@edit']);//,'middleware' => ['permission:project-edit']]);
    Route::patch('product/{id}',['as'=>'product.update','uses'=>'ProductController@update']);//,'middleware' => ['permission:project-edit']]);
    Route::delete('product/{id}',['as'=>'product.destroy','uses'=>'ProductController@destroy','middleware' => ['permission:project-delete']]);*/
});