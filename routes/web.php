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

    //Route::resource('users','UserController');

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

});