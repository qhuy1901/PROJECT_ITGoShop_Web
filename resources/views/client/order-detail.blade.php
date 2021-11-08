@extends('client_layout')
@section('client_content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="{{URL::to('/')}}">Tài khoản<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{URL::to('/my-orders')}}">Đơn hàng của tôi<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{URL::to('/my-orders')}}">Chi tiết đơn hàng</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<section>
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #77ACF1;">
						<div class="row">
							<div class="col-sm-4">
                                <img src="{{URL::to('public/images_upload/user/Huy.jpg')}}" class="rounded-circle" alt="#" style="height:40px"> 
							</div>
							<div class="col-sm-8" >
								<p style="color: white;">Xin chào<br><b>Tạ Quang Huy</b></p>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<ul>
							<li>
								<div class="row" style="font-size: 20px;">
									<div class="col-sm-2">
										<i class="fa fa-user" aria-hidden="true"></i>
									</div>
									<div class="col-sm-10" >
										<p>
											<a href="#" style="color: black;text-decoration: none;">Thông tin tài khoản</a>
										<p>
									</div>
								</div>
							</li>
							<li>
								<div class="row" style="font-size: 20px;">
									<div class="col-sm-2">
										<i class="fa fa-bell" aria-hidden="true"></i>
									</div>
									<div class="col-sm-10" >
										<p>
											<a href="#" style="color: black;text-decoration: none;">Thông báo của tôi</a>
										<p>
									</div>
								</div>
							</li>
							<li>
								<div class="row" style="font-size: 20px;">
									<div class="col-sm-2">
										<i class="fa fa-sticky-note" aria-hidden="true"></i>
									</div>
									<div class="col-sm-10" >
										<p>
											<a href="{{URL::to('/my-orders')}}" style="color: black;text-decoration: none;">Quản lý đơn hàng</a>
										<p>
									</div>
								</div>
							</li>
							<li>
								<div class="row" style="font-size: 20px;">
									<div class="col-sm-2">
										<i class="fa fa-heart" aria-hidden="true"></i>
									</div>
									<div class="col-sm-10" >
										<p>
											<a href="#" style="color: black;text-decoration: none;">Sản phẩm yêu thích</a>
										<p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="col-lg-9">

				<h3 style="margin: 20px 0px;">Chi tiết đơn hàng #{{$order_info->OrderId}} - <b>{{$order_info->OrderStatus}}</b> <p style="float:right;">Ngày đặt hàng: {{date("H:i d/m/Y", strtotime($order_info->OrderDate))}} </p></h3>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: white;"><h5><b>ĐỊA CHỈ NGƯỜI NHẬN</b></h5></div>
							<div class="panel-body" style="height:200px">
								<p><b>{{$shipping_address->ReceiverName}}</b><p>
								<p>Địa chỉ: {{$shipping_address->Address. ", " .$shipping_address->xaphuongthitran. ", " .$shipping_address->quanhuyen. ", " .$shipping_address->tinhthanhpho}}<p>
								<p>Điện thoại: {{$shipping_address->Phone}}</p>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-default" >
							<div class="panel-heading" style="background-color: white;"><h5><b>HÌNH THỨC GIAO HÀNG</b></h5></div>
							<div class="panel-body" style="height:200px">
								<p>Giao Tiết Kiệm</p>
								<p>Giao vào Thứ bảy, 14/08</p>
								<p>Phí vận chuyển: 22.000đ</p>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: white;"><h5><b>HÌNH THỨC THANH TOÁN</b></h5></div>
							<div class="panel-body" style="height:200px">
								<p>Thanh toán khi giao hàng</p>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table">
							<thead class="thead-light">
							  <tr>
								<th scope="col" colspan="2"><b>Sản phẩm</b></th>
								<th scope="col"><b>Giá</b></th>
								<th scope="col"><b>Số lượng</b></th>
								<th scope="col" style="text-align: right;"><b>Tạm tính</b></th>
							  </tr>
							</thead>
							<tbody>
								@foreach($order_detail as $key => $item)
								<tr>
									<td><img style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$item->ProductImage)}}" alt=""></td>
									<td>{{$item->ProductName}}</td>
									<td>{{number_format($item->UnitPrice, 0, " ", ".").' ₫'}}</td>
									<td>x{{$item->OrderQuantity}}</td>
									<td style="text-align: right;">{{number_format($item->UnitPrice * $item->OrderQuantity, 0, " ", ".").' ₫'}}</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="3">
									</td>
									<td>
										<p>Tạm tính</p>
										<p>Giảm giá</p>
										<p>Phí vận chuyển</p>
										<p>Tổng cộng</p>
									</td>
									<td style="text-align: right;">
										<p>{{number_format($order_info->Total, 0, " ", ".").' ₫'}}</p>
										<p>-0 ₫</p>
										<p>0 ₫</p>
										<p style="color: red; font-size: 20px">{{number_format($order_info->Total, 0, " ", ".").' ₫'}}</p>
									</td>
								</tr>
							</tbody>
						  </table>
					</div>
				</div>
				<p><a href="{{URL::to('/my-orders')}}"><< Quay lại đơn hàng của tôi</a></p>
			</div>
		</div>
	</div>
</section>	
@endsection