@extends('client_layout')
@section('title', 'ITGoShop - Hệ thống Máy tính và Phụ kiện')
@section('client_content')
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list" style="margin-left:50px">
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
	<!-- Start Contact -->
	<div class="row gutters-sm pt-45 pl-60 pr-60 pb-80">
            <div class="col-md-3 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{URL::to('public/images_upload/user/Huy.jpg')}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
						<?php $LastName=Session::get('CustomerLastName'); $FirstName=Session::get('CustomerFirstName');?>
                      <h4>Xin chào, {{$LastName.' '.$FirstName}}!</h4>
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="title">
                            <h1>Lịch sử đơn hàng</h1>
                        </div>
                        <Br>
						@if(count($order_list) == 0)
							<p>Khách hàng chưa có đơn hàng nào.</p>
						@else
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
						@endif
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