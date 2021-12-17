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
Route::post('/customer-register', 'App\Http\Controllers\HomeController@customer_register');

Route::post('/search_result', 'App\Http\Controllers\HomeController@search_result');
Route::post('/', 'App\Http\Controllers\HomeController@search_result');


// Customer Login
Route::get('/login', 'App\Http\Controllers\HomeController@login');
Route::post('/check-password', 'App\Http\Controllers\HomeController@check_password');
Route::get('/customer-logout','App\Http\Controllers\HomeController@logout');

// Product Detail
Route::get('/product-detail/{ProductId}', 'App\Http\Controllers\ProductController@product_detail');

// Admin
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
Route::post('/filter-by-date', 'App\Http\Controllers\AdminController@filter_by_date');
Route::post('/load-default-chart', 'App\Http\Controllers\AdminController@load_default_chart');
Route::post('/filter-by-time-span', 'App\Http\Controllers\AdminController@filter_by_time_span');
// Route::get('/filter-by-time-span', 'App\Http\Controllers\AdminController@filter_by_time_span');
Route::post('/load-pie-chart', 'App\Http\Controllers\AdminController@load_pie_chart');
Route::post('/load-access-chart', 'App\Http\Controllers\AdminController@load_access_chart');

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
Route::get('/view-brand','App\Http\Controllers\BrandController@view_brand');
Route::get('/add-subbrand','App\Http\Controllers\BrandController@add_subbrand');
Route::get('/view-subbrand','App\Http\Controllers\BrandController@view_subbrand');
Route::get('/update-brand/{BrandId}','App\Http\Controllers\BrandController@get_brand_info');
Route::get('/delete-brand','App\Http\Controllers\BrandController@delete_brand');

Route::get('/unactive-brand','App\Http\Controllers\BrandController@unactive_brand');
Route::get('/active-brand','App\Http\Controllers\BrandController@active_brand');

Route::get('/unactive-subbrand/{SubBrandId}','App\Http\Controllers\BrandController@unactive_subbrand');
Route::get('/active-subbrand/{SubBrandId}','App\Http\Controllers\BrandController@active_subbrand');

Route::post('/save-brand','App\Http\Controllers\BrandController@save_brand');
Route::post('/save-subbrand','App\Http\Controllers\BrandController@save_subbrand');
Route::get('/update-brand/{BrandId}','App\Http\Controllers\BrandController@update_brand');
Route::post('/save-update-brand/{BrandId}','App\Http\Controllers\BrandController@save_update_brand');

// Sản phẩm (Product)
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/view-product','App\Http\Controllers\ProductController@view_product');
Route::get('/update-product/{ProductId}','App\Http\Controllers\ProductController@get_product_info');

Route::get('/delete-product','App\Http\Controllers\ProductController@delete_product');
Route::get('/unactive-product','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product','App\Http\Controllers\ProductController@active_product');

Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{ProductId}','App\Http\Controllers\ProductController@update_product');

Route::post('/load-comment','App\Http\Controllers\ProductController@load_comment');
Route::post('/send-comment','App\Http\Controllers\ProductController@send_comment');
Route::get('/get-product','App\Http\Controllers\ProductController@get_product');
Route::post('/export-product','App\Http\Controllers\ProductController@export_product');
Route::post('/import-product','App\Http\Controllers\ProductController@import_product');

//Cart
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/remove-item','App\Http\Controllers\CartController@remove_item');
Route::get('/remove-from-cart/{rowId}','App\Http\Controllers\CartController@remove_from_cart');
Route::get('/add-to-cart','App\Http\Controllers\CartController@add_to_cart');
Route::get('/update-quantity','App\Http\Controllers\CartController@update_quantity');
Route::post('/load-cart','App\Http\Controllers\CartController@load_cart');
Route::post('/load-cart-quantity','App\Http\Controllers\CartController@load_cart_quantity');
Route::get('/load-cart-quantity','App\Http\Controllers\CartController@load_cart_quantity');

// Checkout
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::post('/checkout-after-login','App\Http\Controllers\CheckoutController@checkout_after_login');
Route::get('/login-to-checkout','App\Http\Controllers\CheckoutController@login_to_checkout');

//Profile
Route::get('/profile/{UserId}','App\Http\Controllers\ProfileController@profile');

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
Route::get('/all_blog', 'App\Http\Controllers\BlogController@all_blog');
Route::get('/blog-detail/{BlogId}', 'App\Http\Controllers\BlogController@blog_detail');


