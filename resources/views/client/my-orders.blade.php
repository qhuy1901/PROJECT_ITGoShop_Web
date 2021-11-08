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
                        <li class="active"><a href="{{URL::to('/my-orders')}}">Đơn hàng của tôi</a></li>
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
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Đơn hàng của tôi</b></h4></div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
							  <tr>
								<th scope="col"><b>Mã đơn hàng</b></th>
								<th scope="col"><b>Ngày mua</b></th>
								<th scope="col"><b>Sản phẩm</b></th>
								<th scope="col"><b>Tổng tiền</b></th>
								<th scope="col"><b>Trạng thái đơn hàng</b></th>
							  </tr>
							</thead>
							<tbody>
								@foreach($order_list as $key => $item)
								<tr>
									<td>
										<a href="{{URL::to('/show-order-detail/'.$item->OrderId)}}" style="color: #77ACF1">{{$item->OrderId}}</a>
									</td>
									<td>
										{{date("d/m/Y", strtotime($item->OrderDate))}}
									</td>
									<td>
										{{$item->Description}}
									</td>
									<td>
										{{number_format($item->Total, 0, " ", ".").' ₫'}}
									</td>
									<td>{{$item->OrderStatus}}</td>
								</tr>
								@endforeach
							</tbody>
						  </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>		
@endsection