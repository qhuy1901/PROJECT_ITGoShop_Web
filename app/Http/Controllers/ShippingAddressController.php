<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ShippingAddressController extends Controller
{
    public function index()
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();
        $all_tinhthanhpho = DB::table('devvn_tinhthanhpho')->get();
        return View('client.shipping-address')
        ->with('sub_brand_list',  $sub_brand_list )
            ->with('main_brand_list', $main_brand_list)
            ->with('product_category_list', $product_category_list)
            ->with('all_tinhthanhpho', $all_tinhthanhpho);
    }

    // Hàm load dropdownbox quanhuyen trong form 'Thông tin địa chỉ giao hàng'
    public function load_quanhuyen_dropdownbox(Request $request)
    {
        $matp = $request->matp;
        $list_quanhuyen = DB::table('devvn_quanhuyen')->where('matp', $matp)->get();
        foreach($list_quanhuyen as $quanhuyen)
        {
            echo "<option value='$quanhuyen->maqh'>$quanhuyen->name</option>";
        }
    }

    // Hàm load dropdownbox xaphuongthitran trong form 'Thông tin địa chỉ giao hàng'
    public function load_xaphuongthitran_dropdownbox(Request $request)
    {
        $maqh= $request->maqh;
        $list_xaphuongthitran = DB::table('devvn_xaphuongthitran')->where('maqh', $maqh)->get();
        foreach($list_xaphuongthitran as $xaphuongthitran)
        {
            echo "<option>$xaphuongthitran->name</option>";
        }
    }
}