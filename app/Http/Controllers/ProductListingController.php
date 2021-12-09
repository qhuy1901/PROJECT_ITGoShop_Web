<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ProductListingController extends Controller
{
    public function product_listing4($BrandName)
    {
        
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
        $des_brand = DB::table('brand')->select('brand.*')->where('brand.BrandName',$BrandName)->limit(1)->get();
        $sub_brand = DB::table('subbrand')->select('subbrand.*')
        ->join('brand','brand.BrandId','=','subbrand.BrandId')
        ->where('brand.BrandName',$BrandName)->get();

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giamdan'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('brand.BrandName',$BrandName)
                ->orderBy('product.Price','DESC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'tangdan'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('brand.BrandName',$BrandName)
                ->orderBy('product.Price','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'az'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('brand.BrandName',$BrandName)
                ->orderBy('product.ProductName','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'za'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('brand.BrandName',$BrandName)
                ->orderBy('product.ProductName','DESC')->paginate(9)->appends(request()->query());
            }

        }
        else{
            $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('brand.BrandName',$BrandName)->paginate(9);
        }
        

        return view('client.product-listing')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('des_brand', $des_brand)
        ->with('sub_brand', $sub_brand)
        ->with('all_product', $all_product);
    }
    public function product_listing($BrandId)
    {
        
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
        $des_brand = DB::table('brand')->select('brand.*')->where('brand.BrandId',$BrandId)->limit(1)->get();
        $sub_brand = DB::table('subbrand')->select('subbrand.*')->where('subbrand.BrandId',$BrandId)->get();
        
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giamdan'){
                $all_product = DB::table('product')
                ->join('Category','Category.CategoryId','=','product.CategoryId')
                ->join('brand','brand.BrandId','=','product.BrandId')
                ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
                ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
                ->where('product.BrandId',$BrandId)
                ->orderBy('product.Price','DESC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'tangdan'){
                $all_product = DB::table('product')
                ->join('Category','Category.CategoryId','=','product.CategoryId')
                ->join('brand','brand.BrandId','=','product.BrandId')
                ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
                ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
                ->where('product.BrandId',$BrandId)
                ->orderBy('product.Price','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'az'){
                $all_product = DB::table('product')
                ->join('Category','Category.CategoryId','=','product.CategoryId')
                ->join('brand','brand.BrandId','=','product.BrandId')
                ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
                ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
                ->where('product.BrandId',$BrandId)
                ->orderBy('product.ProductName','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'za'){
                $all_product = DB::table('product')
                ->join('Category','Category.CategoryId','=','product.CategoryId')
                ->join('brand','brand.BrandId','=','product.BrandId')
                ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
                ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
                ->where('product.BrandId',$BrandId)
                ->orderBy('product.ProductName','DESC')->paginate(9)->appends(request()->query());
            }

        }
        else{
            $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.BrandId',$BrandId)->paginate(9);
        }
        

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
        
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giamdan'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.SubBrandId','=',$SubBrandId)
                ->orderBy('product.Price','DESC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'tangdan'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.SubBrandId','=',$SubBrandId)
                ->orderBy('product.Price','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'az'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.SubBrandId','=',$SubBrandId)
                ->orderBy('product.ProductName','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'za'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.SubBrandId','=',$SubBrandId)
                ->orderBy('product.ProductName','DESC')->paginate(9)->appends(request()->query());
            }

        }
        else{
            $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->where('product.SubBrandId','=',$SubBrandId)->paginate(9);
        }
        
        
        foreach($all_product as $key => $value)
        {
            $BrandId = $value->BrandId;
        }
        $des_brand = DB::table('brand')->select('brand.*')->where('brand.BrandId',$BrandId)->limit(1)->get();
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

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giamdan'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->where('product.CategoryId',$CategoryId)
                ->orderBy('product.Price','DESC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'tangdan'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->where('product.CategoryId',$CategoryId)
                ->orderBy('product.Price','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'az'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->where('product.CategoryId',$CategoryId)
                ->orderBy('product.ProductName','ASC')->paginate(9)->appends(request()->query());
            }
            elseif($sort_by == 'za'){
                $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->where('product.CategoryId',$CategoryId)
                ->orderBy('product.ProductName','DESC')->paginate(9)->appends(request()->query());
            }

        }
        else{
            $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->where('product.CategoryId',$CategoryId)->paginate(6);
        }
        

        return view('client.product-listing2')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('des_cate', $des_cate)
        ->with('all_product', $all_product);
    }
}
