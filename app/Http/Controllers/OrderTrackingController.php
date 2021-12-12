<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class OrderTrackingController extends Controller
{
    public function show_order_tracking($OrderId)
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();

        $order_info = DB::table('order')->where('OrderId', '=', $OrderId)->first();
        
        $order_detail = DB::table('orderdetail')
        ->select('product.ProductId', 'ProductName', 'ProductImage', 'OrderQuantity', 'UnitPrice')
        ->join('product', 'product.ProductId', '=', 'orderdetail.ProductId')
        ->where('OrderId', '=', $OrderId)->get();

        return View('client.order-tracking')
        ->with('product_category_list',$product_category_list)
        ->with('sub_brand_list',$sub_brand_list)
        ->with('main_brand_list',$main_brand_list)
        ->with('order_detail', $order_detail)
        ->with('order_info', $order_info);
    }

    public function load_order_tracking(Request $request)
    {
        $order_tracking = DB::table('ordertracking')->where('OrderId', $request->OrderId)->orderBy('CreatedAt', 'desc')->get();
        $output = '<table class="track_tbl">
                        <tbody>';
        foreach($order_tracking as $key => $item)
        { 
            $output .= '
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>
                                        <b>'.$item->OrderStatus.'</b><br>
                                        '.date("h:i:s d-m-Y", strtotime($item->CreatedAt)).'
                                    </td>
                                </tr>';
        }
        $output .= '</tbody>
        </table>';
        echo $output;                         
    }

    public function load_order_status(Request $request)
    {
        //$order_info = DB::table('order')->where('OrderId', $request->OrderId)->first();
        $order_tracking = DB::table('ordertracking')->where('OrderId', $request->OrderId)->orderBy('CreatedAt', 'desc')->first();
        echo '<b style="font-size:18px; color:red">'.$order_tracking->OrderStatus.'</b>';
    }
}
