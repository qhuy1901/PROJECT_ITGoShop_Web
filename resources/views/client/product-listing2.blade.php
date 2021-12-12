@extends('client_layout')
@section('client_content')
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a>Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active">
              <a>
                {{$des_cate->CategoryName}}
              </a>
            </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<main class="ps-main">
      <div class="ps-products-wrap pr-80 pl-80 pt-80 pb-80">
                              <div class="ps-products" data-mh="product-listing">
                                <div class="ps-product-action">
                                  <div class="ps-product__filter">
                                      <form>
                                          @csrf
                                          <select name="sort" id="sort" class ="form-control" style="font-size:12px;">
                                            <option value="{{Request::url()}}?sort_by=none" style="font-size:12px;">Sắp Xếp Theo</option>
                                            <option value="{{Request::url()}}?sort_by=tangdan" style="font-size:12px;">-Giá Tăng Dần- </option>
                                            <option value="{{Request::url()}}?sort_by=giamdan" style="font-size:12px;">-Giá Giảm Dần- </option>
                                            <option value="{{Request::url()}}?sort_by=az" style="font-size:12px;">-A - Z- </option>
                                            <option value="{{Request::url()}}?sort_by=za" style="font-size:12px;">-Z - A- </option>
                                          </select>
                                      </form>
                                  </div>
                                </div>
                                <div class="ps-product__columns">
                                  @foreach($all_product as $key => $product)
                                  <div class="ps-product__column" style="width: 250px; height: 300px;">
                                    <div class="single-product">
                                      <div class="product-img" style="width: 250px; height: 200px;">
                                            <a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
                                              <img class="default-img" style="margin: auto; width: 250px; height: 200px; width: auto; height: auto; "  src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
                                              <img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
                                            </a>
                                            <div class="button-head">
                                              <div class="product-action">
                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Lượt xem: {{$product->View}}</span></a>
                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
                                              </div>
                                              <div class="product-action-2">
                                                <a title="Add to cart" class="add-to-cart-a-tag" href="javascript:void(0)">Thêm vào giỏ hàng</a>
                                                <input type="text" value="{{$product->ProductId}}" hidden>
                                              </div>
                                            </div>
                                      </div>
                                      <div class="product-content">
                                            <h3><a href="{{URL::to('/product-detail/'.$product->ProductId)}}">{{$product->ProductName}}</a></h3>
                                            <div class="product-price">
                                              <span>{{number_format($product->Price * ((100- $product->Discount)/100)).' '.'₫'}}</span>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                                </div>
                                {{ $all_product->links() }}
                              </div>
                              <?php   
                                          $BrandId = Session::get('BrandId');
                                    
                              ?>
                              <div class="ps-sidebar" data-mh="product-listing">
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h2 style="font-weight: bold;">Thương hiệu</h2>
                                  </div>
                                  @php
                                      $brand_id = [];
                                      $brand_arr = [];
                                      if(isset($_GET['brand'])){
                                        $brand_id = $_GET['brand'];
                                      }else{
                                        $brand_id = $BrandId.",";
                                      }
                                      $brand_arr = explode(",", $brand_id);
                                    @endphp
                                    <div class="ps-widget__content">
                                      <ul class="ps-list--checked">
                                        @foreach($brand as $key => $brand)
                                        <li>
                                          <label class="checkbox-inline" style="font-size: 14px;  "> 
                                            <input type="checkbox" 
                                            {{ in_array($brand->BrandId, $brand_arr)? 'checked' : '' }}
                                            class="form-control-checkbox brand-filter" data-filters="brand" value="{{$brand->BrandId}}" name="brand-filter" style="width: 20px; height: 20px; padding-right: 30px;">
                                            <span style="padding-left: 20px;  display: block;  position: relative; color: #313131;">{{$brand->BrandName}}</span>
                                          </label>
                                        </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </aside>
                                
                                <!--<aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h2 style="font-weight: bold;">CPU</h2>
                                  </div>
                                  <div class="ps-widget__content">
                                    <ul class="ps-list--checked">
                                      <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                                      <li><a href="product-listing.html">Intel Dual Core</a></li>
                                      <li><a href="product-listing.html">Intel Core i3</a></li>
                                      <li><a href="product-listing.html">Intel Core i5</a></li>
                                      <li><a href="product-listing.html">Intel Core i7</a></li>
                                      <li><a href="product-listing.html">Intel Core i9</a></li>
                                      <li><a href="product-listing.html">Intel Xeon</a></li>
                                      <li><a href="product-listing.html">AMD Ryzen 3</a></li>
                                    </ul>
                                  </div>
                                </aside>
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h2 style="font-weight: bold;">RAM</h2>
                                  </div>
                                  <div class="ps-widget__content">
                                    <ul class="ps-list--checked">
                                      <li class="current"><a href="product-listing.html">Narrow</a></li>
                                      <li><a href="product-listing.html">4 Gb</a></li>
                                      <li><a href="product-listing.html">8 Gb</a></li>
                                      <li><a href="product-listing.html">12 Gb</a></li>
                                    </ul>
                                  </div>
                                </aside>
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h2 style="font-weight: bold;">Ổ cứng</h2>
                                  </div>
                                  <div class="ps-widget__content">
                                    <ul class="ps-list--checked">
                                      <li class="current"><a href="product-listing.html">Narrow</a></li>
                                      <li><a href="product-listing.html">SSD</a></li>
                                      <li><a href="product-listing.html">HDD</a></li>
                                    </ul>
                                  </div>
                                </aside>-->
                              </div>
                            </div>
                          </div> 

@endsection