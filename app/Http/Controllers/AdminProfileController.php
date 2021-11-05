<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class AdminProfileController extends Controller
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
    public function profile($UserId)
    {
        $this->auth_login();
        $profile_info = DB::table('user')->where('UserId',$UserId)->get();  // first: lấy dòng đầu tiên
        $manager_profile = view('admin.ad_profile')
        ->with('profile_info', $profile_info);
        return view('admin_layout')->with('admin.ad_profile', $manager_profile);

    }
    public function update_profile(Request $request, $UserId)
    {
        $this->auth_login();
        $data = array();
        $data['FirstName'] = $request->FirstName;
        $data['LastName'] = $request->LastName;
        $data['Mobile'] = $request->Mobile;
        $data['Email'] = $request->Email;
        $data['Password'] = $request->Password;
        $data['Intro'] = $request->Intro;

        $get_image = $request->file('UserImage');
        if($get_image == true)
        {
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); 
            $get_image->move('public/images_upload/user', $image_name);
            $data['UserImage'] = $image_name;
        }

        DB::table('user')->where('UserId', $UserId)->update($data);
        Session::put('message', 'Cập nhật profile thành công');
        return Redirect::to('ad_profile');
    }
}
