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

        // // biến chứa dữ liệu  $all_product đc gán cho all_product'
        return view('admin.all_order');
    }

    public function order_status()
    {
        $this->auth_login();

        // // biến chứa dữ liệu  $all_product đc gán cho all_product'
        return view('admin.order_status');
    }

    
}
