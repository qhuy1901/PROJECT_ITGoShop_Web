<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class GallaryController extends Controller
{
    public function view_product_gallary($ProductId)
    {
        $product_gallary = DB::table('productgallary')
        ->select('Admin', 'GallaryImage', 'GallaryId','CreatedAt', 'GallaryStatus', 'GallaryImage')
        ->join('user','user.UserId','=','productgallary.UserId')
        ->where('ProductId', '=', $ProductId)
        ->orderby('Admin','DESC')->get();

        return View('admin.product.view-product-gallary')
        ->with('product_gallary', $product_gallary)
        ->with('ProductId', $ProductId);
    }

    public function add_product_gallary(Request $request, $ProductId)
    {
        $get_image = $request->file('ProductGallary');
        if($get_image == true)
        {
            foreach($get_image as $image)
            {
                $image_name = date("Y_m_d_His").'_'.$image->getClientOriginalName(); //$get_image_name.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); 
                $image->move('public/images_upload/product-gallary', $image_name);
                $data['GallaryImage'] = $image_name;
                $data['ProductId'] = $ProductId;
                $data['UserId'] = Session::get('UserId');
                $data['GallaryStatus'] = 1;
                DB::table('productgallary')->insert($data);
            }
        }
        Session::put('message', 'Thêm ảnh thành công');
        return redirect()->back();
    }

    public function active_product_gallary(Request $request)
    {
        DB::table('productgallary')->where('GallaryId', $request->GallaryId)->update(['GallaryStatus'=>1]); 
    }

    public function unactive_product_gallary(Request $request)
    {
        DB::table('productgallary')->where('GallaryId', $request->GallaryId)->update(['GallaryStatus'=>0]); 
    }

    public function delete_product_gallary(Request $request)
    {
        DB::table('productgallary')->where('GallaryId', $request->GallaryId)->delete();
    }
}
