<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $product_category_list = DB::table('category')->orderby('CategoryId', 'desc')->where('Status', 1)->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->where('Status', 1)->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->where('Status', 1)->get();
        $all_blog = DB::table('blog')->orderby('BlogId', 'desc')->limit(3)->get();
        $slider_list = DB::table('bannerslider')
        ->select('bannerslider.*','blog.*' )
        ->join('blog', 'blog.BlogId', '=', 'bannerslider.BlogId')
        ->where('SliderStatus', '=', 1)
        ->orderby('CreatedAt', 'desc')
        ->limit(8)->get();
        $latestnew = DB::table('blog')
        ->select('bannerslider.*','blog.*' )
        ->join('bannerslider', 'blog.BlogId', '=', 'bannerslider.BlogId')
        ->orderby('DateCreate', 'desc')->limit(3)->get();
        
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $top_product = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, ProductImage, product.ProductId, product.StartsAt, product.Quantity, product.Cost, product.Price, product.Discount'))
        ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
        ->join('order','order.OrderId','=','orderdetail.OrderId')
        ->where('OrderStatus', '<>','Đã hủy')
        ->whereDate('OrderDate','>=', $dau_thangtruoc)
        ->whereDate('OrderDate','<=', $now)
        ->groupBy('ProductName') 
        ->groupBy('ProductImage')
        ->groupBy('product.ProductId')
        ->groupBy('product.StartsAt')
        ->groupBy('product.Quantity')
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->groupBy('product.Discount')
        ->orderBy('number_solded','desc')->limit(4)->get();

        $new_product = DB::table('product')
        ->select('bannerslider.*','product.*','Category.*' )
        ->join('Category', 'product.CategoryId', '=', 'Category.CategoryId')
        ->join('bannerslider', 'product.SliderId', '=', 'bannerslider.SliderId')
        ->orderby('product.CreatedAt', 'desc')
        ->limit(2)->get();

        $all_product = DB::table('product')->where('status', 1)->get();
        $giam_gia_soc = DB::table('product')
        ->select(DB::raw('avg(Rating) as number_rating, ProductName, ProductImage, product.ProductId, product.StartsAt, product.Quantity, product.Cost, product.Price, product.Discount, View'))
        ->join('productrating','productrating.ProductId','=','product.ProductId')
        ->where('status', 1)->where('Discount', '<>', '0')->orderby('Discount', 'desc')
        ->groupBy('ProductName') 
        ->groupBy('ProductImage')
        ->groupBy('product.ProductId')
        ->groupBy('product.StartsAt')
        ->groupBy('product.Quantity')
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->groupBy('product.Discount')
        ->groupBy('product.View')
        ->limit(6)
        ->get();

        $PC_product = DB::table('product')
        ->where('status', 1)
        ->where('CategoryId','=', 'PC000')
        ->orderby('CreatedAt', 'desc')->limit(12)->get();

        $LT_product = DB::table('product')
        ->where('status', 1)
        ->where('CategoryId','=', 'LT000')
        ->orderby('CreatedAt', 'desc')->limit(12)->get();

        $PK_product = DB::table('product')
        ->where('status', 1)
        ->where('CategoryId','=', 'PK000')
        ->orderby('CreatedAt', 'desc')->limit(12)->get();
        $top_view = DB::table('product')->where('status', 1)->orderby('View', 'desc')->limit(4)->get();
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
        ->with('giam_gia_soc', $giam_gia_soc)
        ->with('PC_product', $PC_product)
        ->with('LT_product', $LT_product)
        ->with('PK_product', $PK_product);
        
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
            //return Redirect::to($request->request->get('http_referrer'));
            //return back(back());
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
        return back();
        //return Redirect::to('home');
    }

    public function search_result(Request $request)
    {
        $key = $request->kw_submit;

        $product_category_list = DB::table('category')->orderby('CategoryId', 'desc')->where('status', 1)->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->where('status', 1)->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->where('status', 1)->get();
        
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
    
    public function customer_register(Request $request)
    {
        $data = array();
        $data['Email'] = $request->Email;
        $data['Password'] = $request->Password;
        $data['FirstName'] = $request->FirstName;
        $data['LastName'] = $request->LastName;
        $data['Admin'] = 0;
        $UserId = DB::table('user')->insertGetId($data);

        Session::put('CustomerFirstName', $request->FirstName);
        Session::put('CustomerLastName', $request->LastName);
        Session::put('CustomerImage', $request->UserImage);
        Session::put('CustomerId', $UserId);
        return Redirect::to('home');
    }
}
