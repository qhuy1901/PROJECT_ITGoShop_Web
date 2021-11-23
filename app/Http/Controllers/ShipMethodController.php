<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ShipMethodController extends Controller
{
    public function add_shipmethod()
    {
        return View('admin.ship.add-shipmethod');
    }

    public function save_shipmethod(Request $request)
    {
        $data = array();
        $data['ShipMethodName'] = $request->ShipMethodName;
        $data['ShipFee'] = $request->ShipFee;
        $data['EstimatedDeliveryTime'] = $request->EstimatedDeliveryTime;
        $data['Status'] = $request->Status;
        $data['CreatedAt'] = date("Y-m-d H:i:s");
        DB::table('shipmethod')->insert($data);

        Session::put('message', 'Thêm phương thức vận chuyển thành công');
        return Redirect::to('add-shipmethod');
    }

    public function view_shipmethod()
    {
        $all_shipmethod = DB::table('shipmethod')->get();
        return View('admin.ship.view-shipmethod')
        ->with('all_shipmethod', $all_shipmethod);
    }

    public function active_shipmethod(Request $request)
    {
        DB::table('shipmethod')->where('ShipMethodId', $request->ShipMethodId)->update(['Status'=>1]); 
    }

    public function unactive_shipmethod(Request $request)
    {
        DB::table('shipmethod')->where('ShipMethodId', $request->ShipMethodId)->update(['Status'=>0]); 
    }

    public function delete_shipmethod(Request $request)
    {
        DB::table('shipmethod')->where('ShipMethodId', $request->ShipMethodId)->delete();
    }
}
