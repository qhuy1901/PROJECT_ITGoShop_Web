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

// Route::get('/', function () {
//     return view('welcome');
// });

// Fontend
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');

//Chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}', 'App\Http\Controllers\ProductController@product_detail');

// Backend
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');

// Product Category
Route::get('/add-product-category','App\Http\Controllers\ProductCategoryController@add_product_category');
Route::get('/all-product-category','App\Http\Controllers\ProductCategoryController@all_product_category');
Route::get('/update-product-category/{product_category_id}','App\Http\Controllers\ProductCategoryController@get_product_category_info');
Route::get('/delete-product-category/{product_category_id}','App\Http\Controllers\ProductCategoryController@delete_product_category');

Route::get('/unactive-product-category/{product_category_id}','App\Http\Controllers\ProductCategoryController@unactive_product_category');
Route::get('/active-product-category/{product_category_id}','App\Http\Controllers\ProductCategoryController@active_product_category');

Route::post('/save-product-category','App\Http\Controllers\ProductCategoryController@save_product_category');
Route::post('/update-product-category/{product_category_id}','App\Http\Controllers\ProductCategoryController@update_product_category');

// Thương hiệu sản phẩm (Brand)
Route::get('/add-brand','App\Http\Controllers\BrandController@add_brand');
Route::get('/view-brand','App\Http\Controllers\BrandController@view_brand');
Route::get('/update-brand/{brand_id}','App\Http\Controllers\BrandController@get_brand_info');
Route::get('/delete-brand/{brand_id}','App\Http\Controllers\BrandController@delete_brand');

Route::get('/unactive-brand/{brand_id}','App\Http\Controllers\BrandController@unactive_brand');
Route::get('/active-brand/{brand_id}','App\Http\Controllers\BrandController@active_brand');

Route::post('/save-brand','App\Http\Controllers\BrandController@save_brand');
Route::post('/update-brand/{id}','App\Http\Controllers\BrandController@update_brand');

// Sản phẩm (Product)
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/view-product','App\Http\Controllers\ProductController@view_product');
Route::get('/update-product/{product_id}','App\Http\Controllers\ProductController@get_product_info');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');

Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');

Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product');

