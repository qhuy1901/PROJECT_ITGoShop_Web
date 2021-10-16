<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
use Gloudemans\Shoppingcart\Facades\Cart; // chú ý: cái này cài từ https://packagist.org/packages/bumbummen99/shoppingcart
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('product_category')->orderby('product_category_id', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('sub_brand', '!=' , 0)->orderby('brand_id', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('sub_brand', 0)->orderby('brand_id', 'desc')->get();

        //Cái này là của function
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $product_info = DB::table('product')->where('product_id', $product_id)->first();

        // $all_product = DB::table('product')
        // ->join('product_category','product_category.product_category_id','=','product.category_id')
        // ->join('brand','brand.brand_id','=','product.brand_id')
        // ->select('product.*', 'product_category.product_category_name', 'brand.brand_name')
        // ->orderby('product.product_id', 'desc')->get();
        // $manager_product = view('admin.view_product')->with('all_product', $all_product);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'

        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy(); // Hủy session

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->price;
        $data['weight'] = $product_info->price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);

        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('product_category')->orderby('product_category_id', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('sub_brand', '!=' , 0)->orderby('brand_id', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('sub_brand', 0)->orderby('brand_id', 'desc')->get();
        //


        return view('client.cart')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list);
    }

    public function remove_from_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
}
