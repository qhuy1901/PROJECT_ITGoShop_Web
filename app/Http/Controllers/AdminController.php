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
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('tbl_admin')->where('email', $email)->where('password', $password)->first();
        if($result == true)
        {
            Session::put('firstName', $result->firstName);
            Session::put('lastName', $result->lastName);
            Session::put('id', $result->id);
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
        Session::put('firstName', null);
        Session::put('lastName', null);
        Session::put('id', null);
        return Redirect::to('admin');
    }
}
