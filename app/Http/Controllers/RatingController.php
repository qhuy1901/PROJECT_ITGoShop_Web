<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; 

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
    
    public function view_rating()
    {
        $all_rating = DB::table('productrating')
        ->select('FirstName', 'LastName', 'ProductName', 'productrating.Content', 'productrating.ProductId', 'productrating.UserId', 'ProductRatingStatus', 'productrating.CreatedAt', 'Title', 'Rating')
        ->join('product','product.ProductId','=','productrating.ProductId')
        ->join('user','user.UserId','=','productrating.UserId')
        ->get();
        return View('admin.rating.view-rating')
        ->with('all_rating', $all_rating);
    }

    public function active_rating(Request $request)
    {
        DB::table('productrating')
        ->where('UserId', $request->UserId)
        ->where('ProductId', $request->ProductId)
        ->update(['ProductRatingStatus'=>1]); 
    } 

    public function unactive_rating(Request $request)
    {
        DB::table('productrating')
        ->where('UserId', $request->UserId)
        ->where('ProductId', $request->ProductId)
        ->update(['ProductRatingStatus'=>0]); 
    }

    public function delete_rating(Request $request)
    {
        DB::table('productrating')
        ->where('UserId', $request->UserId)
        ->where('ProductId', $request->ProductId)
        ->delete();
    }
}
