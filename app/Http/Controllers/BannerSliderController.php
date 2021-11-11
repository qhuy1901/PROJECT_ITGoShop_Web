<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; 
use App\Models\BannerSlider;
// session_start();

class BannerSliderController extends Controller
{
    public function view_banner_slider()
    {
        $all_slide = BannerSlider::orderBy('SliderId', 'DESC')->get();
        return View('admin.banner-slider.view-banner-slider')
        ->with('all_slide', $all_slide);
    }

    public function add_banner_slider()
    {
        return View('admin.banner-slider.add-banner-slider');
    }

    public function save_banner_slider(Request $request)
    {
        $data = $request->all();
        $slider = new BannerSlider();
        $slider-> SliderName = $data['Name'];
        $slider->SliderStatus= $data['Status'];
        $slider->CreatedAt = date("Y-m-d H:i:s");
        $slider->UpdatedAt = date("Y-m-d H:i:s");

        $get_image = $request->file('Image');
        if($get_image == true)
        {
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); 
            $get_image->move('public/images_upload/banner-slider', $image_name);
            $slider->SliderImage = $image_name;
            $slider->save();
            Session::put('message', 'Thêm banner slider thành công');
            return Redirect::to('add-banner-slider');
        }
        $slider->SliderImage = ' ';
        $slider->save();
        Session::put('message', 'Thêm banner slider thành công');
        return Redirect::to('add-banner-slider');
    }

    public function active_banner_slider(Request $request)
    {
        DB::table('bannerslider')->where('SliderId', $request->SliderId)->update(['SliderStatus'=>1]); 
    }

    public function unactive_banner_slider(Request $request)
    {
        DB::table('bannerslider')->where('SliderId', $request->SliderId)->update(['SliderStatus'=>0]); 
    }

    public function delete_banner_slider(Request $request)
    {
        DB::table('bannerslider')->where('SliderId', $request->SliderId)->delete();
    }
}
