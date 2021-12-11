<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ReportController extends Controller
{
    public function print_revenue_report($tu_ngay, $den_ngay)
    {
        $statistic_info = DB::table('statistic')
        ->whereDate('StatisticDate','>=', $tu_ngay)
        ->whereDate('StatisticDate','<=', $den_ngay)->get();

        return View('report.print-revenue-report')
        ->with('tu_ngay', $tu_ngay)
        ->with('den_ngay', $den_ngay)
        ->with('statistic_info', $statistic_info);
    }

    public function print_default_revenue_report()
    {
        $sub14days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(14)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $statistic_info = DB::table('statistic')
        ->whereDate('StatisticDate','>=', $sub14days)
        ->whereDate('StatisticDate','<=', $now)->get();

        return View('report.print-revenue-report')
        ->with('tu_ngay', $sub14days)
        ->with('den_ngay', $now)
        ->with('statistic_info', $statistic_info);
    }

    public function print_default_product_report()
    {
        $sub14days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(14)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $top_product = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, ProductImage, product.ProductId, product.StartsAt, product.Quantity, product.Cost, product.Price'))
        ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
        ->join('order','order.OrderId','=','orderdetail.OrderId')
        ->where('OrderStatus', '<>','Đã hủy')
        ->whereDate('OrderDate','>=', $sub14days)
        ->whereDate('OrderDate','<=', $now)
        ->groupBy('ProductName') 
        ->groupBy('ProductImage')
        ->groupBy('product.ProductId')
        ->groupBy('product.StartsAt')
        ->groupBy('product.Quantity')
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->orderBy('number_solded','desc')->get();

        $top5_product = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, product.Cost, product.Price'))
        ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
        ->join('order','order.OrderId','=','orderdetail.OrderId')
        ->where('OrderStatus', '<>','Đã hủy')
        ->whereDate('OrderDate','>=', $sub14days)
        ->whereDate('OrderDate','<=', $now)
        ->groupBy('ProductName') 
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->orderBy('number_solded','desc')->limit(5)->get();

        $sp_ko_ban_dc = DB::table('product')->whereNotIn('ProductId',
            DB::table('product')
            ->select(['product.ProductId'])
            ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
            ->join('order','order.OrderId','=','orderdetail.OrderId')
            ->whereDate('OrderDate','>=', $tu_ngay)
            ->whereDate('OrderDate','<=', $now))->get();

        return View('report.print-product-report')
        ->with('tu_ngay', $sub14days)
        ->with('den_ngay', $now)
        ->with('top_product', $top_product)
        ->with('top5_product', $top5_product)
        ->with('sp_ko_ban_dc', $sp_ko_ban_dc);
    }

    public function print_product_report($tu_ngay, $den_ngay)
    {
        $top_product = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, ProductImage, product.ProductId, product.StartsAt, product.Quantity, product.Cost, product.Price'))
        ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
        ->join('order','order.OrderId','=','orderdetail.OrderId')
        ->where('OrderStatus', '<>','Đã hủy')
        ->whereDate('OrderDate','>=', $tu_ngay)
        ->whereDate('OrderDate','<=', $den_ngay)
        ->groupBy('ProductName') 
        ->groupBy('ProductImage')
        ->groupBy('product.ProductId')
        ->groupBy('product.StartsAt')
        ->groupBy('product.Quantity')
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->orderBy('number_solded','desc')->get();

        $top5_product = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, product.Cost, product.Price'))
        ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
        ->join('order','order.OrderId','=','orderdetail.OrderId')
        ->where('OrderStatus', '<>','Đã hủy')
        ->whereDate('OrderDate','>=', $tu_ngay)
        ->whereDate('OrderDate','<=', $den_ngay)
        ->groupBy('ProductName') 
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->orderBy('number_solded','desc')->limit(5)->get();

        $sp_ko_ban_dc = DB::table('product')->whereNotIn('ProductId',
            DB::table('product')
            ->select(['product.ProductId'])
            ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
            ->join('order','order.OrderId','=','orderdetail.OrderId')
            ->whereDate('OrderDate','>=', $tu_ngay)
            ->whereDate('OrderDate','<=', $den_ngay))->get();

        return View('report.print-product-report')
        ->with('tu_ngay', $tu_ngay)
        ->with('den_ngay', $den_ngay)
        ->with('top_product', $top_product)
        ->with('top5_product', $top5_product)
        ->with('sp_ko_ban_dc', $sp_ko_ban_dc);
    }

    public function load_product_chart(Request $request)
    {
        if($request->tu_ngay || $request->den_ngay)
        {
            $tu_ngay = $request->tu_ngay;
            $den_ngay = $request->den_ngay;
        }
        else
        {
            $tu_ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(14)->toDateString();
            $den_ngay = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        }
        
        $get_limit = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, product.Cost, product.Price'))
        ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
        ->join('order','order.OrderId','=','orderdetail.OrderId')
        ->where('OrderStatus', '<>','Đã hủy')
        ->whereDate('OrderDate','>=', $tu_ngay)
        ->whereDate('OrderDate','<=', $den_ngay)
        ->groupBy('ProductName') 
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->orderBy('number_solded','desc')->limit(5)->get();
        
        $get = DB::table('product')
        ->select(DB::raw('sum(OrderQuantity) as number_solded, ProductName, product.Cost, product.Price'))
        ->join('orderdetail','orderdetail.ProductId','=','product.ProductId')
        ->join('order','order.OrderId','=','orderdetail.OrderId')
        ->where('OrderStatus', '<>','Đã hủy')
        ->whereDate('OrderDate','>=', $tu_ngay)
        ->whereDate('OrderDate','<=', $den_ngay)
        ->groupBy('ProductName') 
        ->groupBy('product.Cost')
        ->groupBy('product.Price')
        ->orderBy('number_solded','desc')->get();
        $total_revenue = 0;
        
        foreach($get as $key => $val)
        {
            $total_revenue += ($val->Price - $val->Cost) * $val->number_solded;
        }

        $revenue_san_phan_con_lai = $total_revenue;
        foreach($get_limit as $key => $val)
        {
            $chart_data[] = array(
                    'label' => $val->ProductName,
                    'value' =>  ($val->Price - $val->Cost) * $val->number_solded
                );
            $revenue_san_phan_con_lai -= ($val->Price - $val->Cost) * $val->number_solded;
        }

        $chart_data[] = array(
            'label' => "Sản phẩm khác",
            'value' =>  $revenue_san_phan_con_lai
        );
        echo json_encode($chart_data);
    }
}