//Order (Admin)
Route::get('/confirm_order','App\Http\Controllers\OrderController@confirm_order');
Route::get('/all_order','App\Http\Controllers\OrderController@all_order');
Route::get('/order-detail/{OrderId}', 'App\Http\Controllers\OrderDetailController@order_detail');
Route::get('/update-order-status', 'App\Http\Controllers\OrderController@update_order_status');
Route::get('/add-order-tracking', 'App\Http\Controllers\OrderController@add_order_tracking');

//Order (Client)
Route::get('/my-orders', 'App\Http\Controllers\OrderController@show_my_orders');
Route::post('/create-order', 'App\Http\Controllers\OrderController@create_order');
Route::get('/create-order', 'App\Http\Controllers\OrderController@create_order');
Route::get('/cancel-order','App\Http\Controllers\OrderController@cancel_order');
Route::get('/print-order/{order_id}','App\Http\Controllers\OrderController@print_order');

// OrderDetail (Client)
Route::get('/show-order-detail/{OrderId}', 'App\Http\Controllers\OrderDetailController@index');


//Profile (Admin)
Route::get('/ad_profile/{UserId}','App\Http\Controllers\AdminProfileController@profile');
Route::post('/ad_profile/{UserId}','App\Http\Controllers\AdminProfileController@update_profile');

//ShippingAddress
Route::get('/show-shipping-address','App\Http\Controllers\ShippingAddressController@index');
Route::get('/load-quanhuyen-dropdownbox','App\Http\Controllers\ShippingAddressController@load_quanhuyen_dropdownbox');
Route::get('/load-xaphuongthitran-dropdownbox','App\Http\Controllers\ShippingAddressController@load_xaphuongthitran_dropdownbox');
Route::post('/add-shipping-address','App\Http\Controllers\ShippingAddressController@add_shipping_address');
Route::get('/delete-shipping-address','App\Http\Controllers\ShippingAddressController@delete_shipping_address');
Route::get('/change-default-shipping-address/{ShippingAddressId}','App\Http\Controllers\ShippingAddressController@change_default_shipping_address');
Route::post('/update-shipping-address','App\Http\Controllers\ShippingAddressController@update_shipping_address');
Route::get('/send-order-mail', 'App\Http\Controllers\OrderController@send_order_mail');
Route::get('/send-complete-mail', 'App\Http\Controllers\OrderController@send_complete_mail');

//Product Listing
Route::get('/product-listing/{BrandId}', 'App\Http\Controllers\ProductListingController@product_listing');
Route::get('/product-listing2/{CategoryId}', 'App\Http\Controllers\ProductListingController@product_listing2');
Route::get('/product-listing3/{SubBrandId}', 'App\Http\Controllers\ProductListingController@product_listing3');
Route::get('/product-listing4/{SubBrandId}', 'App\Http\Controllers\ProductListingController@product_listing4');

// Banner Slider
Route::get('/view-banner-slider', 'App\Http\Controllers\BannerSliderController@view_banner_slider');
Route::get('/add-banner-slider', 'App\Http\Controllers\BannerSliderController@add_banner_slider');
Route::post('/save-banner-slider','App\Http\Controllers\BannerSliderController@save_banner_slider');
Route::get('/unactive-banner-slider','App\Http\Controllers\BannerSliderController@unactive_banner_slider');
Route::get('/active-banner-slider','App\Http\Controllers\BannerSliderController@active_banner_slider');
Route::get('/delete-banner-slider','App\Http\Controllers\BannerSliderController@delete_banner_slider');

//  Gallary
Route::get('/view-product-gallary/{ProductId}', 'App\Http\Controllers\GallaryController@view_product_gallary');
Route::post('/add-product-gallary/{ProductId}', 'App\Http\Controllers\GallaryController@add_product_gallary');
Route::get('/unactive-product-gallary','App\Http\Controllers\GallaryController@unactive_product_gallary');
Route::get('/active-product-gallary','App\Http\Controllers\GallaryController@active_product_gallary');
Route::get('/delete-product-gallary','App\Http\Controllers\GallaryController@delete_product_gallary');

