<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ProductListingController extends Controller
{
    public function product_listing($BrandId)
    {
        
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
        $des_brand = DB::table('brand')->select('brand.*')->where('brand.BrandId',$BrandId)->get();
        $sub_brand = DB::table('subbrand')->select('subbrand.*')->where('subbrand.BrandId',$BrandId)->get();
        $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.BrandId',$BrandId)->get();

        return view('client.product-listing')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('des_brand', $des_brand)
        ->with('sub_brand', $sub_brand)
        ->with('all_product', $all_product);
    }
    public function product_listing3($SubBrandId)
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
           
        $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.SubBrandId','=',$SubBrandId)->get();
        
        foreach($all_product as $key => $value)
        {
            $BrandId = $value->BrandId;
        }
        $des_brand = DB::table('brand')->select('brand.*')->where('brand.BrandId',$BrandId)->get();
        $sub_brand = DB::table('subbrand')->select('subbrand.*')->where('subbrand.BrandId',$BrandId)->get();
    
        return view('client.product-listing3')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('des_brand', $des_brand)
        ->with('sub_brand', $sub_brand)
        ->with('all_product', $all_product);
    }
    public function product_listing2($CategoryId)
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $des_cate = DB::table('Category')->select('Category.*')->where('Category.CategoryId',$CategoryId)->get();

        $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->where('product.CategoryId',$CategoryId)->get();

        return view('client.product-listing2')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('des_cate', $des_cate)
        ->with('all_product', $all_product);
    }
}
