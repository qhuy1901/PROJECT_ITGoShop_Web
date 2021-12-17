@extends('client_layout')
@section('title', 'ITGoShop - Hệ thống Máy tính và Phụ kiện')
@section('client_content')
<main class="ps-main">
      <section class="blog-single section " style="display: flex; flex-wrap: nowrap;">
                  <div class="col-md-12  col-12 " style="padding-right: 80px; padding-left: 65px">
                    <div class="main-sidebar" style="margin-top: 5px; margin-bottom: 20px; margin-left:17px; padding: 10px 40px; border: 1px solid #e3e7ef;">
                      <div class="info">
                        <!-- Single Widget -->
                          <div class="blog-detail" style="padding-bottom: 30px">
                            <img src="{{URL::to('public/images_upload/brand/'.$des_brand->BrandLogo)}}" style="float: left; width: 200px; height: 140;margin-right:15px;">
                              <h2 class="blog-title">{{$des_brand->BrandName}}</h2>
                              <p>
                                {{$des_brand->Description}}
                              </p>
                          </div>
                        </div>
                      </div>
                  </div>
          </div>
      </section>
      <div class="ps-products-wrap pr-80 pl-80 pb-80">
                              <div class="ps-products" data-mh="product-listing">
                              <div class="ps-product-action">
                                  <div class="ps-product__filter">
                                      <form>
                                          @csrf
                                          <select name="sort" id="sort" class ="form-control" style="font-size:12px;">
                                            <option value="{{Request::url()}}?sort_by=none" style="font-size:12px;">Sắp Xếp Theo</option>
                                            <option value="{{Request::url()}}?sort_by=tangdan" style="font-size:12px;">_Giá Tăng Dần_ </option>
                                            <option value="{{Request::url()}}?sort_by=giamdan" style="font-size:12px;">_Giá Giảm Dần_ </option>
                                            <option value="{{Request::url()}}?sort_by=az" style="font-size:12px;">_A - Z_ </option>
                                            <option value="{{Request::url()}}?sort_by=za" style="font-size:12px;">_Z - A_ </option>
                                          </select>
                                      </form>
                                  </div>
                                </div>
                                <div class="ps-product__columns">
                                @foreach($all_product as $key => $product)
                                  <div class="ps-product__column" style="width: 250px; height: 350px;">
                                    <div class="single-product">
                                      <div class="product-img" style="width: 250px; height: 200px;">
                                            <a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
                                              <img class="default-img"  style="margin: auto; width: 250px; height: 200px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
                                              <img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
                                            </a>
                                            <div class="button-head">
                                              <div class="product-action">
                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Lượt xem: {{$product->View}}</span></a>
                                                <a title="Wishlist" href="javascript:void(0)"><i class=" ti-heart "></i><span>Yêu thích</span></a>
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
                                          $SubBrandId = Session::get('SubBrandId');
                                    
                              ?>
                              <div class="ps-sidebar" data-mh="product-listing">
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h2 style="font-weight: bold;">Thương hiệu nhánh</h2>
                                  </div>
                                      @php
                                      $sbrand_id = [];
                                      $sbrand_arr = [];
                                      if(isset($_GET['subbrand'])){
                                        $sbrand_id = $_GET['subbrand'];
                                      }else{
                                        $sbrand_id = $SubBrandId.",";
                                      }
                                      $sbrand_arr = explode(",", $sbrand_id);
                                    @endphp
                                    <div class="ps-widget__content">
                                      <ul class="ps-list--checked">
                                        @foreach($subbrand as $key => $subbrand)
                                        <li>
                                          <label class="checkbox-inline" style="font-size: 14px;  "> 
                                            <input type="checkbox" 
                                            {{ in_array($subbrand->SubBrandId, $sbrand_arr)? 'checked' : '' }}
                                            class="form-control-checkbox subbrand-filter" data-filters="subbrand" value="{{$subbrand->SubBrandId}}" name="subbrand-filter" style="width: 20px; height: 20px; padding-right: 30px;">
                                            <span style="padding-left: 20px;  display: block;  position: relative; color: #313131;">{{$subbrand->SubBrandName}}</span>
                                          </label>
                                        </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </aside>
                                <aside class="ps-widget--sidebar ">
                                  <div class="ps-widget__header">
                                  <h2 for="amount" >Khoảng Giá</h2>
                                  </div>
                                  <form>  
                                    
                                    <div id="slider-range"></div>
                                    <input type="text" id="sotien" readonly style="border:0; color:#77ACF1; font-weight:bold; left:0; padding-top:10px; ">
                                    <input type="hidden" name="start_price" id="start_price" >
                                    <input type="hidden" name="end_price" id="end_price" >
                                    <div style="padding-top:10px; ">
                                        <input type="submit" name="filter_price" value="Lọc" class="btn btn-sm btn-default" >
                                    </div>     
                                  </form>
                                  
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
  <script type="text/javascript">
		$(document).ready(function(){
			$( "#slider-range" ).slider({
			range: true,
			min: {{$min_price_range}},
			max: {{$max_price_range}},
			step: 100000,
			values: [ {{$min_price}} , {{$max_price}} ],
			slide: function( event, ui ) {
				$( "#sotien" ).val( ui.values[ 0 ] + " đ - " + ui.values[ 1 ] + " đ");
				$( "#start_price" ).val( ui.values[ 0 ] );
				$( "#end_price" ).val( ui.values[ 1 ] );
			}
			});
			$( "#sotien" ).val( $( "#slider-range" ).slider( "values", 0 ) +
			" đ - " + $( "#slider-range" ).slider( "values", 1 ) + " đ");
		});

	</script>
@endsection