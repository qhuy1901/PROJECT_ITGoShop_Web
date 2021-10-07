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
		@foreach($product_det as $key => $product)
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
<<<<<<< HEAD
										<img src="{{URL::to('public/images_upload/product/'.$product->product_image)}}" alt="#">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title">{{$product->product_name}}</h2>
=======
										<img src="./public/client/Images/00_Product/Laptop/MSI Modern 15 AMD A5M 2021 _ Ultrabook phổ thông giá với thiết kế đẹp đi kèm với cấu hình rất tốt.png" alt="#">
									</div>
									
								</div>
											
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="blog-detail">
										<h2 class="blog-title">MSI Modern 15 AMD A5M 2021</h2>
>>>>>>> 149408ec6c59c073ff54407ec691e942800e60df
										<div class="blog-meta">
											<span class="author"><a> <i class="fa fa-calendar"></i>5 tháng</a><a><i class="fa fa-comments"></i>Bình luận (15)</a> <a><i class="fa fa-shopping-cart"></i>Đã bán 15</a><a><i class="fa fa-archive"></i>Kho 10</a></span>
										</div>
										<div class="content">
<<<<<<< HEAD
											<div class="blog-meta">
												<p>{{$product->content}}</p>
											</div>
=======
											<h1 class="blog-title">Giá bán: 19.800.000 VND</h1>
											<p>Vi xử lý: AMD Ryzen 5 5500U
                                                <br>Màn hình: 15.6" FHD IPS (1920 x 1080) chống chói
                                                <br>Độ phủ màu: 64% sRGB, 45% NTSC
                                                <br>RAM: 8GB DDR4 bus 3200 MHz (Nâng cấp tối đa 64GB)
                                                <br>Card đồ họa: AMD Radeon Graphics
                                                <br>Lưu trữ: 512GB m.2 NVMe (Nâng cấp tối đa 2TB)
                                                <br>Pin: 52Wh
                                                <br>Kết nối chính: 1 x USB-C USB 3.2 Gen2, 3 x USB-A, 1 x HDMI, 1 x microSD
                                                <br>Cân nặng: 1.6kg
                                                <br>Hệ điều hành: Windows 10 Home SL bản quyền</p>
>>>>>>> 149408ec6c59c073ff54407ec691e942800e60df
										</div>
									</div>
									<div class="single-widget get-button">
										<div class="content">
											<div class="button">
												<a href="#" class="btn">Thêm vào giỏ hàng</a>
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
							
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							
							<!--/ End Single Widget -->
							
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