//Comment
Route::get('/view-comment','App\Http\Controllers\CommentController@view_comment');
Route::get('/delete-comment','App\Http\Controllers\ProductController@delete_comment');
Route::post('/load-all-comment','App\Http\Controllers\CommentController@load_all_comment');
Route::get('/load-all-comment','App\Http\Controllers\CommentController@load_all_comment');
Route::get('/unactive-comment','App\Http\Controllers\CommentController@unactive_comment');
Route::get('/active-comment','App\Http\Controllers\CommentController@active_comment');
Route::get('/reply-comment','App\Http\Controllers\CommentController@reply_comment');

// WishList
Route::get('/add-product-to-wishlist','App\Http\Controllers\WishListController@add_product_to_wishlist');
Route::get('/remove-product-from-wishlist','App\Http\Controllers\WishListController@remove_product_from_wishlist');

//Campaign
Route::get('/campaign/{CampaignId}','App\Http\Controllers\CampaignController@campaign');

Route::get('/all_campaign','App\Http\Controllers\CampaignController@all_campaign');
Route::get('/add_campaign','App\Http\Controllers\CampaignController@add_campaign');

Route::post('/save-campaign','App\Http\Controllers\CampaignController@save_campaign');

Route::get('/active_campaign','App\Http\Controllers\CampaignController@active_campaign');
Route::get('/unactive_campaign','App\Http\Controllers\CampaignController@unactive_campaign');
Route::get('/delete_campaign','App\Http\Controllers\CampaignController@delete_campaign');

// Shipping
Route::get('/add-shipmethod','App\Http\Controllers\ShipMethodController@add_shipmethod');
Route::post('/save-shipmethod','App\Http\Controllers\ShipMethodController@save_shipmethod');
Route::get('/view-shipmethod','App\Http\Controllers\ShipMethodController@view_shipmethod');
Route::get('/unactive-shipmethod','App\Http\Controllers\ShipMethodController@unactive_shipmethod');
Route::get('/active-shipmethod','App\Http\Controllers\ShipMethodController@active_shipmethod');
Route::get('/delete-shipmethod','App\Http\Controllers\ShipMethodController@delete_shipmethod');
Route::get('/view-extra-shipfee','App\Http\Controllers\ShipMethodController@view_extra_shipfee');
Route::get('/update-extra-shipfee','App\Http\Controllers\ShipMethodController@update_extra_shipfee');

// Rating
Route::get('/is-rating-exit','App\Http\Controllers\RatingController@is_rating_exit');
Route::get('/add-rating','App\Http\Controllers\RatingController@add_rating');
Route::get('/load-rating','App\Http\Controllers\RatingController@load_rating');

//OrderTracking
Route::get('/show-order-tracking/{OrderId}','App\Http\Controllers\OrderTrackingController@show_order_tracking');
Route::post('/load-order-tracking','App\Http\Controllers\OrderTrackingController@load_order_tracking');
Route::post('/load-order-status','App\Http\Controllers\OrderTrackingController@load_order_status');
Route::get('/load-order-status','App\Http\Controllers\OrderTrackingController@load_order_status');

// Report
Route::get('/print-revenue-report/{tu_ngay}/{den_ngay}','App\Http\Controllers\ReportController@print_revenue_report');
Route::get('/print-revenue-report','App\Http\Controllers\ReportController@print_default_revenue_report');
Route::get('/print-product-report/{tu_ngay}/{den_ngay}','App\Http\Controllers\ReportController@print_product_report');
Route::get('/print-product-report','App\Http\Controllers\ReportController@print_default_product_report');
Route::get('/load-product-chart/{tu_ngay}/{den_ngay}','App\Http\Controllers\ReportController@load_product_chart');
Route::post('/load-product-chart','App\Http\Controllers\ReportController@load_product_chart');
Route::get('/print-customer-report/{tu_ngay}/{den_ngay}','App\Http\Controllers\ReportController@print_customer_report');
Route::get('/print-customer-report','App\Http\Controllers\ReportController@print_default_customer_report');
Route::post('/load-customer-chart','App\Http\Controllers\ReportController@load_customer_chart');

//Rating
Route::get('/view-rating','App\Http\Controllers\RatingController@view_rating');
Route::get('/unactive-rating','App\Http\Controllers\RatingController@unactive_rating');
Route::get('/active-rating','App\Http\Controllers\RatingController@active_rating');
Route::get('/delete-rating','App\Http\Controllers\RatingController@delete_rating');