<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cart;

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

// Home
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');

// Customer Login
Route::get('/login', 'App\Http\Controllers\HomeController@login');
Route::post('/check-password', 'App\Http\Controllers\HomeController@check_password');
Route::get('/customer-logout','App\Http\Controllers\HomeController@logout');

//Chi tiết sản phẩm
Route::get('/product-detail/{ProductId}', 'App\Http\Controllers\ProductController@product_detail');

// Backend
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');

// Product Category
Route::get('/add-product-category','App\Http\Controllers\ProductCategoryController@add_product_category');
Route::get('/all-product-category','App\Http\Controllers\ProductCategoryController@all_product_category');
Route::get('/update-product-category/{CategoryId}','App\Http\Controllers\ProductCategoryController@get_product_category_info');
Route::get('/delete-product-category/{CategoryId}','App\Http\Controllers\ProductCategoryController@delete_product_category');

Route::get('/unactive-product-category/{CategoryId}','App\Http\Controllers\ProductCategoryController@unactive_product_category');
Route::get('/active-product-category/{CategoryId}','App\Http\Controllers\ProductCategoryController@active_product_category');

Route::post('/save-product-category','App\Http\Controllers\ProductCategoryController@save_product_category');
Route::post('/update-product-category/{CategoryId}','App\Http\Controllers\ProductCategoryController@update_product_category');

// Thương hiệu sản phẩm (Brand)
Route::get('/add-brand','App\Http\Controllers\BrandController@add_brand');
Route::get('/view-brand','App\Http\Controllers\BrandController@view_brand');
Route::get('/update-brand/{BrandId}','App\Http\Controllers\BrandController@get_brand_info');
Route::get('/delete-brand/{BrandId}','App\Http\Controllers\BrandController@delete_brand');

Route::get('/unactive-brand/{BrandId}','App\Http\Controllers\BrandController@unactive_brand');
Route::get('/active-brand/{BrandId}','App\Http\Controllers\BrandController@active_brand');

Route::post('/save-brand','App\Http\Controllers\BrandController@save_brand');
Route::post('/update-brand/{id}','App\Http\Controllers\BrandController@update_brand');

// Sản phẩm (Product)
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/view-product','App\Http\Controllers\ProductController@view_product');
Route::get('/update-product/{ProductId}','App\Http\Controllers\ProductController@get_product_info');
Route::get('/delete-product/{ProductId}','App\Http\Controllers\ProductController@delete_product');

Route::get('/unactive-product/{ProductId}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{ProductId}','App\Http\Controllers\ProductController@active_product');

Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{ProductId}','App\Http\Controllers\ProductController@update_product');

//Cart
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/remove-item','App\Http\Controllers\CartController@remove_item');
Route::get('/remove-from-cart/{rowId}','App\Http\Controllers\CartController@remove_from_cart');
Route::get('/add-to-cart','App\Http\Controllers\CartController@add_to_cart');
//Route::get('', [CartController::class,'save_cart'])

// Checkout
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');

//Profile
Route::get('/profile','App\Http\Controllers\ProfileController@profile');

//WishList
Route::get('/wishlist','App\Http\Controllers\WishListController@wishlist');

//Blog (Admin)
Route::get('/add-content','App\Http\Controllers\BlogController@add_content');
Route::get('/view-content','App\Http\Controllers\BlogController@view_content');
Route::get('/update-post/{BlogId}','App\Http\Controllers\BlogController@get_post_info');
Route::get('/delete-post/{BlogId}','App\Http\Controllers\BlogController@delete_post');

Route::get('/unactive-post/{BlogId}','App\Http\Controllers\BlogController@unactive_post');
Route::get('/active-post/{BlogId}','App\Http\Controllers\BlogController@active_post');

Route::post('/save-post','App\Http\Controllers\BlogController@save_post');
Route::post('/update-post/{BlogId}','App\Http\Controllers\BlogController@update_post');

//Blog (Client)
Route::get('/bloggrid', 'App\Http\Controllers\BlogController@bloggrid');
Route::get('/blog-detail', 'App\Http\Controllers\BlogController@blog_detail');


//Order (Admin)
Route::get('/confirm_order','App\Http\Controllers\OrderController@confirm_order');
Route::get('/all_order','App\Http\Controllers\OrderController@all_order');
Route::get('/order_status','App\Http\Controllers\OrderController@order_status');

Route::post('/update-order','App\Http\Controllers\OrderController@update_order');

Route::get('/order-detail', 'App\Http\Controllers\OrderController@order_detail');