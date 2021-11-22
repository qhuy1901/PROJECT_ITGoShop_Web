<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ProfileController extends Controller
{
    
    public function profile($UserId)
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
        $default_shipping_address = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->join('user','user.UserId','=','shippingaddress.UserId')
        ->where('isDefault', 1)->first();

        $profile_detail = DB::table('user')
        ->select('user.*')
        ->where('user.UserId', $UserId)->get();

        return view('client.profile')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('default_shipping_address', $default_shipping_address)
        ->with('profile_detail', $profile_detail);


    }
}
