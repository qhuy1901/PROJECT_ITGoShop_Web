<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class WishListController extends Controller
{
    public function wishlist()
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $wishlist = DB::table('wishlist')
        ->select('product.ProductName', 'wishlist.ProductId', 'product.ProductImage', 'Price')
        ->join('product','product.ProductId','=','wishlist.ProductId')
        ->where('UserId', Session::get('CustomerId'))->get();
        
        return view('client.wishlist')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('wishlist', $wishlist);
    }

    public function add_product_to_wishlist(Request $request)
    {
        $CustomerId = Session::get('CustomerId');
        $check_product_in_wishlist = DB::table('wishlist')
        ->where('ProductId', $request->ProductId)
        ->where('UserId', $CustomerId)->first();
        if(!$check_product_in_wishlist)
        {
            $data = array();
            $data['ProductId'] = $request->ProductId;
            $data['UserId'] = $CustomerId;
            DB::table('wishlist')->insert($data);
            echo 1;
        }
        else{
            echo 0;
        }
    }

    public function remove_product_from_wishlist(Request $request)
    {
        DB::table('wishlist')
        ->Where('ProductId', $request->ProductId)
        ->Where('UserId', Session::get('CustomerId'))
        ->delete();
    }
}
