<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Backend
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');

// Product Category
Route::get('/add-product-category','App\Http\Controllers\ProductCategory@add_product_category');
Route::get('/all-product-category','App\Http\Controllers\ProductCategory@all_product_category');
Route::get('/update-product-category/{product_category_id}','App\Http\Controllers\ProductCategory@get_product_category_info');
Route::get('/delete-product-category/{product_category_id}','App\Http\Controllers\ProductCategory@delete_product_category');

Route::get('/unactive-product-category/{product_category_id}','App\Http\Controllers\ProductCategory@unactive_product_category');
Route::get('/active-product-category/{product_category_id}','App\Http\Controllers\ProductCategory@active_product_category');

Route::post('/save-product-category','App\Http\Controllers\ProductCategory@save_product_category');
Route::post('/update-product-category/{id}','App\Http\Controllers\ProductCategory@update_product_category');