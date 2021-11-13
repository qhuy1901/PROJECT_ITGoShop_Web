@extends('client_layout')
@section('client_content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="product-detail.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.php">Profile</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-12 col-12">
							<div class="form-main">
								<form class="form" method="post" id="formUpdateInfo">
									<div class="title">
										<h3>Thông tin tài khoản</h3>
									</div>
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Họ</label>
												<input name="name" type="text" placeholder="" >
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Tên</label>
												<input name="name" type="text" placeholder="" >
											</div>
										</div>
										
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email</label>
												<input name="email" type="email" placeholder="" >
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Số điện thoại</label>
												<input name="company_name" type="text" placeholder="">
											</div>	
										</div>
										
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Cập nhật</button>
											</div>
										</div>
										
									</div>
								</form>
							</div>
						</div>
                        <div class="col-lg-12 col-12">
							<div class="form-main">
								<div class="title">
									<h3>Địa chỉ giao hàng</h3>
								</div>
								<form class="form" method="post" action="mail/mail.php">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Tỉnh/Thành Phố</label>
												<input name="name" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Quận/Huyện</label>
												<input name="subject" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Phường/Xã</label>
												<input name="subject" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Số nhà - Tên đường</label>
												<input type="text" name="address"  placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Cập nhật</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="form-main">
								<div class="title">
									<h3>Thay đổi mật khẩu</h3>
								</div>
								<form class="form" method="post" action="mail/mail.php">
									<div class="row">
										<div class="col-lg-6 col-12">
												<div class="form-group">
                                                  <label >Mật khẩu hiện tại</label>
                                                  <input type="password"  name="" id="" placeholder="">
                                              
											</div>
										</div>
										<div class="col-lg-6 col-12">
												<div class="form-group">
                                                  <label >Mật khẩu mới</label>
                                                  <input type="password"  name="" id="" placeholder="">
                                                </div>
										</div>
										<div class="col-lg-6 col-12">
												<div class="form-group">
                                                  <label >Nhập lại mật khẩu</label>
                                                  <input type="password"  name="" id="" placeholder="">
                                                </div>
										</div>
										
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Cập nhật</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
@endsection