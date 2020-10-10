<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add-product', 'App\Http\Controllers\ProductController@createProduct');
Route::get('product-listing', 'App\Http\Controllers\ProductController@productListing');
Route::post('delete-product', 'App\Http\Controllers\ProductController@deleteProduct');
Route::post('edit-product', 'App\Http\Controllers\ProductController@updateProduct');
