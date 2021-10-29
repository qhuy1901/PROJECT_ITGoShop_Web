<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
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
        return view('login');
    }

    public function show_dashboard()
    {
        $this->auth_login(); // Hàm kiểm tra có admin_id hay không
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('user')->where('email', $email)->where('password', $password)->first();
        if($result == true)
        {
            Session::put('FirstName', $result->FirstName);
            Session::put('LastName', $result->LastName);
            Session::put('UserImage', $result->UserImage);
            Session::put('UserId', $result->UserId);
            return Redirect::to('/dashboard');
        } 
        else{
            Session::put('message', 'Mật khẩu hoặc tài khoản sai. Xin nhập lại!');
            return Redirect::to('/admin');
        }
        //return view('admin.dashboard');
        
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
    }

    public function logout()
    {
        Session::put('FirstName', null);
        Session::put('LastName', null);
        Session::put('UserId', null);
        return Redirect::to('admin');
    }
}
