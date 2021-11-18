@extends('client_layout')
@section('title', 'ITGoShop - Hệ thống Máy tính và Phụ kiện')
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
  
	<!-- Start Contact -->
	<div class="row gutters-sm pt-45 pl-60 pr-60 pb-80">
            <div class="col-md-3 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{URL::to('public/images_upload/user/Huy.jpg')}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Xin chào, Tạ Quang Huy!</h4>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-4" >
                <ul class="list-group list-group-flush">
				  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0" >
						<i style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-user-circle-o" class="fa fa-user-circle-o" ></i> 
						<a href="{{URL::to('/profile')}}" style="color:#333; font-weight:500;">Tài khoản</a>
					</h4>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0" >
						<i  style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-heart-o"  ></i>
						<a href="#" style="color:#333; font-weight:500;">Sản phẩm yêu thích</a>
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
            	<h3 style="margin: 20px 0px;">Chi tiết đơn hàng #{{$order_info->OrderId}} - <b>{{$order_info->OrderStatus}}</b> <p style="float:right;">Ngày đặt hàng: {{date("H:i d/m/Y", strtotime($order_info->OrderDate))}} </p></h3>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="card panel-default">
							<div class="panel-heading" style="background-color: white;"><h5><b>ĐỊA CHỈ NGƯỜI NHẬN</b></h5></div>
							<div class="panel-body" style="height:200px">
								<p><b>{{$shipping_address->ReceiverName}}</b><p>
								<p>Địa chỉ: {{$shipping_address->Address. ", " .$shipping_address->xaphuongthitran. ", " .$shipping_address->quanhuyen. ", " .$shipping_address->tinhthanhpho}}<p>
								<p>Điện thoại: {{$shipping_address->Phone}}</p>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card panel-default" >
							<div class="panel-heading" style="background-color: white;"><h5><b>HÌNH THỨC GIAO HÀNG</b></h5></div>
							<div class="panel-body" style="height:200px">
								<p>Giao Tiết Kiệm</p>
								<p>Giao vào Thứ bảy, 14/08</p>
								<p>Phí vận chuyển: 22.000đ</p>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card panel-default">
							<div class="panel-heading" style="background-color: white;"><h5><b>HÌNH THỨC THANH TOÁN</b></h5></div>
							<div class="panel-body" style="height:200px">
								<p>Thanh toán khi giao hàng</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card panel-default mt-20 mb-4">
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