<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
use Gloudemans\Shoppingcart\Facades\Cart; // chú ý: cái này cài từ https://packagist.org/packages/bumbummen99/shoppingcart
session_start();

class CheckoutController extends Controller
{
    public function checkout_after_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('user')->where('email', $email)->where('password', $password)->where('Admin', 0)->first();
        if($result == true)
        {
            Session::put('CustomerId', $result->UserId);
            return Redirect::to('/checkout');
        } 
        else{
            Session::put('message', 'Mật khẩu hoặc tài khoản sai. Xin nhập lại!');
            return Redirect::to('/login-to-checkout');
        }
    }

    public function checkout()
    {
        $CustomerId = Session::get('CustomerId');
        if($CustomerId)
        {
            // Cái này để load layout thôi
            $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
            $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
            $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
            $all_tinhthanhpho = DB::table('devvn_tinhthanhpho')->get();
            $default_shipping_address = DB::table('shippingaddress')
            ->select('ShippingAddressId', 'ReceiverName', 'Phone', 'ExtraShippingFee', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
            ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
            ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
            ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
            ->where('UserId', $CustomerId)->where('isDefault', 1)->first();
            $shipping_address_list = DB::table('shippingaddress')
            ->select('ShippingAddressId', 'ReceiverName', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
            ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
            ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
            ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
            ->where('UserId', $CustomerId)->where('isDefault', 0)->first();
            $shipmethod_list= DB::table('shipmethod')->where('Status', 1)->get();
    
            return view('client.checkout')
                ->with('sub_brand_list',  $sub_brand_list )
                ->with('main_brand_list', $main_brand_list)
                ->with('product_category_list', $product_category_list)
                ->with('all_tinhthanhpho', $all_tinhthanhpho)
                ->with('default_shipping_address', $default_shipping_address)
                ->with('shipping_address_list', $shipping_address_list)
                ->with('shipmethod_list', $shipmethod_list);
                
        }
        return Redirect::to('/login-to-checkout');
    }


    public function login_to_checkout()
    {
        return View('client.login-to-checkout');
    }
}
