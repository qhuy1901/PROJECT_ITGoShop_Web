<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class CommentController extends Controller
{
    public function view_comment() 
    {
        $all_comment = DB::table('comment')
        ->select('CommentId', 'CommentContent', 'comment.CreatedAt','ProductName','FirstName' ,'LastName', 'CommentStatus')
        ->join('product','product.ProductId','=','comment.ProductId')
        ->join('user','user.UserId','=','comment.UserId')
        ->orderby('CommentId', 'desc')->get();

        return view('admin.comment.view-comment')
        ->with('all_comment', $all_comment);
    }
}