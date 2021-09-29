<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ProductCategory extends Controller
{
    public function add_product_category()
    {
        return view('admin.add_product_category');
    }

    public function all_product_category()
    {
        // // Lấy hết dữ liệu trong bảng product_category
        $all_product_category = DB::table('ProductCategory')->get();
        $manager_product_category = view('admin.all_product_category')->with('all_product_category', $all_product_category);
        // // biến chứa dữ liệu  $all_product_category đc gán cho all_product_category'
        return view('admin_layout')->with('admin.all_product_category', $manager_product_category);
    }

    public function save_product_category(Request $request)
    {
        $data = array();
        $data['product_category_name'] = $request->product_category_name;
        $data['description'] = $request->description;
        $data['status'] = $request->status;

        DB::table('ProductCategory')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-product-category');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }

    public function active_product_category($product_category_id)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('ProductCategory')->where('id', $product_category_id)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');

    }

    public function unactive_product_category($product_category_id)
    {
        DB::table('ProductCategory')->where('id', $product_category_id)->update(['status'=>0]); 
        Session::put('message','Ẩn danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');
    }

    public function get_product_category_info($product_category_id)
    {
        // // Lấy hết dữ liệu trong bảng product_category
        $update_product_category = DB::table('ProductCategory')->where('id',$product_category_id)->get();  // first: lấy dòng đầu tiên
        $manager_product_category = view('admin.update_product_category')->with('update_product_category', $update_product_category);
        // // biến chứa dữ liệu  $all_product_category đc gán cho all_product_category'
        return view('admin_layout')->with('admin.update_product_category', $manager_product_category);
    }

    public function update_product_category(Request $request, $product_category_id)
    {
        $data = array();
        $data['product_category_name'] = $request->product_category_name;
        $data['description'] = $request->description;

        DB::table('ProductCategory')->where('id', $product_category_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');
    }

    public function delete_product_category($product_category_id)
    {
        DB::table('ProductCategory')->where('id', $product_category_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');
    }
}
