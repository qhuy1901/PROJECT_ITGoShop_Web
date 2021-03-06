<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
use Gloudemans\Shoppingcart\Facades\Cart; // chú ý: cái này cài từ https://packagist.org/packages/bumbummen99/shoppingcart
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        
        //Cái này là của function
        $ProductId = $request->ProductId;
        $quantity = $request->quantity;
        $product_info = DB::table('product')->where('ProductId', $ProductId)->first();

        // $all_product = DB::table('product')
        // ->join('Category','Category.CategoryId','=','product.CategoryId')
        // ->join('brand','brand.BrandId','=','product.BrandId')
        // ->select('product.*', 'Category.CategoryName', 'brand.BrandName')
        // ->orderby('product.ProductId', 'desc')->get();
        // $manager_product = view('admin.view_product')->with('all_product', $all_product);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'

        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy(); // Hủy session

        $data['id'] = $product_info->ProductId;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->ProductName;
        $data['price'] = $product_info->Price;
        $data['weight'] = $product_info->Price;
        $data['options']['image'] = $product_info->ProductImage;
        Cart::add($data);
        //Cart::setTax(rowId, 12) // Set thuế cho từng sản phẩm, số 12 có thể là 1 biến
        Cart::setGlobalTax(0); // Set cho tất cả sản phẩm

        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();

        return view('client.cart')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list);
    }

    public function remove_from_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function remove_item(Request $request)
    {
        $data = $request->all();
        Cart::update($data['id'], 0);
    }

    public function add_to_cart(Request $request)
    {
        $ProductId = $request->ProductId;
        $product_info = DB::table('product')->where('ProductId', $ProductId)->first();

        $data['id'] = $product_info->ProductId;
        $data['qty'] = 1;
        $data['name'] = $product_info->ProductName;
        $data['price'] = $product_info->Price;
        $data['weight'] = $product_info->Price;
        $data['options']['image'] = $product_info->ProductImage;
        Cart::add($data);
        //Cart::setTax(rowId, 12) // Set thuế cho từng sản phẩm, số 12 có thể là 1 biến
        Cart::setGlobalTax(0); 
    }

    public function update_quantity(Request $request)
    {
        $rowId = $request->rowId;
        $newQuantity = $request->newQuantity;
        Cart::update($rowId, $newQuantity); 
    }

    public function load_cart(Request $request)
    {
        $content = Cart::content();
		$number_product = Cart::count();
        $output = '';
        $output .='<div class="ps-cart__content">';
		if($number_product == 0)
        {
            $output .='<img style="display: block; width: auto; height: 150px; margin-left: auto; margin-right: auto; " src="'.url("/public/client/Images/empty-cart.png").'">
            <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>';
        }
		else{
            foreach($content as $item)
            {
                $image = $item->options->image; 
                $output .='<div class="ps-cart-item">
                <input type="hidden" class="item-id-for-cart" value="'.$item->rowId.'"/>
                <a class="ps-cart-item__close delete-button-in-nav" href="javascript:void(0)"></a>
                <div class="ps-cart-item__thumbnail">
                    <a href="'.url("/product-detail/".$item->id).'"></a><img src="'.url("public/images_upload/product/$image").'" alt="">
                </div>
                <div class="ps-cart-item__content">
                    <a class="ps-cart-item__title" href="'.url("/product-detail/".$item->id).'">'.$item->name.'</a>
                    <p>'.number_format($item->price, 0, " ", ".").' ₫ x'. $item->qty.'</p>
                </div>
            </div>';
            }
            //{{URL::to('/product-detail/'.$item->id)}}
            //{{URL::to('public/images_upload/product/'.$item->options->image)}}
            $output .= '</div>
            <div class="ps-cart__total">
            <p>Số sản phẩm:<span>'.$number_product.'</span></p>
            <p>Tổng tiền:<span>'.(Cart::total(0, ',', '.')).' ₫</span></p></div>
            <div class="ps-cart__footer">
            <a href="javascript:void(0)" class="ps-btn btn-thanh-toan">THANH TOÁN</a>';
        }
        echo $output;
    }

    public function load_cart_quantity()
    {
        echo Cart::count();
    }
}
