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
        ->select('CommentId', 'CommentContent', 'comment.CreatedAt','ProductName','FirstName' ,'LastName', 'CommentStatus', 'comment.ProductId', 'Reply', 'ParentComment')
        ->join('product','product.ProductId','=','comment.ProductId')
        ->join('user','user.UserId','=','comment.UserId')
        ->where('ParentComment', NULL)
        ->orderBy('Reply', 'asc')
        ->orderBy('CommentId', 'desc')->get();

        return view('admin.comment.view-comment')
        ->with('all_comment', $all_comment);
    }

    public function load_all_comment(Request $request)
    {
        // Chú ý câu truy vấn này phải giống hàm view_comment() 
        $all_comment = DB::table('comment')
        ->select('CommentId', 'CommentContent', 'comment.CreatedAt','ProductName','FirstName' ,'LastName', 'CommentStatus', 'comment.ProductId', 'Reply', 'ParentComment')
        ->join('product','product.ProductId','=','comment.ProductId')
        ->join('user','user.UserId','=','comment.UserId')
        ->where('ParentComment', NULL)
        ->orderBy('Reply', 'asc')
        ->orderBy('CommentId', 'desc')->get();

        $output = '';
        foreach($all_comment as $key => $item)
        {
            $output .= '<tr>';
            $output .= '<td>'.date("d-m-Y", strtotime($item->CreatedAt)).'</td>';
            $output .= '<td>'.$item->CommentContent.'<input type="text" class="CommentId" value="'.$item->CommentId.'" hidden></td>';
            $output .= '<td>'.$item->LastName. ' ' .$item->FirstName.'</td>';
			$output .= '<td>'.$item->ProductName.'</td><td style="text-align:center;">';
            if($item->Reply == 1)
                $output .= '<input class="form-check-input reply-check-box" type="checkbox" value="" checked>';
			else
                $output .= '<input class="form-check-input reply-check-box" type="checkbox" value=""></td>';

            $output .= '<td>
                            <div class="form-button-action">
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Trả lời bình luận">
                                 <a href="javascript:void(0)" onclick="return window.open(\''.url("/product-detail/{$item->ProductId}").'\')" class="active" ui-toggle-class="">
                                 <i class="fa fa-reply" aria-hidden="true"></i></a>
                            </button>';
			if($item->CommentStatus == 1)
            {
                $output .= '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị bình luận">
								<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
							</button>	
							<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn bình luận" hidden>
								<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
							</button>';
            }  
			else	
            {
                $output .='<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị bình luận" hidden>
                                <span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
                            </button>	
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn bình luận">
                                <span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
                            </button>';
            }
                $output .= '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa bình luận">
                                <a href="javascript:void(0)" class="active" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </button>
						</div>
                    </td>
                </tr>';
        }
        echo $output;
    }
    public function active_comment(Request $request)
    {
        DB::table('comment')->where('CommentId', $request->CommentId)->update(['CommentStatus'=>1]); 
    }

    public function unactive_comment(Request $request)
    {
        DB::table('comment')->where('CommentId', $request->CommentId)->update(['CommentStatus'=>0]); 
    }

    public function reply_comment(Request $request)
    {
        DB::table('comment')->where('CommentId', $request->CommentId)->update(['Reply'=>$request->Reply]); 
    }
}