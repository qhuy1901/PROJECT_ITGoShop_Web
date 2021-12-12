<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Session;
use App\Http\Requests; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();
use PDF;

class OrderController extends Controller
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

    public function all_order()
    {
        $this->auth_login();
        $all_order = DB::table('order')
        ->join('user','user.UserId','=','order.UserId')
        ->select('order.*', 'user.*')
        ->orderby('order.OrderId', 'desc')->get();
        $manager_order = view('admin.all_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.all_order', $manager_order);
    }
    
    public function update_order_status(Request $request)
    {
        $os = $request->OrderStatus;
        $OrderId = Session::get('OrderId');
        $data = array();
        $data['OrderStatus'] = $request->OrderStatus;
        $data['PaymentStatus'] = $request->PaymentStatus;
        $data['DateUpdate'] = date("Y-m-d H:i:s"); 
        DB::table('order')->where('OrderId', $request->OrderId)->update($data);
        // if($os == "Giao hàng thành công")
        // {
        //     $this->send_complete_mail($OrderId);
        // }
    }

    public function send_complete_mail($OrderId)
    {
        $to_name = "Hồng Cúc";
        $to_mail = "cuclth2701@gmail.com"; // Gửi đến email nào? 
        $OrderInfo = DB::table('order')
        ->select('FirstName','LastName', 'OrderId', 'OrderDate', 'Description', 'ShippingAddressId', 'Total')
        ->join('user', 'user.UserId', '=', 'order.UserId')
        ->where('OrderId', '=', $OrderId)->first();

        $ShippingAddress = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'ShippingAddressType', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->where('ShippingAddressId', '=', $OrderInfo->ShippingAddressId)->first();

        $data = array("OrderInfo" => $OrderInfo, "ShippingAddress" => $ShippingAddress);
        Mail::send('mail.complete_order_mail', $data, function($message) use ($to_name, $to_mail){
            $message->to($to_mail)->subject('ITGoShop - Đơn hàng đã giao thành công');
            $message->from($to_mail, $to_name);
        });
    }
    /*Trang Client */
    public function show_my_orders()
    {
        $CustomerId = Session::get('CustomerId');
        if($CustomerId)
        {
            $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
            $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
            $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
            $order_list =  DB::table('order')->orderby('OrderId', 'desc')->where('UserId', '=' , $CustomerId)->get();

            return view('client.my-orders')
            ->with('sub_brand_list',  $sub_brand_list )
            ->with('main_brand_list', $main_brand_list)
            ->with('product_category_list', $product_category_list)
            ->with('order_list', $order_list);
        }
        return Redirect::to('/login');
    }

    public function create_order(Request $request)
    {
        $content = Cart::content();
        // Lấy thông tin vận chuyển
        $shipmethod = DB::table('shipmethod')->where('ShipMethodId', $request->vanchuyen)->first();
        
        $data = array();
        // Thêm thông tin đơn hàng
        $CustomerId = Session::get('CustomerId');
        $data['UserId'] = $CustomerId;
        $data['OrderStatus'] = 'Đặt hàng thành công';
        //$data['OrderDate'] = date("Y-m-d H:i:s");
        $data['EstimatedDeliveryTime'] =  date('Y-m-d H:00:00', strtotime("+$shipmethod->EstimatedDeliveryTime hours"));
        $data['ShipMethod'] =  $shipmethod->ShipMethodName;
        $data['ShipFee'] =  $shipmethod->ShipFee + $request->ExtraShippingFee;
        $data['Total']= Cart::total(0, ',', '') + $shipmethod->ShipFee + $request->ExtraShippingFee;
        $data['PaymentMethod'] = $request->payment;
        $data['PaymentStatus'] = 'Chờ thanh toán';
        $data['ShippingAddressId'] = $request->ShippingAddressId;
        $OrderId = DB::table('order')->insertGetId($data);
        
        // Thêm chi tiết đơn hàng
        foreach($content as $order_detail)
        {
            $item = array();
            $item['OrderId'] = $OrderId;
            $item['ProductId'] = $order_detail->id;
            $item['OrderQuantity'] = $order_detail->qty;
            $item['UnitPrice'] = $order_detail->price;
            DB::table('orderdetail')->insert($item);

            //Update thông tin doanh thu lên bảng statistic
            $today = date('Y-m-d');
            $statistic_info = DB::table('statistic')->where('StatisticDate', $today)->first();
            $product_info = DB::table('product')->where('ProductId', $order_detail->id)->first();
            if($statistic_info)
            {
                $statistic_new_data = array();
                $statistic_new_data['Sales'] = $statistic_info->Sales + $product_info->Price * $order_detail->qty;
                $statistic_new_data['Profit'] = $statistic_info->Profit + ($product_info->Price - $product_info->Cost) * $order_detail->qty;
                DB::table('statistic')->where('StatisticDate', $today)->update($statistic_new_data);
            }
            else
            {
                $statistic_data = array();
                $statistic_data['Sales'] = $product_info->Price * $order_detail->qty;
                $statistic_data['Profit'] = ($product_info->Price - $product_info->Cost) * $order_detail->qty;
                DB::table('statistic')->insert($statistic_data);
            }

            // Trừ số lượng tồn kho
            $update_product = DB::table('product')->where('ProductId', $order_detail->id)->first();
            $update_product_data = array();
            $update_product_data['Quantity'] = $update_product->Quantity - $order_detail->qty;
            $update_product_data['Sold'] = $update_product->Sold + $order_detail->qty;
            DB::table('product')->where('ProductId', $order_detail->id)->update($update_product_data);
        }

        // Cập nhật mô tả hóa đơn
        $firstProductName = DB::table('orderdetail')
        ->select('ProductName')
        ->join('product', 'product.ProductId', '=', 'orderdetail.ProductId')
        ->where('OrderId', '=', $OrderId)->First();
        $numberProduct = DB::table('orderdetail')->where('OrderId', '=', $OrderId)->count() - 1;
        if($numberProduct < 1)
        {
            $data['Description'] = $firstProductName->ProductName;
        }
        else
        {
            $data['Description'] = $firstProductName->ProductName.' và '.$numberProduct.' sản phẩm khác';
        }
        
        DB::table('order')->where('OrderId', '=', $OrderId)->update($data);

        $tracking_data = array();
        $tracking_data['OrderId'] = $OrderId;
        $tracking_data['OrderStatus'] = "Đặt hàng thành công";
        DB::table('ordertracking')->insert($tracking_data);

        Cart::destroy();
        $this->send_order_mail($OrderId,$CustomerId);
        return redirect()->action(
            [OrderDetailController::class, 'index'], ['OrderId' => $OrderId]
        );
        // echo $OrderId;
    }

    public function send_order_mail($OrderId, $CustomerId)
    {
        $info = DB::table('user')->where('UserId','=', $CustomerId)->first();
        $to_name = $info->FirstName;
        $to_mail = 'itgoshop863@gmail.com'; // Gửi đến email nào? 
        $OrderInfo = DB::table('order')
        ->select('FirstName','LastName', 'OrderId', 'OrderDate', 'Description', 'ShippingAddressId', 'Total', 'ShipFee', 'EstimatedDeliveryTime', 'ShipMethod')
        ->join('user', 'user.UserId', '=', 'order.UserId')
        ->where('OrderId', '=', $OrderId)->first();

        $ShippingAddress = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'ShippingAddressType', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->where('ShippingAddressId', '=', $OrderInfo->ShippingAddressId)->first();

        $data = array("OrderInfo" => $OrderInfo, "ShippingAddress" => $ShippingAddress);
        Mail::send('mail.order_mail', $data, function($message) use ($to_name, $to_mail){
            $message->to($to_mail)->subject('ITGoShop đã nhận được đơn hàng của bạn');
            $message->from($to_mail, $to_name);
        });
    }

    public function cancel_order(Request $request)
    {
        DB::table('order')->where('OrderId', $request->OrderId)->update(['OrderStatus'=>'Đã hủy']); 
        $this_order = DB::table('orderdetail')->where('OrderId', $request->OrderId)->get();
        foreach($this_order as $item)
        {
            $update_product = DB::table('product')->where('ProductId', $item->ProductId)->first();
            $update_product_data = array();
            $update_product_data['Quantity'] = $update_product->Quantity + $item->OrderQuantity;
            $update_product_data['Sold'] = $update_product->Sold - $item->OrderQuantity;
            DB::table('product')->where('ProductId', $item->ProductId)->update($update_product_data);
        }
    }

    public function print_order($order_id)
    {
        $order_info = DB::table('order')
        ->join('user','user.UserId','=','order.UserId')
        ->where('OrderId', '=', $order_id)->first();
        $order_detail = DB::table('orderdetail')
        ->select('product.ProductId', 'ProductName', 'ProductImage', 'OrderQuantity', 'UnitPrice')
        ->join('product', 'product.ProductId', '=', 'orderdetail.ProductId')
        ->where('OrderId', '=', $order_id)->get();

        $default_shipping_address = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'ShippingAddressType', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->where('ShippingAddressId', '=', $order_info->ShippingAddressId)->first();

        return View('report.print-invoice2')
        ->with('order_detail',  $order_detail)
        ->with('order_info',  $order_info)
        ->with('default_shipping_address',  $default_shipping_address);;
        // $pdf = PDF::loadView('report.invoice-pdf');
        // return $pdf->stream('i.pdf');

        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($this->print_order_convert($order_id));
        // return $pdf->stream();
    }

    public function add_order_tracking(Request $request)
    {
        $data = array();
        $data['OrderId'] = $request->OrderId;
        $data['OrderStatus'] = $request->OrderStatus;
        DB::table('ordertracking')->insert($data);
    }
}
