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
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $all_blog = DB::table('blog')->orderby('BlogId', 'desc')->limit(3)->get();
        $slider_list = DB::table('bannerslider')
        ->select('bannerslider.*','blog.*' )
        ->join('blog', 'blog.BlogId', '=', 'bannerslider.BlogId')
        ->where('SliderStatus', '=', 1)
        ->orderby('CreatedAt', 'desc')
        ->limit(8)->get();

        $list_campaign = DB::table('campaign')->limit(1)->get();


        $latestnew = DB::table('blog')
        ->select('bannerslider.*','blog.*' )
        ->join('bannerslider', 'blog.BlogId', '=', 'bannerslider.BlogId')
        ->orderby('DateCreate', 'asc')->limit(2)->get();
        
        $top_product = DB::table('product')->where('status', 1)->orderby('Sold', 'desc')->limit(3)->get();

        $new_product = DB::table('product')
        ->select('bannerslider.*','product.*','Category.*' )
        ->join('Category', 'product.CategoryId', '=', 'Category.CategoryId')
        ->join('bannerslider', 'product.SliderId', '=', 'bannerslider.SliderId')
        ->orderby('product.CreatedAt', 'desc')
        ->limit(2)->get();

        $all_product = DB::table('product')->where('status', 1)->orderby('Discount', 'desc')->limit(8)->get();
        $top_view = DB::table('product')->where('status', 1)->orderby('View', 'desc')->limit(3)->get();
        return view('client.home')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('all_product', $all_product)
        ->with('top_product', $top_product)
        ->with('all_blog', $all_blog)
        ->with('slider_list', $slider_list)
        ->with('latestnew', $latestnew)
        ->with('top_view', $top_view)
        ->with('new_product', $new_product)
        ->with('list_campaign', $list_campaign);
    }

    public function check_password(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('user')->where('email', $email)->where('password', $password)->where('Admin', 0)->first();
        if($result == true)
        {
            Session::put('CustomerFirstName', $result->FirstName);
            Session::put('CustomerLastName', $result->LastName);
            Session::put('CustomerImage', $result->UserImage);
            Session::put('CustomerId', $result->UserId);

            $data = array();
            $data['UserId'] = $result->UserId;
            $data['LoginTime'] = date("H:i:s");
            DB::table('loginhistory')->insert($data);
            return Redirect::to('/home');
        } 
        else{
            Session::put('message', 'Mật khẩu hoặc tài khoản sai. Xin nhập lại!');
            return Redirect::to('/login');
        }
    }

    public function login(Request $request)
    {
        return view('customer-login');
    }

    public function logout()
    {
        Session::put('CustomerId', null);
        return Redirect::to('home');
    }

    public function search_result(Request $request)
    {
        $key = $request->kw_submit;

        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();

        $search_product = DB::table('product')
        ->where('ProductName','like','%'.$key.'%')
        ->where('Status', 1)
        ->get();
        $search_blog = DB::table('blog')
        ->where('Title','like','%'.$key.'%')
        ->where('Status', 1)
        ->get();

        return view('client.search_result')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('search_product', $search_product)
        ->with('search_blog', $search_blog);


    }
    
}
