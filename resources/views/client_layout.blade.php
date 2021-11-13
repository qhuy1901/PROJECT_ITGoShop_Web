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
	<style>
		.swal-footer {
			text-align: center;
		}

	</style>
	<style>
		.slider-area .mySlides {display: none}
		.slider-area img {vertical-align: middle; border-radius: 10px  10px 0px 0px; max-height:260px;} 
		.slideshow-container {
			position: relative;
			margin: 50px 0px 0px 0px;
			border: 1px solid #D1D6E0;
			border-radius: 10px;
		}
		/* Next & previous buttons */
		.slider-area .prev, .next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		padding: 16px;
		margin-top: -22px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
		}
		/* Position the "next button" to the right */
		.slider-area .next {
		right: 0;
		border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover, .next:hover {
		background-color: rgba(0,0,0,0.8);
		}

		/* The dots/bullets/indicators */
		.slider-area .dot {
		cursor: pointer;
		height: 8px;
		width: 8px;
		margin: 0 2px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.6s ease;
		}

		.slider-area .active, .dot:hover {
		background-color: #717171;
		}

	</style>
	<link rel="stylesheet" href="{{asset('./public/client/css/huy.css')}}">
	<!-- Favicon -->
	<link rel="icon" href="{{url('./public/client/images/favi.png')}}"/>
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
	<!-- <link rel="stylesheet" href="{{asset('./public/client/css/niceselect.css')}}"> -->
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{asset('./public/client/css/animate.css')}}">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="{{asset('./public/client/css/flex-slider.min.css')}}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('./public/client/css/owl-carousel.css')}}">
	<!-- Slicknav -->
	<link rel="stylesheet" href="{{asset('./public/client/css/slicknav.min.css')}}">
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="ps-loading">
	<!-- Header -->
	<div class="header--sidebar"></div>
	<header class="header">
	  <nav  class="navigation">
		<div class="container-fluid" >
		  <div class="navigation__column left">
			<div class="header__logo"><a class="ps-logo" href="{{URL::to('/home')}}"><img src="{{URL::to('/public/client/Images/logo.png')}}" alt=""></a></div>
		  </div>
		  <div class="navigation__column center">
				
				<ul class="main-menu menu">
				@foreach($product_category_list as $key => $category)
					@if($category->CategoryId == "LT000")
				  	<li class="menu-item menu-item-has-children has-mega-menu"><a href="{{URL::to('/product-listing2/'.$category->CategoryId)}}">Laptop</a>
						<div class="mega-menu">
					  		<div class="mega-wrap">
								@foreach($main_brand_list as $key => $main_brand)
									@if($main_brand->CategoryId == "LT000")
									<div class="mega-column">
											<a href="{{URL::to('/product-listing/'.$main_brand->BrandId)}}"> <h4 class="mega-heading" >{{$main_brand->BrandName}}</h4> </a>
										@foreach($sub_brand_list as $key => $SubBrand)
											@if($SubBrand->BrandId == $main_brand->BrandId)
											<ul class="mega-item">
												<li><a href="{{URL::to('/product-listing/'.$SubBrand->SubBrandId)}}">{{$SubBrand->SubBrandName}}</a></li>
											</ul>
											@endif
										@endforeach	
									</div>
									@endif
								@endforeach
								
					  		</div>
						</div>
				  	</li>
					@endif
				@endforeach
				@foreach($product_category_list as $key => $category)
					@if ($category->CategoryId == "PC000")
				  	<li class="menu-item menu-item-has-children has-mega-menu"><a href="{{URL::to('/product-listing2/'.$category->CategoryId)}}">PC</a>
						<div class="mega-menu">
							<div class="mega-wrap">
										@foreach($main_brand_list as $key => $main_brand)
											@if($main_brand->CategoryId == "PC000")
											<div class="mega-column">
												<a href="{{URL::to('/product-listing/'.$main_brand->BrandId)}}"><h4 class="mega-heading">{{$main_brand->BrandName}}</h4></a>
												@foreach($sub_brand_list as $key => $SubBrand)
													@if($SubBrand->BrandId == $main_brand->BrandId)
													<ul class="mega-item">
														<li><a href="{{URL::to('/product-listing/'.$SubBrand->SubBrandId)}}">{{$SubBrand->SubBrandName}}</a></li>
																
													</ul>
													@endif
												@endforeach	
											</div>
											@endif
										@endforeach
							</div>
						</div>
				  	</li>
					@endif
				@endforeach
				@foreach($product_category_list as $key => $category)
					@if ($category->CategoryId == "PK000")
						<li class="menu-item"><a href="{{URL::to('/product-listing2/'.$category->CategoryId)}}">Phụ Kiện</a></li>
					@endif
				@endforeach
					<li class="menu-item"><a href="{{URL::to('/all_blog')}}">Blogs</a></li>
				</ul>
				
		  </div>
		  
		  <div class="navigation__column right">
			<form class="ps-search--header" action="do_action" method="post">
			  <input class="form-control" type="text" placeholder="Search Product…">
			  <button><i class="fa fa-search"></i></button>
			</form>            
			<div class="ps-cart"><a class="ps-cart__toggle" href="{{URL::to('/show-cart')}}" title="Giỏ hàng"><span><i id="so-luong-sp-gio-hang"><?php echo Cart::count(); ?></i></span><i  class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
				
				<div class="ps-cart__footer"><a href="javascript:void(0)" class="ps-btn btn-thanh-toan">THANH TOÁN</a></div>
			  </div>

			</div>
			<div class="menu-toggle"><span></span></div>
			<a class="ps-cart__toggle" href="{{URL::to('/wishlist')}}" ><i class="fa fa-heart-o" aria-hidden="true" title="Wish List"></i></a>
			<div class="dropdown">
				<div class="nut_dropdown"><a href="{{URL::to('/login')}}" class="ps-cart__toggle"><i class="fa fa-user-circle-o"  title="Đăng Nhập"></i></a></div>
					<div class="noidung_dropdown">
						<?php
							$CustomerId= Session::get('CustomerId');
							if($CustomerId) { ?>
								<a href="{{URL::to('/profile')}}">Tài khoản</a>
								<a href="{{URL::to('/my-orders')}}">Đơn hàng của tôi</a>
								<a href="{{URL::to('/customer-logout')}}">Kiểm tra bảo hành</a>
								<a href="{{URL::to('/customer-logout')}}">Đăng xuất</a>
							<?php } ?>
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
								<a href="product-detail.html"><img src="{{url('./public/client/Images/logo2.png')}}" alt="#"></a>
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
								<img src="{{url('./public/client/Images/payments.png')}}" alt="">
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
	<!-- Sweet Alert -->
	<script src="{{asset('public/admin/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
	<script>
		$('.btn-thanh-toan').click(function(){
			var numberOfProduct = Number($('#so-luong-sp-gio-hang').text());
			if(numberOfProduct == 0)
			{
				swal({
					// title: "Giỏ hàng trống",
					text: "Bạn vẫn chưa chọn sản phẩm nào để mua.",
					// icon: "warning",
					button: "OK",
				});
			}
			else{
				window.location.href = '{{URL::to('/checkout')}}';
			}
		});
	</script>
	<script>
		$('.add-to-cart-a-tag').click( function()
			{
				var productId = $(this).parent().find('input').val();
				var numberOfProduct = Number($('#so-luong-sp-gio-hang').text()) + 1;
				$.ajax({
					url: '{{URL::to('/add-to-cart')}}',
					methed:"GET",
					data:{ProductId:productId, Quantity: 1},
					success:function(data)
					{
						$('#so-luong-sp-gio-hang').text(numberOfProduct);
						swal({
								title: "Thông báo",
								text: "Đã thêm sản phẩm vào giỏ hàng!",
								icon: "success",
								buttons: ["Tiếp tục mua hàng", "Xem giỏ hàng"],
							}).then(function(isConfirm) {
								if (isConfirm) {
										window.location = "{{url('/show-cart')}}";
								}
							})
					},
					error:function(data)
					{
						alert('Error');
					}
				});
			});
	</script>
	<script type="text/javascript">
	// Hàm load data vào dropdownbox Phường/Xã
	function load_xaphuong_dropdownbox()
	{
		var maqh = $(".select-quanhuyen").val();
		$.ajax({
			url: '{{URL::to('/load-xaphuongthitran-dropdownbox')}}',
			method:"GET",
			data:{maqh: maqh},
			success:function(data)
			{
				$(".select-xaphuongthitran").html(data);
			},
			error:function(data)
			{
				alert('Lỗi');
			}	
		});	
	}

	$(document).ready(function(){
		$('.select-tinhthanhpho').change(function(){
			var matp = $(this).val();
			$.ajax({
				url: '{{URL::to('/load-quanhuyen-dropdownbox')}}',
				method:"GET",
				data:{matp: matp},
				success:function(data)
				{
					$(".select-quanhuyen").html(data);
					load_xaphuong_dropdownbox();
				},
				error:function(data)
				{
					alert('Lỗi');
				}	
			});
		});

		$('.select-quanhuyen').change(function(){
			load_xaphuong_dropdownbox();
		});
	});
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
	<!-- <script src="{{asset('public/client/js/nicesellect.js')}}"></script> -->
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