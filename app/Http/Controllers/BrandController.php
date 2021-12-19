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
    
    public function view_brand()
    {
        $all_brand = DB::table('brand')
        ->select('BrandId', 'CategoryName', 'BrandName', 'brand.Status', 'BrandLogo','brand.Description')
        ->join('category','brand.CategoryId','=','category.CategoryId')->get();

        $all_category = DB::table('category')->get();

        return view('admin.brand.view-brand')
        ->with('all_category', $all_category)
        ->with('all_brand', $all_brand);
    }

    public function update_brand($BrandId)
    {
        $brand_info = DB::table('brand')->where('BrandId',$BrandId)->first();

        $all_category = DB::table('category')->get();

        return view('admin.brand.update-brand')
        ->with('brand_info', $brand_info)
        ->with('all_category', $all_category);
    }
    public function add_brand()
    {
        $this->auth_login();
        $brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $all_category = DB::table('category')->get();
        return view('admin.brand.add_brand')
        ->with('all_category', $all_category)
        ->with('brand_list', $brand_list);
    }

    public function save_brand(Request $request)
    {
        $data = array();
        $data['BrandName'] = $request->BrandName;
        $data['Description'] = $request->Description;
        $data['Status'] = $request->Status;
        $data['CategoryId'] = $request->CategoryId;
        $get_image = $request->file('BrandImage');
        if($get_image == true)
        {
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); //$get_image_name.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move('public/images_upload/brand', $image_name);
            $data['BrandLogo'] = $image_name;
            DB::table('brand')->insert($data);
            return Redirect::to('view-brand');
        }
        $data['BrandLogo'] = '';
        DB::table('brand')->insert($data);
        return Redirect::to('view-brand');
    }

    public function save_update_brand(Request $request, $BrandId)
    {
        $data = array();
        $data['BrandName'] = $request->BrandName;
        $data['Description'] = $request->Description;
        $data['Status'] = $request->Status;
        $data['CategoryId'] = $request->CategoryId;
        $get_image = $request->file('BrandImage');
        if($get_image == true)
        {
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); 
            $get_image->move('public/images_upload/brand', $image_name);
            $data['BrandLogo'] = $image_name;
        }
        DB::table('brand')->where('BrandId', $BrandId)->update($data);
        return Redirect::to('view-brand');
    }

    public function active_brand(Request $request)
    {
        DB::table('brand')->where('BrandId', $request->BrandId)->update(['Status'=>1]); 
    }

    public function unactive_brand(Request $request)
    {
        DB::table('brand')->where('BrandId', $request->BrandId)->update(['Status'=>0]);
    }
    public function delete_brand(Request $request)
    {
        DB::table('brand')->where('BrandId', $request->BrandId)->delete();
    }

    //++++++++++++++++++++++++++++++++++++++++++++++

    public function active_subbrand($SubBrandId)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('subbrand')->where('id', $SubBrandId)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị thương hiệu thành công');
        return Redirect::to('view-subbrand');

    }

    public function unactive_subbrand($SubBrandId)
    {
        DB::table('subbrand')->where('SubBrandId', $SubBrandId)->update(['status'=>0]); 
        Session::put('message','Ẩn danh mục sản phẩm thành công');
        return Redirect::to('view-subbrand');
    }

    public function delete_subbrand($SubBrandId)
    {
        DB::table('subbrand')->where('id', $SubBrandId)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('view-subbrand');
    }

    public function save_subbrand(Request $request)
    {
        $data = array();
        $data['SubBrandId'] = $request->SubBrandId;
        $data['SubBrandName'] = $request->SubBrandName;
        $data['BrandId'] = $request->BrandId;

        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu nhánh thành công');
        return Redirect::to('add-subbrand');
    }

    public function add_subbrand()
    {
        $this->auth_login();
        $brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        return view('admin.add_subbrand')
        ->with('brand_list', $brand_list);
    }

    public function view_subbrand()
    {
        // // Lấy hết dữ liệu trong bảng subbrand
        $all_subbrand = DB::table('subbrand')
        ->join('brand','brand.BrandId','=','subbrand.BrandId')->get();
        $manager_subbrand = view('admin.view_subbrand')->with('all_subbrand', $all_subbrand);
        return view('admin_layout')->with('admin.view_subbrand', $manager_subbrand);
    }
}
