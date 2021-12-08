<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class RatingController extends Controller
{
    public function add_rating(Request $request)
    {
        $data = array();
        $data['Rating'] = $request->Rating;
        $data['Title'] = $request->Title;
        $data['Content'] = $request->Content;
        $data['ProductId'] = $request->ProductId;
        $data['UserId'] = Session::get('CustomerId');
        DB::table('productrating')->insert($data);
    }

    public function is_rating_exit(Request $request)
    {
        $productId = $request->ProductId;
        $userId = Session::get('CustomerId');
        $info = DB::table('productrating')->where('UserId', $userId)->where('ProductId', $productId)->First();
        if($info)
            echo 1;
        else
            echo 0;
    }
}
