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
    public function update_order(Request $request, $OrderId)
    {
        $this->auth_login();
        $data = array();
        $data['OrderId'] = $request->OrderId;
        $data['OrderStatusId'] = $request->Status;
        $data['DateUpdate'] = date("Y-m-d H:i:s");
        

        DB::table('order')->where('OrderId', $OrderId)->update($data);
        Session::put('message', 'Cập nhật đơn hàng thành công');
        return Redirect::to('all_order');
    }
    public function order_detail($OrderId)
    {
        $this->auth_login();
        
        $order_list = DB::table('orderdetail')
        ->join('product','product.ProductId','=','orderdetail.ProductId')
        ->select('orderdetail.*','product.*')
        ->orderby('orderdetail.OrderId', 'desc')->get();
        $order_detail = DB::table('order')
        ->join('user','user.UserId','=','order.UserId')
        ->select('order.*', 'user.*')
        ->where('order.OrderId', $OrderId)->get();
        $default_shipping_address = DB::table('shippingaddress')
        ->select('ShippingAddressId', 'ReceiverName', 'Phone', 'Address', 'devvn_quanhuyen.name as quanhuyen', 'devvn_tinhthanhpho.name as tinhthanhpho','devvn_xaphuongthitran.name as xaphuongthitran')
        ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'shippingaddress.maqh')
        ->join('devvn_tinhthanhpho', 'devvn_tinhthanhpho.matp', '=', 'shippingaddress.matp')
        ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'shippingaddress.xaid')
        ->join('user','user.UserId','=','shippingaddress.UserId')
        ->where('isDefault', 1)->first();
        $manager_order = view('admin.order_detail')
        ->with('order_list',$order_list)
        ->with('order_detail', $order_detail)
        ->with('default_shipping_address', $default_shipping_address);
        return view('admin_layout')->with('admin.order_detail', $manager_order);
        
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
        $data = array();
        // Thêm thông tin đơn hàng
        $CustomerId = Session::get('CustomerId');
        $data['UserId'] = $CustomerId;
        $data['OrderStatus'] = 'Đã tiếp nhận đơn hàng';
        $data['OrderDate'] = date("Y-m-d H:i:s");
        $data['Total']= Cart::total(0, ',', '');
        $data['PaymentMethod'] = 'COD';
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
        Cart::destroy();
        $this->send_order_mail($OrderId);
        return redirect()->action(
            [OrderDetailController::class, 'index'], ['OrderId' => $OrderId]
        );
    }

    public function send_order_mail($OrderId)
    {
        $to_name = "ITGoShop";
        $to_mail = "itgoshop863@gmail.com"; // Gửi đến email nào? 
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
        Mail::send('mail.order_mail', $data, function($message) use ($to_name, $to_mail){
            $message->to($to_mail)->subject('ITGoShop đã nhận được đơn hàng của bạn');
            $message->from($to_mail, $to_name);
        });
    }
}
