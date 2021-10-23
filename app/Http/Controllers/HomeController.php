<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();

        // $all_product = DB::table('product')
        // ->join('Category','Category.CategoryId','=','product.CategoryId')
        // ->join('brand','brand.BrandId','=','product.BrandId')
        // ->select('product.*', 'Category.CategoryName', 'brand.BrandName')
        // ->orderby('product.ProductId', 'desc')->get();
        // $manager_product = view('admin.view_product')->with('all_product', $all_product);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'
        $all_product = DB::table('product')->where('status', 1)->orderby('ProductId', 'desc')->limit(4)->get();

        return view('client.home')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('all_product', $all_product);
    }
}
