<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class OrderController extends Controller
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

    public function confirm_order()
    {
        $this->auth_login();
        return view('admin.confirm_order');
    }

    public function all_order()
    {
        $this->auth_login();
        $all_order = DB::table('order')
        ->join('customer','customer.CustomerId','=','order.CustomerId')
        ->select('order.*', 'customer.FullName')
        ->orderby('order.OrderId', 'desc')->get();
        $manager_order = view('admin.all_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.all_order', $manager_order);
    }
    public function update_order(Request $request, $OrderId)
    {
        $this->auth_login();
        $data = array();
        $data['OrderId'] = $request->OrderId;
        $data['Status'] = $request->Status;
        $data['OrderDateCompleted'] = $request->OrderDateCompleted;
        

        DB::table('order')->where('OrderId', $OrderId)->update($data);
        Session::put('message', 'Cập nhật đơn hàng thành công');
        return Redirect::to('all_order');
    }
    public function order_detail()
    {
        $this->auth_login();

        // // biến chứa dữ liệu  $all_product đc gán cho all_product'
        return view('admin.order_detail');
    }

    
}
