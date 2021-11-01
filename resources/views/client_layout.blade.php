<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
	<title>ITGo Shop</title>
	<!--File css của Huy  -->
	<link rel="stylesheet" href="{{asset('./public/client/css/huy.css')}}">
	<!-- Favicon -->
	<link rel="icon" href={{url('./public/client/images/favi.png')}}/>
	 <!-- Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">	<!-- StyleSheet -->
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/font-awesome/css/font-awesome.min.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/plugins/ps-icon/style.css')}}">
	 <!-- CSS Library-->
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/owl-carousel/assets/owl.carousel.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/slick/slick/slick.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/Magnific-Popup/dist/magnific-popup.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/jquery-ui/jquery-ui.min.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/revolution/css/settings.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/revolution/css/layers.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/plugins/revolution/css/navigation.css')}}">
	 <!-- Custom-->
	 <link rel="stylesheet" href="{{asset('./public/client/css/style.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/css/themify-icons.css')}}">
	 <link rel="stylesheet" href="{{asset('./public/client/css/font-awesome.css')}}">
   	<link rel="stylesheet" href="{{asset('./public/client/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('./public/client/css/responsive.css')}}">

	<link rel="stylesheet" href="{{asset('./public/client/css/bootstrap.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('./public/client/css/magnific-popup.min.css')}}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{asset('./public/client/css/jquery.fancybox.min.css')}}">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="{{asset('./public/client/css/themify-icons.css')}}">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="{{asset('./public/client/css/niceselect.css')}}">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{asset('./public/client/css/animate.css')}}">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="{{asset('./public/client/css/flex-slider.min.css')}}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('./public/client/css/owl-carousel.css')}}">
	<!-- Slicknav -->
	<link rel="stylesheet" href="{{asset('./public/client/css/slicknav.min.css')}}">
		
	
