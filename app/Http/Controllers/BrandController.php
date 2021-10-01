<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class BrandController extends Controller
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

    public function add_brand()
    {
        $this->auth_login();
        return view('admin.add_brand');
    }

    public function all_brand()
    {
        // // Lấy hết dữ liệu trong bảng brand
        $all_brand = DB::table('brand')->get();
        $manager_brand = view('admin.view_brand')->with('view_brand', $all_brand);
        // // biến chứa dữ liệu  $all_brand đc gán cho all_brand'
        return view('admin_layout')->with('admin.view_brand', $manager_brand);
    }

    public function save_brand(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['description'] = $request->description;
        $data['status'] = $request->status;

        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('add-brand');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }

    public function active_brand($brand_id)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('brand')->where('id', $brand_id)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('view-brand');

    }

    public function unactive_brand($brand_id)
    {
        DB::table('ProductCategory')->where('brand_id', $brand_id)->update(['status'=>0]); 
        Session::put('message','Ẩn danh mục sản phẩm thành công');
        return Redirect::to('view-brand');
    }

    public function get_brand_info($brand_id)
    {
        // // Lấy hết dữ liệu trong bảng brand
        $update_brand = DB::table('brand')->where('id',$brand_id)->get();  // first: lấy dòng đầu tiên
        $manager_brand = view('admin.update_brand')->with('update_brand', $update_brand);
        // // biến chứa dữ liệu  $all_brand đc gán cho all_brand'
        return view('admin_layout')->with('admin.update_brand', $manager_brand);
    }

    public function update_brand(Request $request, $brand_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['description'] = $request->description;

        DB::table('brand')->where('id', $brand_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('view-brand');
    }

    public function delete_brand($brand_id)
    {
        DB::table('brand')->where('id', $brand_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-brand');
    }
}
