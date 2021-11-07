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
        $CustomerId = Session::get('CustomerId');
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();
        $all_tinhthanhpho = DB::table('devvn_tinhthanhpho')->get();
        $shipping_address_list = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'ShippingAddressType', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->where('UserId', $CustomerId)->where('isDefault', 0)->get();
        $default_shipping_address = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'ShippingAddressType', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->where('UserId', $CustomerId)->where('isDefault', 1)->first();

        return View('client.shipping-address')
            ->with('sub_brand_list',  $sub_brand_list )
            ->with('main_brand_list', $main_brand_list)
            ->with('product_category_list', $product_category_list)
            ->with('all_tinhthanhpho', $all_tinhthanhpho)
            ->with('shipping_address_list', $shipping_address_list)
            ->with('default_shipping_address', $default_shipping_address);
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

    public function add_shipping_address(Request $request)
    {
        $CustomerId = Session::get('CustomerId');
        DB::table('shippingaddress')->where('UserId', $CustomerId)->update(['IsDefault' => 0]);

        /*Phần thêm địa chỉ*/
        $data = array();
        
        // Địa chỉ
        $data['Address']= $request->diachi;
        $data['matp'] =  $request->tinhthanhpho;
        $data['maqh'] =  $request->quanhuyen;
        $data['xaid'] = $request->xaphuongthitran;

        // Các thông tin khác
        $data['ReceiverName'] = $request->ReceiverName;
        $data['Phone'] = $request->Phone;
        $data['UserId'] = $CustomerId;
        $data['ShippingAddressType'] = $request->ShippingAddressType;
        $data['IsDefault'] = 1;
        $data['UpdatedAt'] = date("Y-m-d H:i:s");
        $data['CreatedAt'] = date("Y-m-d H:i:s");
        DB::table('shippingaddress')->insert($data);

        return Redirect::to('/checkout');
    }

    public function delete_shipping_address(Request $request)
    {
        $CustomerId = Session::get('CustomerId');
        $ShippingAddressId = $request->ShippingAddressId;
        DB::table('shippingaddress')->where('ShippingAddressId', '=', $ShippingAddressId)->delete();
    }

    public function change_default_shipping_address($ShippingAddressId)
    {
        $ShippingAddress = DB::table('shippingaddress')->where('ShippingAddressId', $ShippingAddressId)->First();
        DB::table('shippingaddress')->where('UserId', $ShippingAddress->UserId)->update(['IsDefault' => 0]);
        DB::table('shippingaddress')->where('ShippingAddressId', $ShippingAddressId)->update(['IsDefault' => 1]);
        return Redirect::to('/checkout');
    }

    public function update_shipping_address(Request $request)
    {
        $data = array();
        $data['ReceiverName'] = $request->ReceiverName;
        $data['Phone'] = $request->Phone;
        $data['Address'] = $request->Address;
        $data['ShippingAddressType'] = $request->AddressType;
        DB::table('shippingaddress')->where('ShippingAddressId', '=', $request->ShippingAddressId)->update($data);
        return Redirect::to('/show-shipping-address');
    }
}