@extends('client_layout')
@section('title', 'Tài khoản - ITGoShop')
@section('client_content')
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
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
    <?php   
            $CustomerId = Session::get('CustomerId');
            $avt = Session::get('CustomerImage');
			if($avt == '')
				$avt = "default-user-icon.png";
				$firstName = Session::get('CustomerFirstName');
				$lastName = Session::get('CustomerLastName');
				$fullname = $lastName.' '.$firstName ;
	?>												
	<!-- Start Contact -->
	<div class="row gutters-sm pt-20 pl-60 pr-80 pb-80">
            <div class="col-md-3 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{URL::to('public/images_upload/user/'.$avt)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Xin chào, {{$fullname}}!</h4>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-4" >
                <ul class="list-group list-group-flush">
				  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0" >
						<i style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-user-circle-o" class="fa fa-user-circle-o" ></i> 
						<a href="{{URL::to('/profile/'.$CustomerId)}}" style="color:#333; font-weight:500;">Tài khoản</a>
					</h4>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0" >
						<i  style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-heart-o"  ></i>
						<?php
                            if($CustomerId) { ?>
                            <a href="{{URL::to('/wishlist')}}" style="color:#333; font-weight:500;">Sản phẩm yêu thích</a>
                        <?php } ?>
					</h4>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0">
						<i style="font-size: 20px; padding-right: 18px;" class="fa fa-history" class="fa fa-history" ></i>
						<a href="{{URL::to('/my-orders')}}" style="color:#333; font-weight:500;">Lịch sử mua hàng</a>
					</h4>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-9">
                @foreach($profile_detail as $key => $profile)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="title">
                            <h1>Thông tin tài khoản</h1>
                        </div>
                        <Br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mt-0">Họ</h4>
                            </div>
                            <div class="col-lg-6" >
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="{{$profile->LastName}}" style="width: 400px; border-radius: 3px; height: 28px;" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Tên</h4>
                            </div>
                            <div class="col-lg-8 ">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="{{$profile->FirstName}}" style="width: 400px; border-radius: 3px; height: 28px;" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Email</h4>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="{{$profile->Email}}" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>	
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Số điện thoại</h4>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input name="company_name" type="text" placeholder="{{$profile->Mobile}}" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>	
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="#" style="font-size:12px;">Cập nhật</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="title">
                            <h1>Địa chỉ giao hàng</h1>
                        </div>
                        <Br>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Tỉnh/Thành phố</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="{{$default_shipping_address->tinhthanhpho}}" style="width: 400px; border-radius: 3px; height: 28px;" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Quận/Huyện</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="{{$default_shipping_address->quanhuyen}}" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Phường xã</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="{{$default_shipping_address->xaphuongthitran}}" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Số nhà - Tên đường</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="{{$default_shipping_address->Address}}" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="#" style="font-size:12px">Cập nhật</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="title">
                            <h1>Thay Đổi Mật Khẩu</h1>
                        </div>
                        <Br>
						<div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Mật khẩu hiện tại</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder="" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Mật khẩu mới</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder=""style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h4 class="mb-0">Nhập lại mật khẩu</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="password"  name="" id="" placeholder="" style="width: 400px; border-radius: 3px; height: 28px;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="#" style="font-size:12px">Cập nhật</a>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
	<!--/ End Contact -->
	<style type="text/css">
body{
    
    color: #1a202c;
    text-align: left;  
}
.card {
    box-shadow: 0 1px 3px 0 rgb(176, 190, 197), 0 1px 2px 0 rgb(144, 164, 174);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .5rem;
	font-size: 14px;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.5rem;
}



.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>	
	<!-- Map Section -->
@endsection