</head>
<body class="ps-loading">
	<!-- Header -->
	<div class="header--sidebar"></div>
	<header class="header">
	  <nav class="navigation">
		<div class="container-fluid">
		  <div class="navigation__column left">
			<div class="header__logo"><a class="ps-logo" href="{{URL::to('/home')}}"><img src={{url('./public/client/Images/logo.png')}} alt=""></a></div>
		  </div>
		  <div class="navigation__column center">
				<ul class="main-menu menu">
				  	<li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Laptop</a>
						<div class="mega-menu">
					  		<div class="mega-wrap">
								@foreach($main_brand_list as $key => $main_brand)
									<div class="mega-column">
										<h4 class="mega-heading">{{$main_brand->BrandName}}</h4>
										<ul class="mega-item">
												@foreach($sub_brand_list as $key => $SubBrand)
													@if($SubBrand->SubBrand == $main_brand->BrandId)
														<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$SubBrand->BrandId)}}">{{$SubBrand->BrandName}}</a></li>
													@endif
												@endforeach
												<!-- <li><a href="product-listing.html">ZBook</a></li>
												<li><a href="product-listing.html">Envy</a></li>
												<li><a href="product-listing.html">Omen</a></li>
												<li><a href="product-listing.html">Pavilion</a></li> -->
										</ul>
									</div>
								@endforeach
								<!-- <div class="mega-column">
								<h4 class="mega-heading">HP</h4>
								<ul class="mega-item">
											<li><a href="product-listing.html">Elitebook</a></li>
																				<li><a href="product-listing.html">ZBook</a></li>
																				<li><a href="product-listing.html">Envy</a></li>
																				<li><a href="product-listing.html">Omen</a></li>
																				<li><a href="product-listing.html">Pavilion</a></li>
								</ul>
								</div>

								<div class="mega-column">
								<h4 class="mega-heading">DELL</h4>
								<ul class="mega-item">
									<li><a href="product-listing.html">Inspiron</a></li>
																				<li><a href="product-listing.html">Vostro</a></li>
																				<li><a href="product-listing.html">XPS</a></li>
																				<li><a href="product-listing.html">G-Gaming Series</a></li>
																				<li><a href="product-listing.html">Alienware</a></li>
																				<li><a href="product-listing.html">Latitude</a></li>
																				<li><a href="product-listing.html">Precision</a></li>
								</ul>
								</div>

								<div class="mega-column">
								<h4 class="mega-heading">Lenovo</h4>
								<ul class="mega-item">
									<li><a href="product-listing.html">ThinkPad</a></li>
																				<li><a href="product-listing.html">IdeaPad</a></li>
																				<li><a href="product-listing.html">Legion</a></li>
																				<li><a href="product-listing.html">ThinkBook</a></li>
								</ul>
								</div>
								<div class="mega-column">
								<h4 class="mega-heading">Apple</h4>
								<ul class="mega-item">
											<li><a href="product.php">Macbook Pro 13</a></li>
																				<li><a href="product-listing.html">Macbook Pro 15</a></li>
																				<li><a href="product-listing.html">Macbook Pro 16</a></li>
																				<li><a href="product-listing.html">Macbook Air</a></li>
								</ul>
								</div>
								<div class="mega-column">
								<h4 class="mega-heading">MSI</h4>
								<ul class="mega-item">
									<li><a href="product-listing.html">GF Series</a></li>
									<li><a href="product-listing.html">Prestige</a></li>
									<li><a href="product-listing.html">Modern Series</a></li>
									<li><a href="product-listing.html">Alpha Series</a></li>
								</ul>
								</div>
								<div class="mega-column">
								<h4 class="mega-heading">Microsoft</h4>
								<ul class="mega-item">
											<li><a href="product-listing.html">Surface Laptop</a></li>
																				<li><a href="product-listing.html">Surface Book</a></li>
																				<li><a href="product-listing.html">Surface Pro</a></li>
								</ul>
								</div> -->
					  		</div>
						</div>
				  	</li>
				  <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">PC</a>
					<div class="mega-menu">
					  <div class="mega-wrap">
						<div class="mega-column">
						  <h4 class="mega-heading">HP</h4>
						  <ul class="mega-item">
							<li><a href="product-listing.html">Elitedesk</a></li>
							<li><a href="product-listing.html">Z Workstation</a></li>
							<li><a href="product-listing.html">Pavilion</a></li>
						  </ul>
						</div>
						<div class="mega-column">
						  <h4 class="mega-heading">DELL</h4>
						  <ul class="mega-item">
							<li><a href="product-listing.html">Optiplex</a></li> 
							<li><a href="product-listing.html">Precision</a></li>
							<li><a href="product-listing.html">Alienware</a></li>
						  </ul>
						</div>
						<div class="mega-column">
						  <h4 class="mega-heading">Lenovo</h4>
						  <ul class="mega-item">
							<li><a href="product-listing.html">ThinkCentre</a></li> 
							<li><a href="product-listing.html">Legion</a></li>
							<li><a href="product-listing.html">ThinkStation</a></li>
						  </ul>
						</div>
						<div class="mega-column">
						  <h4 class="mega-heading">Apple</h4>
						  <ul class="mega-item">
							<li><a href="product.php">iMac</a></li>  
							<li><a href="product-listing.html">Mac</a></li>
							<li><a href="product-listing.html">Mac Pro</a></li>
						  </ul>
						</div>
						
					  </div>
					</div>
				  </li>
				  <li class="menu-item"><a href="product-listing.html">Phụ Kiện</a></li>
				  <li class="menu-item"><a href="bloggrid.php">Blogs</a></li>
				  
				</ul>
		  </div>
		  <div class="navigation__column right">
			<form class="ps-search--header" action="do_action" method="post">
			  <input class="form-control" type="text" placeholder="Search Product…">
			  <button><i class="fa fa-search"></i></button>
			</form>            
			<div class="ps-cart"><a class="ps-cart__toggle" href="{{URL::to('/show-cart')}}"><span><i>2</i></span><i  class="fa fa-shopping-cart" aria-hidden="true"></i></a>
			  <div class="ps-cart__listing">
				<div class="ps-cart__content"> 
				  <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
					<div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="./public/client/Images/cart-preview/2.jpg" alt=""></div>
					<div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">The Crusty Croissant</a>
					  <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
					</div>
				  </div>
				  <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
					<div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="./public/client/Images/cart-preview/3.jpg" alt=""></div>
					<div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">The Rolling Pin</a>
					  <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
					</div>
				  </div>
				</div>
				<div class="ps-cart__total">
				  <p>Number of items:<span>36</span></p>
				  <p>Item Total:<span>£528.00</span></p>
				</div>
				
				<div class="ps-cart__footer"><a href="{{URL::to('/checkout')}}" class="ps-btn">THANH TOÁN</a></div>
			  </div>

			</div>
			<div class="menu-toggle"><span></span></div>
			<a class="ps-cart__toggle" href="{{URL::to('/wishlist')}}" ><i class="fa fa-heart-o" aria-hidden="true"></i></a>
			<a class="ps-cart__toggle" href="{{URL::to('/show-cart')}}"><span><i>2</i></span><i  class="fa fa-file-text-o" aria-hidden="true"></i></a>
			<div class="dropdown">
				<div class="nut_dropdown"><a class="ps-cart__toggle"><i class="fa fa-user-circle-o" ></i></a></div>
					<div class="noidung_dropdown">
						<a href="{{URL::to('/profile')}}">Profile</a>
						<a href="#">Login/Logout</a>
					</div>
			</div>

		  </div>
		</div>
	  </nav>
	</header>
<!--/ End Header -->

@yield('client_content')
	
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
								<a href="product-detail.html"><img src={{url('./public/client/Images/logo2.png')}} alt="#"></a>
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
								<img src={{url('./public/client/Images/payments.png')}} alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
	<script  type="text/javascript">
		function removeItem(id)
		{
			var id = id;
			alert(id);
			$.ajax({
				url: '{{URL::to('/remove-item')}}',
				methed:"GET",
				data:{id:id},
				success:function(data)
				{
					alert('Xóa sản phẩm trong giỏ hàng thành công');
				},
				error:function(data)
				{
					alert('hi');
				}
			});
		}

	</script>
	<!-- Jquery -->
    <script src="{{asset('public/client/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/client/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('public/client/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('public/client/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('public/client/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('public/client/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('public/client/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('public/client/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('public/client/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('public/client/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('public/client/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('public/client/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('public/client/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('public/client/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('public/client/js/onepage-nav.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('public/client/js/easing.js')}}"></script>
	<!-- Active JS -->
	<script src="{{asset('public/client/js/active.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/client/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/gmap3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/imagesloaded.pkgd.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/jquery.matchHeight-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/slick/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/elevatezoom/jquery.elevatezoom.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script><script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{asset('public/client/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/client/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/client/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/client/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/client/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/client/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/client/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="{{asset('public/client/js/main.js')}}"></script>
</body>
</html>