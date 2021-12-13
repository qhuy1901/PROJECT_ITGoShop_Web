<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; 

class RatingController extends Controller
{
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
