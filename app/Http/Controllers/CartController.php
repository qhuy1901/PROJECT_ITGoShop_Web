<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
use Gloudemans\Shoppingcart\Facades\Cart; // chú ý: cái này cài từ https://packagist.org/packages/bumbummen99/shoppingcart
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();

        //Cái này là của function
        $ProductId = $request->ProductId;
        $quantity = $request->quantity;
        $product_info = DB::table('product')->where('ProductId', $ProductId)->first();

        // $all_product = DB::table('product')
        // ->join('Category','Category.CategoryId','=','product.CategoryId')
        // ->join('brand','brand.BrandId','=','product.BrandId')
        // ->select('product.*', 'Category.CategoryName', 'brand.BrandName')
        // ->orderby('product.ProductId', 'desc')->get();
        // $manager_product = view('admin.view_product')->with('all_product', $all_product);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'

        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy(); // Hủy session

        $data['id'] = $product_info->ProductId;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->ProductName;
        $data['price'] = $product_info->Price;
        $data['weight'] = $product_info->Price;
        $data['options']['image'] = $product_info->ProductImage;
        Cart::add($data);
        //Cart::setTax(rowId, 12) // Set thuế cho từng sản phẩm, số 12 có thể là 1 biến
        Cart::setGlobalTax(10); // Set cho tất cả sản phẩm

        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();
        //


        return view('client.cart')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list);
    }

    public function remove_from_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function remove_item(Request $request)
    {
        $data = $request->all();
        Cart::update($data['id'], 0);
    //     $cart = Session::get('cart');

    //     if($cart == true)
    //     {
    //         foreach($cart as $key => $val)
    //         {
    //             if($val['id'] == $data['id'])
    //             {
    //                 unset($cart[$key]);
    //             }
    //         }

    //     }
    //     Session::put('cart', $cart);
    }
}
