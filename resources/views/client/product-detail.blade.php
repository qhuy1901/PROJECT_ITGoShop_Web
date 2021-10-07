@extends('client_layout')
@section('client_content')
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#">Laptop</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		@foreach($product_detail  as $key => $product)
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
										<img src="{{URL::to('public/images_upload/product/'.$product->product_image)}}" alt="#">
									</div>
								</div>
											
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="blog-detail">
								<form action="{{URL::to('/save-cart')}}" method="POST">
									{{csrf_field()}}
									<h2 class="blog-title">{{$product->product_name}}</h2>
									<i><h4>Thương hiệu: {{$product->brand_name}}</h3>
									<h4>Danh mục: {{$product->product_category_name}}</h3></i>
									<div class="blog-meta" style="padding-top:30px">
										<span class="author">
											<a> <i class="fa fa-calendar"></i>5 tháng</a>
											<a><i class="fa fa-comments"></i>Bình luận (15)</a> 
											<a><i class="fa fa-shopping-cart"></i>Đã bán 15</a>
											<a><i class="fa fa-archive"></i>Còn lại {{$product->quatity}} sản phẩm</a>
										</span>
									</div>
									<div class="content">
										<!-- Nội dung sản phẩm -->
										<div class="blog-meta">
											<p>{!!$product->content!!}</p> <!-- Thêm !! để dataa ko bị lỗi nếu data đã được styling-->
										</div>
											<!-- End Nội dung sản phẩm -->
											<div class="blog-meta">
												<h1 style="color:red; background-color:#FAFAFA; padding: 20px">
													<!-- Gía sản phẩm -->
													<b>{{number_format($product->price).' '.' ₫'}}</b>
													<sub style="color:black; font-size:15px "> 
														<!--  Phần giảm giá -->
														<del>{{number_format($product->price + $product->price * $product->discount / 100 ).' '.' ₫'}}</del> 
														<span class="o-giam-gia">-{{$product->discount}}% </span>
													</sub>
												</h1>
											</div>
										</div>
									</div>

									<div class="single-widget get-button">
										<div class="content">
												<p>Số lượng: <input name="quatity" type="number" min="1" value="1" size="4" style="width:50px"></p> 
											<div class="button">
												<button type="submit" class="btn">
													Thêm vào giỏ hàng
												</button>
											</div>
										</div>
									</div>
									<div class="share-social">
										<div class="row">
											<div class="col-12">
												<div class="content-tags">
													<h4>Tags:</h4>
													<ul class="tag-inner">
														<li><a href="#">Glass</a></li>
														<li><a href="#">Pant</a></li>
														<li><a href="#">t-shirt</a></li>
														<li><a href="#">swater</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					
					<div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>các sản phẩm liên quan</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											@foreach($related_product as $key => $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
															<img class="default-img" src="{{URL::to('public/images_upload/product/'.$product->product_image)}}" alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Thêm yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">{{$product->product_name}}</a></h3>
														<div class="product-price">
															<span>{{number_format($product->price).' '.'₫'}}</span>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>

					<div class="col-12">
									<div class="comments">
										<h3 class="comment-title">Bình luận (3)</h3>
										<!-- Single Comment -->
										<div class="single-comment">
											<img src="https://via.placeholder.com/80x80" alt="#">
											<div class="content">
												<h4>Alisa harm <span>At 8:59 pm On Feb 28, 2018</span></h4>
												<p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee  Phosfluorescently leverage.</p>
												<div class="button">
													<a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
												</div>
											</div>
										</div>
										<!-- End Single Comment -->
										<!-- Single Comment -->
										<div class="single-comment left">
											<img src="https://via.placeholder.com/80x80" alt="#">
											<div class="content">
												<h4>john deo <span>Feb 28, 2018 at 8:59 pm</span></h4>
												<p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee  Phosfluorescently leverage.</p>
												<div class="button">
													<a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
												</div>
											</div>
										</div>
										<!-- End Single Comment -->
										<!-- Single Comment -->
										<div class="single-comment">
											<img src="https://via.placeholder.com/80x80" alt="#">
											<div class="content">
												<h4>megan mart <span>Feb 28, 2018 at 8:59 pm</span></h4>
												<p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee  Phosfluorescently leverage.</p>
												<div class="button">
													<a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
												</div>
											</div>
										</div>
										<!-- End Single Comment -->
									</div>									
								</div>											
								<div class="col-12">			
									<div class="reply">
										<div class="reply-head">
											<h2 class="reply-title">Leave a Comment</h2>
											<!-- Comment Form -->
											<form class="form" action="#">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-12">
														<div class="form-group">
															<label>Your Name<span>*</span></label>
															<input type="text" name="name" placeholder="" required="required">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-12">
														<div class="form-group">
															<label>Your Email<span>*</span></label>
															<input type="email" name="email" placeholder="" required="required">
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<label>Your Message<span>*</span></label>
															<textarea name="message" placeholder=""></textarea>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group button">
															<button type="submit" class="btn">Post comment</button>
														</div>
													</div>
												</div>
											</form>
											<!-- End Comment Form -->
										</div>
									</div>			
								</div>
				</div>
			</div>
		</section>
		@endforeach
		<!--/ End Blog Single -->
@endsection