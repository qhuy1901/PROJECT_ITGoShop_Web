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

    public function add_product()
    {
        $this->auth_login();
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();

        return view('admin.product.add-product')
        ->with('product_category_list', $product_category_list)
        ->with('brand_list', $brand_list)
        ->with('sub_brand_list', $sub_brand_list);
    }

    public function view_product()
    {
        $this->auth_login();
        $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->select('product.*', 'Category.CategoryName', 'brand.BrandName')
        ->orderby('product.ProductId', 'desc')->get();

        return view('admin.product.view-product')
        ->with('all_product', $all_product);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['ProductName'] = $request->ProductName;
        $data['CategoryId'] = $request->Category;
        $data['BrandId'] = $request->Brand;
        $data['SubBrandId'] = $request->Subbrand;
        $data['content'] = $request->Content;
        $data['Quantity'] = $request->Quantity;
        $data['price'] = $request->Price;
        $data['discount'] = $request->Discount;
        $data['status'] = $request->Status;
        $data['StartsAt'] = date("Y-m-d H:i:s");
        $data['CreatedAt'] = date("Y-m-d H:i:s");

        $get_image = $request->file('ProductImage');
        if($get_image == true)
        {
            //rand(0, 99)
            // $new_image_name là tên ảnh, getClientOriginalExtension() là lấy phần mở rộng của ảnh, .png,..
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); //$get_image_name.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move('public/images_upload/product', $image_name);
            $data['ProductImage'] = $image_name;
            DB::table('product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        
        $data['ProductImage'] = '';
        DB::table('product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }

    public function active_product(Request $request)
    {
        DB::table('product')->where('ProductId', $request->ProductId)->update(['Status'=>1]); 
    }

    public function unactive_product(Request $request)
    {
        DB::table('product')->where('ProductId', $request->ProductId)->update(['Status'=>0]); 
    }

    public function delete_product(Request $request)
    {
        DB::table('product')->where('ProductId', $request->ProductId)->delete();
    }

    public function get_product_info($ProductId)
    {
        //$this->auth_login();
        // Lấy hết thông tin trong bảng Category và barnd để load lên cbb
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();

        // // Lấy hết dữ liệu trong bảng product
        $product_info = DB::table('product')->where('ProductId',$ProductId)->get();  
        return View('admin.product.update-product')
        ->with('product_info', $product_info)
        ->with('product_category_list',$product_category_list)
        ->with('sub_brand_list',$sub_brand_list)
        ->with('brand_list',$brand_list);
    }

    public function update_product(Request $request, $ProductId)
    {
        //$this->auth_login();
        $data = array();
        $data['ProductName'] = $request->ProductName;
        $data['CategoryId'] = $request->Category;
        $data['BrandId'] = $request->Brand;
        $data['SubBrandId'] = $request->Subbrand;
        $data['content'] = $request->Content;
        $data['Quantity'] = $request->Quantity;
        $data['price'] = $request->Price;
        $data['Discount'] = $request->Discount;
        $data['status'] = $request->Status;
        $data['UpdatedAt'] = date("Y-m-d H:i:s");

        $get_image = $request->file('ProductImage');
        if($get_image == true)
        {
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); 
            $get_image->move('public/images_upload/product', $image_name);
            $data['ProductImage'] = $image_name;
        }

        DB::table('product')->where('ProductId', $ProductId)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('view-product');
    }
    // Kết thúc trang admin 

    /* ======================= Trang client =======================*/
    public function product_detail($ProductId)
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
        $product_detail = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->select('product.*', 'Category.CategoryName', 'brand.BrandName')
        ->where('product.ProductId', $ProductId)->get();

        foreach($product_detail as $key => $value)
        {
            $CategoryId = $value->CategoryId;
        }

        $related_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.CategoryName', 'brand.BrandName','subbrand.SubBrandName')
        ->where('product.CategoryId',$CategoryId)
        ->whereNotIn('product.ProductId', [$ProductId])->limit(4)->get();

        $product_gallary = DB::table('productgallary')
        ->select('Admin', 'GallaryImage', 'GallaryId','CreatedAt', 'GallaryStatus', 'GallaryImage')
        ->join('user','user.UserId','=','productgallary.UserId')
        ->where('ProductId', '=', $ProductId)
        ->where('Admin', '=', 1)
        ->where('GallaryStatus', '=', 1)->get(); // chỉ hiện thị ảnh Admin nhập

        return view('client.product-detail')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('product_detail', $product_detail)
        ->with('related_product',$related_product)
        ->with('product_gallary',$product_gallary);
    }

    public function load_comment(Request $request)
    {
        $comment = DB::table('comment')->where('ProductId', $request->ProductId)->get();
        foreach($comment as $key => $item)
        {
            
        }
        $output = '
            <div class="single-comment">
                <img src="https://via.placeholder.com/80x80" alt="#">
                <div class="content">
                    <h4>Alisa harm <span>At 8:59 pm On Feb 28, 2018</span></h4>
                    <p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee  Phosfluorescently leverage.</p>
                    <div class="button">
                        <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                    </div>
                </div>
            </div>';
        echo $output;
    }
}
