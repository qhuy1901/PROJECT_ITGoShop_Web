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
        // Cái này để load layout thôi
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();

        $email = $request->email;
        $password = $request->password;

        $result = DB::table('user')->where('email', $email)->where('password', $password)->where('Admin', 0)->first();
        if($result == true)
        {
            // Session::put('CustomerFirstName', $result->FirstName);
            // Session::put('CustomerLastName', $result->LastName);
            // Session::put('CustomerImage', $result->UserImage);
            Session::put('CustomerId', $result->UserId);
            return view('client.checkout')
            ->with('sub_brand_list',  $sub_brand_list )
            ->with('main_brand_list', $main_brand_list)
            ->with('product_category_list', $product_category_list);
        } 
        else{
            Session::put('message', 'Mật khẩu hoặc tài khoản sai. Xin nhập lại!');
            return Redirect::to('/login-to-checkout');
        }
    }

    public function checkout()
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();
        

        return view('client.checkout')
            ->with('sub_brand_list',  $sub_brand_list )
            ->with('main_brand_list', $main_brand_list)
            ->with('product_category_list', $product_category_list);
            
    }


    public function login_to_checkout()
    {
        return View('client.login-to-checkout');
    }

    // public function show_shipping_address()
    // {
    //     $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
    //     $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
    //     $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();
    //     $all_tinhthanhpho = DB::table('devvn_tinhthanhpho')->get();
    //     return View('client.shipping-address')
    //     ->with('sub_brand_list',  $sub_brand_list )
    //         ->with('main_brand_list', $main_brand_list)
    //         ->with('product_category_list', $product_category_list)
    //         ->with('all_tinhthanhpho', $all_tinhthanhpho);
    // }
}
