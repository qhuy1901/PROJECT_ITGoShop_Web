@extends('client_layout')
@section('client_content')
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="product-detail.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.php">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Checkout -->
		<main class="ps-main">
			<div class="ps-checkout pt-80 pb-80">
			  <div class="ps-container">
				<form class="ps-checkout__form" action="#" method="post">
				  <div class="row">
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
						  <div class="ps-checkout__billing">
							<h3>thông tin đơn hàng</h3>
								  <div class="form-group form-group--inline">
									<label>Họ và tên người nhận<span>*</span>
									</label>
									<input class="form-control" type="text">
								  </div>
								  <div class="form-group form-group--inline">
									<label>Email<span>*</span>
									</label>
									<input class="form-control" type="email">
								  </div>
								  <div class="form-group form-group--inline">
									<label>Số điện thoại<span>*</span>
									</label>
									<input class="form-control" type="text">
								  </div>
								  <div class="form-group form-group--inline">
									<label>Tỉnh/Thành phố<span>*</span>
									</label>
									<input class="form-control" type="text">
								  </div>
								  <div class="form-group form-group--inline">
									<label>Quận/Huyện<span>*</span>
									</label>
									<input class="form-control" type="text">
								  </div>
								  <div class="form-group form-group--inline">
									<label>Số nhà - Tên đường<span>*</span>
									</label>
									<input class="form-control" type="text">
								  </div>
							
							<h3 class="mt-40"> thông tin thêm</h3>
							<div class="form-group form-group--inline textarea">
							  <label>Lưu ý của khách hàng</label>
							  <textarea class="form-control" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
							</div>
						  </div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
						  <div class="ps-checkout__order">
							<header>
							  <h3>Your Order</h3>
							</header>
							<div class="content">
							  <table class="table ps-checkout__products">
								<thead>
								  <tr>
									<th class="text-uppercase">Product</th>
									<th class="text-uppercase">Total</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>Tổng đơn hàng</td>
									<td>$300.00</td>
								  </tr>
								  <tr>
									<td>(+) Phí vận chuyển</td>
									<td>$00.00</td>
								  </tr>
								  <tr>
									<td>(-) Giảm giá</td>
									<td>$30.00</td>
								  </tr>
								  <thead>
										<tr>
											<th class="text-uppercase">Số tiền phải trả</th>
											<th class="text-uppercase">$270.00</th>
										</tr>
									
								  </thead>
								</tbody>
							  </table>
							</div>
							<footer>
							  <h3>Payment Method</h3>
							  <div class="form-group cheque">
								<div class="ps-radio">
								  <input class="form-control" type="radio" id="rdo01" name="payment" checked>
								  <label for="rdo01">Thanh toán khi giao hàng</label>
								</div>
							  </div>
							  <div class="form-group paypal">
								<div class="ps-radio ps-radio--inline">
								  <input class="form-control" type="radio" name="payment" id="rdo02">
								  <label for="rdo02">Thanh toán bằng thẻ</label>
								</div>
								<ul class="ps-payment-method">
								  <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
								  <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
								  <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
								</ul>
								<button class="ps-btn ps-btn--fullwidth">Đặt hàng<i class="ps-icon-next"></i></button>
							  </div>
							</footer>
						  </div>
						</div>
				  </div>
				</form>
			  </div>
			</div>
		<!--/ End Checkout -->
		
		<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Miễn phí vận chuyển</h4>
						<p>Đơn đặt hàng trên 1.000.000VND</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Miễn phí đổi trả</h4>
						<p>Trong vòng 30 ngày</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Bảo mật tuyệt đối</h4>
						<p>100% thanh toán an toàn</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
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
	<!-- End Shop Services Area -->
		
		<!-- Start Shop Blog  -->
	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>From Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="https://via.placeholder.com/370x300" alt="#">
						<div class="content">
							<p class="date">22 July , 2020. Monday</p>
							<a href="#" class="title">Sed adipiscing ornare.</a>
							<a href="#" class="more-btn">Continue Reading</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="https://via.placeholder.com/370x300" alt="#">
						<div class="content">
							<p class="date">22 July, 2020. Monday</p>
							<a href="#" class="title">Man’s Fashion Winter Sale</a>
							<a href="#" class="more-btn">Continue Reading</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="https://via.placeholder.com/370x300" alt="#">
						<div class="content">
							<p class="date">22 July, 2020. Monday</p>
							<a href="#" class="title">Women Fashion Festive</a>
							<a href="#" class="more-btn">Continue Reading</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Blog  -->
			
		<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="product-detail.html"><img src="images/logo2.png" alt="#"></a>
							</div>
							<p class="text">Công Ty TNHH Thương Mại ITGo</p>
							<p class="text">Email: cskh@itgo.com </p>
							<p class="text">Hệ thống tổng đài miễn phí <br> (Làm việc từ 8h00 - 22h00):</p>
							<p class="call">Gọi mua hàng <span><a href="tel:1800 6975">1800 6975</a></span></p>
							<p class="call">Hỗ trợ khách hàng <span><a href="tel:1800 6173">1800 6173</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Về ITGo Shop</h4>
							<ul>
								<li><a href="#">Giới thiệu</a></li>
								<li><a href="#">Câu hỏi thường gặp</a></li>
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Liên hệ</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Chính sách</h4>
							<ul>
								<li><a href="#">Bảo hành</a></li>
								<li><a href="#">Vận chuyển</a></li>
								<li><a href="#">Thanh toán</a></li>
								<li><a href="#">Bảo mật</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Hệ thống cửa hàng</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>Số 95 Trần Thiện Chánh, Phuờng 12, Quận 10</li>
									<li class="map" ><a href="https://www.google.com/maps/place/ThinkPro+-+95+Tr%E1%BA%A7n+Thi%E1%BB%87n+Ch%C3%A1nh,+P12,+Q10,+TP+HCM/@10.7720769,106.6680882,17z/data=!3m1!4b1!4m5!3m4!1s0x31752fea4b76a251:0x3b34f5af9212aadc!8m2!3d10.7720769!4d106.6702769"> <bold>Chỉ đường</bold></a></li>
									
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="https://www.facebook.com/"><i class="ti-facebook"></i></a></li>
								<li><a href="https://twitter.com/home?lang=vi"><i class="ti-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
@endsection