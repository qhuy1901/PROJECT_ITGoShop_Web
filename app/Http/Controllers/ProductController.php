<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ProductController extends Controller
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

    public function add_product()
    {
        $this->auth_login();
        $product_category_list = DB::table('product_category')->orderby('product_category_id', 'desc')->get();
        $brand_list = DB::table('brand')->orderby('brand_id', 'desc')->get();
        return view('admin.add_product')->with('product_category_list', $product_category_list)->with('brand_list', $brand_list);
    }

    public function view_product()
    {
        $this->auth_login();
        $all_product = DB::table('product')
        ->join('product_category','product_category.product_category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')
        ->select('product.*', 'product_category.product_category_name', 'brand.brand_name')
        ->orderby('product.product_id', 'desc')->get();
        $manager_product = view('admin.view_product')->with('all_product', $all_product);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'
        return view('admin_layout')->with('admin.view_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->brand;
        $data['content'] = $request->content;
        $data['quatity'] = $request->quatity;
        $data['price'] = $request->price;
        $data['discount'] = $request->discount;
        $data['status'] = $request->status;

        $get_image = $request->file('product_image');
        if($get_image == true)
        {
            //rand(0, 99)
            // $new_image_name là tên ảnh, getClientOriginalExtension() là lấy phần mở rộng của ảnh, .png,..
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); //$get_image_name.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move('public/images_upload/product', $image_name);
            $data['product_image'] = $image_name;
            DB::table('product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        
        $data['product_image'] = '';
        DB::table('product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }

    public function active_product($product_id)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('product')->where('product_id', $product_id)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị sản phâm thành công');
        return Redirect::to('view-product');

    }

    public function unactive_product($product_id)
    {
        DB::table('product')->where('product_id', $product_id)->update(['status'=>0]); 
        Session::put('message','Ẩn sản phâm thành công');
        return Redirect::to('view-product');
    }

    public function get_product_info($product_id)
    {
        $this->auth_login();
        // Lấy hết thông tin trong bảng product_category và barnd để load lên cbb
        $product_category_list = DB::table('product_category')->orderby('product_category_id', 'desc')->get();
        $brand_list = DB::table('brand')->orderby('brand_id', 'desc')->get();
        // Lấy hết dữ liệu trong bảng product
        $product_info = DB::table('product')->where('product_id',$product_id)->get();  // first: lấy dòng đầu tiên
        $manager_product = view('admin.update_product')
        ->with('product_info', $product_info)
        ->with('product_category_list',$product_category_list)
        ->with('brand_list',$brand_list);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'
        return view('admin_layout')->with('admin.update_product', $manager_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $this->auth_login();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->brand;
        $data['content'] = $request->content;
        $data['quatity'] = $request->quatity;
        $data['price'] = $request->price;
        $data['discount'] = $request->discount;
        $data['status'] = $request->status;

        $get_image = $request->file('product_image');
        if($get_image == true)
        {
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); 
            $get_image->move('public/images_upload/product', $image_name);
            $data['product_image'] = $image_name;
        }

        DB::table('product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('view-product');
    }

    public function delete_product($product_id)
    {
        DB::table('product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('view-product');
    }
    // Kết thúc trang admin 

    // Trang client
    public function product_detail($product_id)
    {
        $product_category_list = DB::table('product_category')->orderby('product_category_id', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('sub_brand', '!=' , 0)->orderby('brand_id', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('sub_brand', 0)->orderby('brand_id', 'desc')->get();

        $product_detail = DB::table('product')
        ->join('product_category','product_category.product_category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')
        ->select('product.*', 'product_category.product_category_name', 'brand.brand_name')
        ->where('product.product_id', $product_id)->get();

        foreach($product_detail as $key => $value)
        {
            $product_category_id = $value->category_id;
        }

        $related_product = DB::table('product')
        ->join('product_category','product_category.product_category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')
        ->select('product.*', 'product_category.product_category_name', 'brand.brand_name')
        ->where('product.category_id',$product_category_id)
        ->whereNotIn('product.product_id', [$product_id])->get();

        return view('client.product-detail')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('product_detail', $product_detail)
        ->with('related_product',$related_product);
    }
}
