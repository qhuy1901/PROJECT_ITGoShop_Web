@extends('client_layout')
@section('title', 'ITGoShop - Hệ thống Máy tính và Phụ kiện')
@section('client_content')
	<!-- Slider Area -->
<section class="slider-area " style="height:400px">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
					<div class="slideshow-container" style="height:360px; box-shadow: 2px 2px 6px 0px rgb(0 0 0 / 10%); align-items: center;">
						@foreach($slider_list as $key => $slider)
						<div class="mySlides pt-45">
							<a href="{{URL::to('/blog-detail/'.$slider->BlogId)}}">
								<img src="{{URL::to('public/images_upload/banner-slider/'.$slider->SliderImage)}}" style="width:100%; border-radius:0">
							</a>
						</div>
						@endforeach
						<a class="prev" style="color: white;" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" style="color: white;"  onclick="plusSlides(1)">&#10095;</a>
						<div style="text-align:center; margin:10px">
						<?php for ($x = 1; $x <= count($slider_list); $x+=1){ ?>
							<span class="dot" onclick="currentSlide({{$x}})"></span> 
						<?php }?>
						</div>	
					</div>
			</div>
			<div class="col-lg-4" style="margin-top:50px;">
				@foreach($latestnew as $key => $new)
				<div class="card" style="margin-bottom:10px; border-radius:  10px 10px 0px 0px;background-color:#ccf2f4; border-left: 6px solid #A2D2FF; border-bottom: 6px solid #A2D2FF;">
					<div class="card-body">
						<a style="color:#333; font-size:17px;" href="{{URL::to('/blog-detail/'.$new->BlogId)}}"><b>{{$new->Title}}</b></a>
					</div>
				</div>
				@endforeach
				

				<div style="margin: 20px 0px;">
					<h3><a href="{{URL::to('/all_blog')}}" style="text-decoration:none;  "><b>Tất cả tin tức <i class="fa fa-angle-right" style="color:#A2D2FF;" aria-hidden="true"></i></b></a></h3>
				</div>
		
			</div>
		</div>
	</div>
		
