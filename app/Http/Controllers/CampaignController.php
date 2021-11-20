<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class CampaignController extends Controller
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

    public function campaign($CampaignId)
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
        $list_campaign = DB::table('campaign')
        ->select('bannerslider.*', 'campaign.*','product.*')
        ->join('bannerslider','bannerslider.CampaignId','=','campaign.CampaignId')
        ->join('product','product.SliderId','=','bannerslider.SliderId')
        ->where('campaign.CampaignId', $CampaignId)->get();
        
        return view('client.campaign')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('list_campaign', $list_campaign)
        ->with('product_category_list', $product_category_list);
    }
    public function all_campaign()
    {
        $this->auth_login();
        $all_campaign = DB::table('campaign')
        ->select('bannerslider.*', 'campaign.*')
        ->join('bannerslider','bannerslider.CampaignId','=','campaign.CampaignId')->get();

        return view('admin.all_campaign')
        ->with('all_campaign', $all_campaign);
    }
    public function add_campaign()
    {
        $this->auth_login();

        return view('admin.add_campaign');
    }
    public function save_campaign(Request $request)
    {
        $data = array();
        $data['CampaignId'] = $request->CampaignId;
        $data['CampaignName'] = $request->CampaignName;
        $data['CampaignContent'] = $request->CampaignContent;
        $data['CampaignNote'] = $request->CampaignNote;
        $data['DateStart'] = $request->DateStart;
        $data['DateFinish'] = $request->DateFinish;
        $data['status'] = $request->Status;

        $get_image = $request->file('CampaignImage');
        if($get_image == true)
        {
            //rand(0, 99)
            // $new_image_name là tên ảnh, getClientOriginalExtension() là lấy phần mở rộng của ảnh, .png,..
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); //$get_image_name.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move('public/images_upload/campaign', $image_name);
            $data['CampaignImage'] = $image_name;
            DB::table('campaign')->insert($data);
            Session::put('message', 'Thêm campaign thành công');
            return Redirect::to('add_campaign');
        }
        
        $data['CampaignImage'] = '';
        DB::table('campaign')->insert($data);
        Session::put('message', 'Thêm campaign thành công');
        return Redirect::to('add_campaign');
    }
    
    
    public function active_campaign(Request $request)
    {
        DB::table('campaign')->where('CampaignId', $request->CampaignId)->update(['Status'=>1]); 
    }

    public function unactive_campaign(Request $request)
    {
        DB::table('campaign')->where('CampaignId', $request->CampaignId)->update(['Status'=>0]); 
    }

    public function delete_campaign(Request $request)
    {
        DB::table('campaign')->where('CampaignId', $request->CampaignId)->delete();
    }
}
