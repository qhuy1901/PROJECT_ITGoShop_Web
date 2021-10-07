<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $product_category_list = DB::table('product_category')->orderby('product_category_id', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('sub_brand', '!=' , 0)->orderby('brand_id', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('sub_brand', 0)->orderby('brand_id', 'desc')->get();

        // $all_product = DB::table('product')
        // ->join('product_category','product_category.product_category_id','=','product.category_id')
        // ->join('brand','brand.brand_id','=','product.brand_id')
        // ->select('product.*', 'product_category.product_category_name', 'brand.brand_name')
        // ->orderby('product.product_id', 'desc')->get();
        // $manager_product = view('admin.view_product')->with('all_product', $all_product);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'


        return view('client.cart')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list);
    }
}
