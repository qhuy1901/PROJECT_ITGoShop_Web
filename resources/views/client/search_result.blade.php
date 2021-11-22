@extends('client_layout')
@section('client_content')
<main class="ps-main">
    <div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="product-detail.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a>Kết quả tìm kiếm</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
      <div class="ps-products-wrap pb-80">
                              <div class="col-12" data-mh="product-listing" >
                                <div class="ps-product__columns">
                                @foreach($search_product as $key => $product)
                                  <div class="ps-product__column">
                                    <div class="single-product">
                                      <div class="product-img" style="width: 250px; height: 200px;">
                                            <a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
                                              <img class="default-img"   src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
                                              <img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
                                            </a>
                                            <div class="button-head">
                                              <div class="product-action">
                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>So sánh</span></a>
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
                                <div class="ps-product-action">
                                  <div class="ps-pagination">
                                    <ul class="pagination">
                                      <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                      <li class="active"><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              
                          </div> 

@endsection