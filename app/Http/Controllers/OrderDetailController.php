<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect; 
session_start();

class OrderDetailController extends Controller
{
    public function index($OrderId)
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $order_info = DB::table('order')->where('OrderId', '=', $OrderId)->first();
        $order_detail = DB::table('orderdetail')
        ->select('ProductName', 'ProductImage', 'OrderQuantity', 'UnitPrice')
        ->join('product', 'product.ProductId', '=', 'orderdetail.ProductId')
        ->where('OrderId', '=', $OrderId)->get();

        $shipping_address = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'ShippingAddressType', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->where('ShippingAddressId', '=', $order_info->ShippingAddressId)->first();

        return View('client.order-detail')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('order_detail',  $order_detail)
        ->with('order_info',  $order_info)
        ->with('shipping_address',  $shipping_address);
    }

}
