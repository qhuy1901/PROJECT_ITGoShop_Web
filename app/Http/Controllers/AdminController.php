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
        $user_id = Session::get('user_id');
        if($user_id)
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
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->auth_login(); // Hàm kiểm tra có admin_id hay không
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('user')->where('email', $email)->where('password', $password)->first();
        if($result == true)
        {
            Session::put('first_name', $result->first_name);
            Session::put('last_name', $result->last_name);
            Session::put('user_image', $result->user_image);
            Session::put('user_id', $result->user_id);
            return Redirect::to('/dashboard');
        } 
        else{
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai. Xin nhập lại!');
            return Redirect::to('/admin');
        }
        //return view('admin.dashboard');
        
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
    }

    public function logout()
    {
        Session::put('first_name', null);
        Session::put('last_name', null);
        Session::put('user_id', null);
        return Redirect::to('admin');
    }
}