</section>
<br> <br> <br>
<div class="product-area most-popular section " style="background-color: #F6FCFF">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title" style="margin-bottom: 0px;">
                    <h2 style="text-transform:none;">
					<img style="height:45px" src="{{URL::to('public/client/Images/fire.gif')}}" alt="">Giảm giá sốc
					<img style="height:45px" src="{{URL::to('public/client/Images/fire.gif')}}" alt=""></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background-color: white;border-radius: 30px">
                <div class="owl-carousel popular-slider">
					@foreach($giam_gia_soc as $key => $product)
                    <div class="single-product">
                        <div class="product-img" style="width: 250px; height: 200px;">
                            <a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
                                <img class="default-img" style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto;" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
                                <img class="hover-img" src="{{URL::to('/product-detail/'.$product->ProductId)}}" alt="">
                                <span class="out-of-stock">GIẢM {{$product->Discount}}%</span>
								<?php $so_ngay_da_moban = (strtotime(date("d-m-Y")) - strtotime(date("d-m-Y", strtotime($product->StartsAt))))/ 86400 ?>
								@if($so_ngay_da_moban < 14)
									<span class="new" style="right: 180px;">New</span>
								@endif 
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
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a style="text-decoration:none" href="{{URL::to('/product-detail/'.$product->ProductId)}}"><b style="font-size:17px">{{$product->ProductName}}</b></a></h3>
                            <?php $avg_rating = $product->number_rating?> 
							@if($avg_rating >= 1)
								<div class="star-wrapper" style="display: inline-block;">
								<p style="display:inline-block; font-size:10px; margin-left:10px">{{round($avg_rating, 1)}}</p>	
															@if($avg_rating > 4.5) <!-- 5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 4) <!-- 4.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star-half-o s1" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 3.5) <!-- 4 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 3) <!-- 3.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star-half-o s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 2.5) <!-- 3 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 2) <!-- 2.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star-half-o s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 1.5) <!-- 2 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 1) <!-- 1.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star-half-o s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@else <!-- 1 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@endif		
															
												</div>
							@endif
							<div class="product-price">
                                <span style="color:red; font-size:17px"><b>{{number_format($product->Price).' '.'₫'}}</b></span>
                                <br>
                                <span class="old">{{number_format($product->Price + ($product->Price * ($product->Discount)/100)).' '.'₫'}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- End Sản phẩm mới nhất -->
	<section class="small-banner section">
		<div class="container">
			<div class="row">
			
				<div class="product-area most-popular section">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="section-title">
									<h2 style="text-transform:none;">Thương hiệu nổi bật</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12" >
								<div class="owl-carousel popular-slider">
								@foreach($main_brand_list as $key => $brand)
									@if($brand->BrandName != "No Brand")
									<div class="single-banner tab-height">
										<div class="product-img" style="width: 200px; height: 150px; ">
											<a href="{{URL::to('/product-listing4/'.$brand->BrandName)}}">
												<img class="default-img" style="margin: auto; max-width: 200px; max-height: 150px; width: auto; height: auto; border-radius: 10px; " src="{{URL::to('public/images_upload/brand/'.$brand->BrandLogo)}}" alt="#">
												<img class="hover-img" src="{{URL::to('/product-listing4/'.$brand->BrandName)}}" alt="">
											</a>
											
										</div>
									</div>
									<!-- End Single Product -->
									@endif
								@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section> 
	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2 style="text-transform:none;">Dành cho bạn</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main" >
								<!-- Tab Nav -->
								<ul  class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Laptop</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">PC</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Phụ kiện</a></li>
									
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											@foreach($LT_product as $key => $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img" style="width: 250px; height: 200px;">
														<a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
															<img class="default-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
															<img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
															<?php $so_ngay_da_moban = (strtotime(date("d-m-Y")) - strtotime(date("d-m-Y", strtotime($product->StartsAt))))/ 86400 ?>
															@if($so_ngay_da_moban <= 7)
																<span class="new" style="right: 180px;" >New</span>
															@endif
														</a>
														
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Lượt xem: {{$product->View}}</span></a>
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
														<h3><a style="text-decoration:none" href="{{URL::to('/product-detail/'.$product->ProductId)}}">{{$product->ProductName}}</a></h3>
														<div class="product-price">
															<span style="color:black; font-size:17px"><b>{{number_format($product->Price).' '.'₫'}}</b></span>
															@if($product->Discount != 0)
															<br>
															<span class="old">{{number_format($product->Price + ($product->Price * ($product->Discount)/100)).' '.'₫'}}</span>
															<span class="o-giam-gia" style="font-size:10px">-{{$product->Discount}}% </span> 
															@endif
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="women" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										@foreach($PC_product as $key => $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img" style="width: 250px; height: 200px;">
														<a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
															<img class="default-img" style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto; "  src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
															<img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
															<?php $so_ngay_da_moban = (strtotime(date("d-m-Y")) - strtotime(date("d-m-Y", strtotime($product->StartsAt))))/ 86400 ?>
															@if($so_ngay_da_moban <= 7)
																<span class="new" style="right: 180px;">New</span>
															@endif
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Lượt xem: {{$product->View}}</span></a>
																<a title="Wishlist" href="javascript:void(0)"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>So sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" class="add-to-cart-a-tag" href="javascript:void(0)">Thêm vào giỏ hàng</a>
																<input type="text" value="{{$product->ProductId}}" hidden>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a style="text-decoration:none" href="{{URL::to('/product-detail/'.$product->ProductId)}}">{{$product->ProductName}}</a></h3>
														<div class="product-price">
															<span style="color:black; font-size:17px"><b>{{number_format($product->Price).' '.'₫'}}</b></span>
															@if($product->Discount != 0)
															<br>
															<span class="old">{{number_format($product->Price + ($product->Price * ($product->Discount)/100)).' '.'₫'}}</span>
															<span class="o-giam-gia" style="font-size:10px">-{{$product->Discount}}% </span> 
															@endif
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="kids" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										@foreach($PK_product as $key => $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img" style="width: 250px; height: 200px;">
														<a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
															<img class="default-img" style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto; "  src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
															<img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
															<?php $so_ngay_da_moban = (strtotime(date("d-m-Y")) - strtotime(date("d-m-Y", strtotime($product->StartsAt))))/ 86400 ?>
															@if($so_ngay_da_moban <= 7)
																<span class="new">New</span>
															@endif
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Lượt xem: {{$product->View}}</span></a>
																<a title="Wishlist" href="javascript:void(0)"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>So sánh</span></a>
																<input type="text" class="ProductId" value="{{$product->ProductId}}" hidden>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" class="add-to-cart-a-tag" href="javascript:void(0)">Thêm vào giỏ hàng</a>
																<input type="text" value="{{$product->ProductId}}" hidden>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a style="text-decoration:none" href="{{URL::to('/product-detail/'.$product->ProductId)}}">{{$product->ProductName}}</a></h3>
														<div class="product-price">
															<span style="color:black; font-size:17px"><b>{{number_format($product->Price).' '.'₫'}}</b></span>
															@if($product->Discount != 0)
															<br>
															<span class="old">{{number_format($product->Price + ($product->Price * ($product->Discount)/100)).' '.'₫'}}</span>
															<span class="o-giam-gia" style="font-size:10px">-{{$product->Discount}}% </span> 
															@endif
														</div>
													</div>
												</div>
											</div>
											@endforeach
											<!--<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Awesome Pink Show</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Awesome Bags Collection</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Women Pant Collectons</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Awesome Bags Collection</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Awesome Cap For Women</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Polo Dress For Women</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Black Sunglass For Women</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>-->
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->	
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Shop Home List  -->
	<section class="shop-home-list section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<div class="row">
						<div class="col-10" style="height: 70px;">
							<div class="shop-section-title">
								
								<?php $now_month = date('m') ?>
								<h1 style="text-transform:none">Top sản phẩm bán chạy nhất<p style="font-size:18px;margin-top: 10px">Tháng {{$now_month}}<p></h1>
								
							</div>
						</div>
						<div class="col-2" style="height: 70px; padding:0px">
							<img style="height:60px" src="{{URL::to('public/client/Images/top.png')}}" alt="">
						</div>
					</div>
					<!-- Start Single List  -->
					@foreach($top_product as $key => $product)
					<div class="single-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="list-image overlay" style="width: 230px; height: 200px;">
									<img style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
									<a href="javascript:void(0)" class="buy add-to-cart-a-tag"><i class="fa fa-shopping-bag"></i></a>
									<input type="text" value="{{$product->ProductId}}" hidden>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 no-padding">
								<div class="content">
									<h5 class="title"><a style="text-decoration:none" href="{{URL::to('/product-detail/'.$product->ProductId)}}">{{$product->ProductName}}</a></h5>
									<p class="price with-discount">{{number_format($product->Price).' '.'₫'}}</p>
									<h5 class="title" ><a>Đã bán: {{$product->number_solded}} sản phẩm </a> </h5>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<!-- End Single List  -->
					
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<div class="row">
						<div class="col-12" style="height: 70px;">
							<div class="shop-section-title">
								<h1 style="text-transform:none">Xem nhiều nhất</h1>
							</div>
						</div>
					</div>
					<!-- Start Single List  -->
					@foreach($top_view as $key => $product)
					<div class="single-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="list-image overlay" style="width: 230px; height: 200px;">
									<img style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
									<a href="javascript:void(0)" class="buy add-to-cart-a-tag"><i class="fa fa-shopping-bag"></i></a>
									<input type="text" value="{{$product->ProductId}}" hidden>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 no-padding">
								<div class="content">
									<h5 class="title"><a style="text-decoration:none" href="{{URL::to('/product-detail/'.$product->ProductId)}}">{{$product->ProductName}}</a></h5>
									<p class="price with-discount">{{number_format($product->Price * ((100- $product->Discount)/100)).' '.'₫'}}</p>
									<h5 class="title" ><a>Lượt xem: {{$product->View}} <i class=" ti-eye"></i></a> </h5>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Home List  -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home pb-80">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Miễn phí đổi trả</h4>
						<p>Trong vòng 30 ngày</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Bảo mật tuyệt đối</h4>
						<p>100% thanh toán an toàn</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Giá tốt nhất</h4>
						<p>Quà tặng và ưu đãi hấp dẫn</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	
	<!-- Start Shop Blog  -->
	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Bài Viết Nổi Bật</h2>
					</div>
				</div>
			</div>
			<div class="row">
			@foreach($all_blog as $key => $blog)
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img style="margin: auto; max-width: 330px; max-height: 300px; width: auto; height: auto;" src="{{URL::to('public/images_upload/blog/'.$blog->Image)}}" alt="#">
						<div class="content" style="text-align: justify; text-decoration:none;">
							<a class="title">{{$blog->Title}}</a>
							<a href="{{URL::to('/blog-detail/'.$blog->BlogId)}}" class="more-btn">Đọc tiếp</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
			@endforeach
				
			</div>
		</div>
	</section>
	<!-- End Shop Blog  -->

	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
							<div class="col-lg-6 offset-lg-3 col-12">
								<h4 style="margin-top:100px;font-size:14px; font-weight:500; color:#77ACF1; display:block; margin-bottom:5px;">Eshop Free Lite</h4>
								<h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
								<p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
								<div class="button" style="margin-top:30px;">
									<a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.mySlides:first').css("display","block"); // không có dòng này sẽ ko hiển bị banner đc
		});
	</script>
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		showSlides(slideIndex = n);
		}

		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			if (n > slides.length) {slideIndex = 1}    
			if (n < 1) {slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
		}
	</script>
	<script>
		var slideIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			slideIndex++;
			if (slideIndex > x.length) {slideIndex = 1}
			x[slideIndex-1].style.display = "block";
			setTimeout(carousel, 4000); // Change image every 2 seconds
		}
	</script>
	<!-- <p id="o-test"></p> -->
	<!-- <a href="{{URL::to('/add-product-to-withlist')}}">Hi</a> -->
	<style>
	.star-wrapper {
  direction: rtl;
}
.star-wrapper a {
  font-size: 2em;
  color: #DEDDE3;
  text-decoration: none;
  transition: all 0.5s;
  margin: 4px;
}
/* .star-wrapper a:hover {
  color: gold;
  transform: scale(1.3);
} */
.wraper {
  position: absolute;
  bottom: 30px;
  right: 50px;
}
	</style>
@endsection