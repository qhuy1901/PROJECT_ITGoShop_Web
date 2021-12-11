<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class AdminController extends Controller
{
    public function auth_login() //Kiểm tra việc đăng nhập, không để user truy cập vô hệ thống bằng đường dẫn mà chưa đăng nhập
    {
        // Hàm kiểm tra có admin_id hay không
        $UserId = Session::get('UserId');
        if($UserId)
        {
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('admin')->send(); // Nếu chưa đăng nhập thì quay lại trang login
        }
    }

    public function index()
    {
        $UserId =  Session::get('UserId');
        if($UserId)
        {
            return Redirect::to('/dashboard');
        }
        return view('login');
    }

    public function show_dashboard()
    {
        $this->auth_login(); // Hàm kiểm tra có admin_id hay không
        $number_of_customer = DB::table('user')->where('Admin', 0)->count();
        $number_of_order = DB::table('order')->where('OrderStatus', '<>', 'Đã hủy')->count();
        $number_of_product = DB::table('product')->count();
        $inventory_list = DB::table('product')->orderBy('Sold','desc')->orderBy('StartsAt', 'asc')->limit(5)->get();

        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $top_product = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, ProductImage, product.ProductId, product.StartsAt, product.Quantity, product.Cost, product.Price'))
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
        ->orderBy('number_solded','desc')->limit(5)->get();

        $top_blog_view = DB::table('blog')
        ->orderBy('View','desc')->limit(5)->get();

        $top_product_view = DB::table('product')
        // ->whereDate('OrderDate','>=', $dau_thangtruoc)
        // ->whereDate('OrderDate','<=', $now)
        ->orderBy('View','desc')->limit(5)->get();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $this_month_revenue = DB::table('statistic')
        ->select(DB::raw('sum(Profit) as totalProfit'))
        ->whereDate('StatisticDate','>=', $dauthangnay)
        ->whereDate('StatisticDate','<=', $now)->first();

        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subday(365)->toDateString();

        $login_today = DB::table('loginhistory')
        ->whereDate('LoginDate','=', $now)->count();
        $login_thangnay = DB::table('loginhistory')
        ->whereDate('LoginDate','>=', $dauthangnay)
        ->whereDate('LoginDate','<=', $now)->count();
        $login_thangtruoc = DB::table('loginhistory')
        ->whereDate('LoginDate','>=', $dau_thangtruoc)
        ->whereDate('LoginDate','<=', $cuoi_thangtruoc)->count();
        $login_namnay = DB::table('loginhistory')
        ->whereDate('LoginDate','>=', $sub365days)
        ->whereDate('LoginDate','<=', $now)->count();

        $order_homnay = DB::table('order')
        ->whereDate('OrderDate', $now)->count();

        $all_comment = DB::table('comment')
        ->select('CommentId', 'CommentContent', 'comment.CreatedAt','ProductName','FirstName' ,'LastName', 'CommentStatus', 'comment.ProductId', 'Reply', 'ParentComment')
        ->join('product','product.ProductId','=','comment.ProductId')
        ->join('user','user.UserId','=','comment.UserId')
        ->where('ParentComment', NULL)
        ->orderBy('Reply', 'asc')
        ->orderBy('CommentId', 'desc')->get();
        
        return view('admin.dashboard')
        ->with('this_month_revenue', $this_month_revenue)
        ->with('number_of_customer', $number_of_customer)
        ->with('number_of_order', $number_of_order)
        ->with('number_of_product', $number_of_product)
        ->with('inventory_list',  $inventory_list)
        ->with('top_product',  $top_product)
        ->with('top_product_view',  $top_product_view)
        ->with('login_today',  $login_today)
        ->with('login_thangnay',  $login_thangnay)
        ->with('login_thangtruoc',  $login_thangtruoc)
        ->with('login_namnay',  $login_namnay)
        ->with('order_homnay',  $order_homnay)
        ->with('top_blog_view',  $top_blog_view)
        ->with('all_comment', $all_comment);
    }

    public function dashboard(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('user')->where('email', $email)->where('password', $password)->where('admin', 1)->first();
        if($result == true)
        {
            Session::put('FirstName', $result->FirstName); 
            Session::put('LastName', $result->LastName);
            Session::put('UserImage', $result->UserImage);
            Session::put('UserId', $result->UserId);
            $data = array();
            $data['UserId'] = $result->UserId;
            $data['LoginTime'] = date("H:i:s");
            DB::table('loginhistory')->insert($data);
            return Redirect::to('/dashboard'); 
        } 
        else{
            Session::put('message', 'Mật khẩu hoặc tài khoản sai. Xin nhập lại!');
            return Redirect::to('/admin');
        }
    }

    public function logout()
    {
        Session::put('FirstName', null);
        Session::put('LastName', null);
        Session::put('UserId', null);
        return Redirect::to('admin');
    }

    public function filter_by_date(Request $request)
    {
        $get = DB::table('statistic')
        ->whereDate('StatisticDate','>=', $request->tu_ngay)
        ->whereDate('StatisticDate','<=', $request->den_ngay)->get();

        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'period' => date("d-m-Y", strtotime($val->StatisticDate)),
                //'order' => $val->TotalOrder,
                'sales' => $val->Sales,
                'profit' => $val->Profit,
                //'quantity' => $val->TotalProductQuantity
            );
        }
        echo json_encode($chart_data);
    }

    public function load_default_chart(Request $request)
    {
        $sub14days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(14)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('statistic')
        ->whereDate('StatisticDate','>=', $sub14days)
        ->whereDate('StatisticDate','<=', $now)
        ->orderBy('StatisticDate', 'ASC')->get();
        
        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                    'period' => date("d-m-Y", strtotime($val->StatisticDate)),
                    //'order' => $val->TotalOrder,
                    'sales' => $val->Sales,
                    'profit' => $val->Profit,
                    //'quantity' => $val->TotalProductQuantity
                );
        }
        echo json_encode($chart_data);
    }

    public function load_pie_chart(Request $request)
    {
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('order')
        ->select(DB::raw('count(*) as number_order, OrderStatus'))
        ->whereDate('OrderDate','>=', $sub30days)
        ->whereDate('OrderDate','<=', $now)
        ->groupBy('OrderStatus')->get();

        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                    'label' => $val->OrderStatus,
                    'value' => $val->number_order
                );
        }
        echo json_encode($chart_data);
    }

    public function load_access_chart(Request $request)
    {
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('loginhistory')
        ->select(DB::raw('count(*) as number_access, LoginDate'))
        ->whereDate('LoginDate','>=', $sub7days)
        ->whereDate('LoginDate','<=', $now)
        ->groupBy('LoginDate')->get();

        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                    'period' => $val->LoginDate,
                    'number_access' => $val->number_access
                );
        }
        echo json_encode($chart_data);
    }

    public function filter_by_time_span(Request $request)
    {
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subday(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($request->time_span == '7ngay')
        {
            $get = DB::table('statistic')
            ->whereDate('StatisticDate','>=', $sub7days)
            ->whereDate('StatisticDate','<=', $now)
            ->orderBy('StatisticDate', 'ASC')->get();
        }
        else if($request->time_span == 'thangnay')
        {
            $get = DB::table('statistic')
            ->whereDate('StatisticDate','>=', $dauthangnay)
            ->whereDate('StatisticDate','<=', $now)
            ->orderBy('StatisticDate', 'ASC')->get();
        }
        else if($request->time_span == 'thangtruoc')
        {
            $get = DB::table('statistic')
            ->whereDate('StatisticDate','>=', $dau_thangtruoc)
            ->whereDate('StatisticDate','<=', $cuoi_thangtruoc)
            ->orderBy('StatisticDate', 'ASC')->get();
        }
        else
        {
            $get = DB::table('statistic')
            ->whereDate('StatisticDate','>=', $sub365days)
            ->whereDate('StatisticDate','<=', $now)
            ->orderBy('StatisticDate', 'ASC')->get();
        }
        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'period' => date("d-m-Y", strtotime($val->StatisticDate)),
                'order' => $val->TotalOrder,
                'sales' => $val->Sales,
                'profit' => $val->Profit,
                'quantity' => $val->TotalProductQuantity
            );
        }
        echo json_encode($chart_data);
    }
}
