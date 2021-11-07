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
            echo "<option value='$xaphuongthitran->xaid'>$xaphuongthitran->name</option>";
        }
    }

    public function add_first_shipping_address(Request $request)
    {
        /*Phần thêm địa chỉ*/
        $data = array();
        
        // Địa chỉ
        $diachi = $request->diachi;
        $tinhtp = (DB::table('devvn_tinhthanhpho')->select('name')->where('matp', $request->tinhthanhpho)->first())->name;
        $quanhuyen = (DB::table('devvn_quanhuyen')->select('name')->where('maqh', $request->quanhuyen)->first())->name;
        $xaphuongthitran = (DB::table('devvn_xaphuongthitran')->select('name')->where('xaid', $request->xaphuongthitran)->first())->name;
        $data['Address']  = $diachi . ", " . $xaphuongthitran . ", " . $quanhuyen . ", " . $tinhtp;

        // Các thông tin khác
        $data['ReceiverName'] = $request->ReceiverName;
        $data['Phone'] = $request->Phone;
        $CustomerId = Session::get('CustomerId');
        $data['UserId'] = $CustomerId;
        $data['ShippingAddressType'] = $request->ShippingAddressType;
        $data['IsDefault'] = 1;
        $data['UpdatedAt'] = date("Y-m-d H:i:s");
        $data['CreatedAt'] = date("Y-m-d H:i:s");
        DB::table('shippingaddress')->insert($data);

        /*Phần hiển thị giao diện*/
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();
        $CustomerId = Session::get('CustomerId');
        $shipping_address_list = DB::table('shippingaddress')->where('UserId', $CustomerId)->get();
        $all_tinhthanhpho = DB::table('devvn_tinhthanhpho')->get();

        return view('client.checkout')
            ->with('sub_brand_list',  $sub_brand_list )
            ->with('main_brand_list', $main_brand_list)
            ->with('product_category_list', $product_category_list)
            ->with('shipping_address_list',  $shipping_address_list)
            ->with('all_tinhthanhpho', $all_tinhthanhpho);
    }
}