@extends('client_layout')
@section('title', 'Kết quả tìm kiếm - ITGoShop')
@section('client_content')
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a>Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a>Kết quả tìm kiếm</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	<?php 
		$number_result = count($search_product);
		$number_result1 = count($search_blog);
	?>		
  <div class="product-area section ">
    <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="product-info pb-80">
							<div class="nav-main pb-20" >
								<!-- Tab Nav -->
								<ul  class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab" Style="font-size: 20px">Sản Phẩm</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab" Style="font-size: 20px">Tin tức</a></li>									
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										@if($number_result == 0)
										<div class="box_search_null"><img src="{{URL::to('public/images_upload/Null.png')}}" alt="null"> <div class="font-primary font-bold text-2xl text-dark-gray mb-2">
											Không tìm thấy kết quả
										</div> <p class="text-gray-600">
											Thử kiểm tra lỗi chính tả của từ khóa đã nhập hoặc thử lại bằng từ khóa khác
										</p></div>
										@else
                   							@foreach($search_product as $key => $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img" style="width: 250px; height: 200px;">
														<a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
															<img class="default-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
															<img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Lượt xem: {{$product->View}}</span></a>
																<a title="Wishlist" href="javascript:void(0)"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<input type="text" class="ProductId" value="{{$product->ProductId}}" hidden>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" class="add-to-cart-a-tag" href="javascript:void(0)">Thêm vào giỏ hàng</a>
																<input type="text" value="{{$product->ProductId}}" hidden>
																<input type="hidden" class="Quantity" value="{{$product->Quantity}}">
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
										@endif
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="women" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										@if($number_result1 == 0)
										<div class="box_search_null"><img src="{{URL::to('public/images_upload/Null.png')}}" alt="null"> <div class="font-primary font-bold text-2xl text-dark-gray mb-2">
											Không tìm thấy kết quả
										</div> <p class="text-gray-600">
											Thử kiểm tra lỗi chính tả của từ khóa đã nhập hoặc thử lại bằng từ khóa khác
										</p></div>
										@else
										@foreach($search_blog as $key => $blog)
                                      {{csrf_field()}}
                                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12  " style="height: 400px; width: 570px">
                                        <div class="ps-post">
                                          <div class="ps-post__thumbnail"><a class="ps-post__overlay" ></a><img src="{{URL::to('public/images_upload/blog/'.$blog->Image)}}" alt=""></div>
                                          <div class="ps-post__content"><a class="ps-post__title" href="{{URL::to('/blog-detail/'.$blog->BlogId)}}">{{$blog->Title}}</a>
                                            <p class="ps-post__meta"><span>By:<a class="mr-5">{{$blog->Author}}</a></span>-<span class="ml-3">{{$blog->DatePost}}</span></p>
                                            <p>{{$blog->Summary}}</p><a class="ps-morelink" href="{{URL::to('/blog-detail/'.$blog->BlogId)}}">Đọc tiếp<i class="fa fa-long-arrow-right"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                      @endforeach
									  @endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
      </div>
  </div>
<style>
.box_search_null {
    text-align: center;
    max-width: 440px;
    color: #414956;
    font-size: 16px;
    margin: 0 auto 70px;
}
.box_search_null img {
    display: block;
    margin: 0 auto;
}
.text-dark-gray {
    --text-opacity: 1;
    color: #0e0e0e;
    color: rgba(14,14,14,var(--text-opacity));
}
.text-2xl {
    font-size: 1.5rem;
}
.font-bold {
    font-weight: 700;
}
.font-primary {
    font-family: SF_Pro_Display,system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,"Noto Sans","Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
}
.mb-2 {
    margin-bottom: 0.5rem;
}
.text-gray-600 {
    --text-opacity: 1;
    color: #414956;
    color: rgba(65,73,86,var(--text-opacity));
}
</style>  
        <!-- Modal end -->
@endsection