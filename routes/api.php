<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('product/getProducts',['as'=>'product.getProducts','uses'=>'ProductController@getProducts']);


Route::resource('products','ProductController',['only'=> ['getProducts', 'index','store','show','update','destroy']]);


