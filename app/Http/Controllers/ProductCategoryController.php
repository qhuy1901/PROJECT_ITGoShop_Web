<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ProductCategoryController extends Controller
{
    public function add_product_category()
    {
        return view('admin.add_product_category');
    }

    public function all_product_category()
    {
        // // Lấy hết dữ liệu trong bảng Category
        $all_product_category = DB::table('Category')->get();
        $manager_product_category = view('admin.all_product_category')->with('all_product_category', $all_product_category);
        // // biến chứa dữ liệu  $all_product_category đc gán cho all_product_category'
        return view('admin_layout')->with('admin.all_product_category', $manager_product_category);
    }

    public function save_product_category(Request $request)
    {
        $data = array();
        $data['CategoryName'] = $request->CategoryName;
        $data['description'] = $request->description;
        $data['status'] = $request->status;

        DB::table('Category')->insert($data);
        return Redirect::to('add-product-category');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }

    public function active_product_category($CategoryId)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('Category')->where('CategoryId', $CategoryId)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');

    }

    public function unactive_product_category($CategoryId)
    {
        DB::table('Category')->where('CategoryId', $CategoryId)->update(['status'=>0]); 
        Session::put('message','Ẩn danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');
    }

    public function get_product_category_info($CategoryId)
    {
        // // Lấy hết dữ liệu trong bảng Category
        $update_product_category = DB::table('Category')->where('CategoryId',$CategoryId)->get();  // first: lấy dòng đầu tiên
        $manager_product_category = view('admin.update_product_category')->with('update_product_category', $update_product_category);
        // // biến chứa dữ liệu  $all_product_category đc gán cho all_product_category'
        return view('admin_layout')->with('admin.update_product_category', $manager_product_category);
    }

    public function update_product_category(Request $request, $CategoryId)
    {
        $data = array();
        $data['CategoryName'] = $request->CategoryName;

        DB::table('Category')->where('CategoryId', $CategoryId)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');
    }

    public function delete_product_category($CategoryId)
    {
        DB::table('Category')->where('CategoryId', $CategoryId)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-product-category');
    }
}
