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
	<?php   
            $CustomerId = Session::get('CustomerId');
            $avt = Session::get('CustomerImage');
			$firstName = Session::get('CustomerFirstName');
			$lastName = Session::get('CustomerLastName');
            $fullname = $lastName.' '.$firstName ;
	?>

	<!-- Start Contact -->
	<div class="row gutters-sm pt-45 pl-60 pr-60 pb-80">
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
            	<h3 style="margin: 20px 0px;">Chi tiết đơn hàng #{{$order_info->OrderId}} - <b class="OrderStatus">{{$order_info->OrderStatus}}</b> <p style="float:right;">Ngày đặt hàng: {{date("h:i d/m/Y", strtotime($order_info->OrderDate))}} </p></h3>
				<input type="text" class="OrderId" value="{{$order_info->OrderId}}" hidden>
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
								<p>{{$order_info->ShipMethod}}</p>
								<p>
									@if($order_info->EstimatedDeliveryTime <= 24)
										Thời gian giao hàng dự kiến: khoảng {{date('h:00 d-m-Y',strtotime($order_info->EstimatedDeliveryTime))}}
									@else
										Thời gian giao hàng dự kiến: {{date('d-m-Y',strtotime($order_info->EstimatedDeliveryTime))}}
									@endif
								</p>
								<p>Phí vận chuyển: {{number_format($order_info->ShipFee, 0, " ", ".").' ₫'}}</p>
								<p>Đơn vị vận chuyển: ITGoFast</p>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card panel-default">
							<div class="panel-heading" style="background-color: white;"><h5><b>HÌNH THỨC THANH TOÁN</b></h5></div>
							<div class="panel-body" style="height:200px">
								<p>{{$order_info->PaymentMethod}}</p>
								<p>Tình trạng: {{$order_info->PaymentStatus}}</p>
								
								<!-- <img style="height:70px" src="{{URL::to('public/client/Images/da-thanh-toan.png')}}" alt=""> -->
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
									<td>{{$item->ProductName}}<br><button type="button" class="btn btn-primary btn-danh-gia" style="margin:10px 0px;position: inherit;">Đánh giá sản phẩm</button> <input type="hidden" class="ProductId" value="{{$item->ProductId}}"> </td>
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
										<p>{{number_format($order_info->Total - $order_info->ShipFee, 0, " ", ".").' ₫'}}</p>
										<p>-0 ₫</p>
										<p>{{number_format($order_info->ShipFee, 0, " ", ".").' ₫'}}</p>
										<p style="color: red; font-size: 20px">{{number_format($order_info->Total, 0, " ", ".").' ₫'}}</p>
									</td>
								</tr>
							</tbody>
						  </table>
					</div>
				</div>
				<?php $status = $order_info->OrderStatus ?>
				<?php if($status != "Đã hủy" && $status != "Đang giao hàng" && $status != "Đã giao cho đơn vị vận chuyển" && $status != "Giao hàng thành công"){?>
				<button type="button" style="height:40px;width:150px;float:right;font-size: 14px;" class="btn btn-warning">
					<a href="javascript:void(0)" style="text-decoration:none; color: white;" class="button-huy-don-hang">Hủy đơn hàng</a> 
				</button>
				<?php } ?>
				<!--  -->
				<!-- Trigger/Open The Modal -->
				<div id="myModal" class="modal">
					<div class="modal-content" style="width:50%">
						<span class="close" style="text-align: right; background-color:white">&times;</span>
						<div class="row" style="margin:10px;">
							<div class ="col-12">
								<form>
									@csrf
									<div class="product-info"></div>
								</form>
								<p>1. Đánh giá của bạn về sản phẩm này</p>
								<div class="star-wrapper">
									<a href="javascript:void(0)" class="fa fa-star s1"></a>
									<a href="javascript:void(0)" class="fa fa-star s2"></a>
									<a href="javascript:void(0)" class="fa fa-star s3"></a>
									<a href="javascript:void(0)" class="fa fa-star s4"></a>
									<a href="javascript:void(0)" class="fa fa-star s5"></a>
								</div>
								<p>2. Tiêu đề của nhận xét</p>
								<input type="text" class="Title" placeholder="Nhập tiêu đề nhận xét (không bắt buộc)" style="width: 100%;margin-bottom:20px;font-size:16px; padding:10px;">
								<p>3. Viết nhận xét của bạn vào bên dưới</p>
								<textarea rows="4" class="Content" placeholder="Nhận xét của bạn về sản phẩm này" style="width: 100%; margin-bottom:20px;resize: none;font-size:16px;padding:10px;" required></textarea>  
							</div>
							<button class="btn btn-warning btn-gui-danh-gia" style="color:white;margin:auto; height:40px;width:150px;font-size: 14px;">Gửi đánh giá</button>
						</div>
					</div>
				</div>
				<!--  -->
				<p><a href="{{URL::to('/my-orders')}}"><< Quay lại đơn hàng của tôi</a></p>
			</div>
            </div>
        </div>
		<a href="{{URL::to('/add-rating')}}"> Hello</a>
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
.modal-content p{
	color:black;
	font-size: 16px;
	line-height: 1.5;
}
</style>	

<!-- Thêm cái này vào Fw-->
<style>
	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  border-radius: 10px;
  box-shadow: 2px 2px 6px 0px rgb(0 0 0 / 10%);
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

<script>
	var modal = document.getElementById("myModal");
	var btn = document.getElementsByClassName("myBtn");
	var span = document.getElementsByClassName("close")[0];
	span.onclick = function() {
		modal.style.display = "none";
	}
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	var ProductId = 0;
	$(document).ready(function(){
		$('.btn-danh-gia').click(function(){
			// Reset form
			var parent = $("#myModal");
			parent.find('.Title').val("");
			parent.find('.Content').val("");

			var _token = $('input[name="_token"]').val();
			ProductId = $(this).parents('tr').find('.ProductId').val();
			modal.style.display = "block";
			$.ajax({
				url:"{{url('/get-product')}}",
				method: "GET",
				data:{ProductId: ProductId, _token:_token},
				success:function(data){
					$('.product-info').html(data);
				},
				error:function(data)
				{
					alert('Lỗi');
				}
			});
		});	
		$('.btn-gui-danh-gia').click(function(){
			$.ajax({
				url:"{{url('/is-rating-exit')}}",
				method: "GET",
				data:{ProductId: ProductId},
				success:function(data){
					if(data == "1")
					{
						swal("Bạn đã đánh giá cho sản phẩm này rồi!");
					}
					else{
						var parent = $(this).parents('.modal-content');
						var Title = parent.find('.Title').val();
						var Content = parent.find('.Content').val();
						var Rating = 0;
						if(parent.find('.s1').css("color") == "rgb(255, 215, 0)")
						{
							Rating = 5;
						}
						else
						{
							if(parent.find('.s2').css("color") == "rgb(255, 215, 0)")
							{
								Rating = 4;
							}
							else{
								if(parent.find('.s3').css("color") == "rgb(255, 215, 0)")
								{
									Rating = 3;
								}
								else
								{
									if(parent.find('.s3').css("color") == "rgb(255, 215, 0)")
									{
										Rating = 2;
									}
									else
										Rating = 1;
								}
							}
						}
						$.ajax({
							url:"{{url('/add-rating')}}",
							method: "GET",
							data:{ProductId: ProductId, Title: Title, Content: Content, Rating: Rating},
							success:function(data){
								modal.style.display = "none";
								swal({
									text: "Cảm ơn bạn đã đánh giá sản phẩm!",
									icon: "success",
								});
							},
							error:function(data)
							{
								alert("Lỗi");
							}
						}); 
					}
				},
				error:function(data)
				{
					alert("Lỗi");
				}
			}); 

			
		});
		
	});
</script>
<style>
	.star-wrapper {
  direction: rtl;
}
.star-wrapper a {
  font-size: 4em;
  color: #DEDDE3;
  text-decoration: none;
  transition: all 0.5s;
  margin: 4px;
}
.star-wrapper a:hover {
  color: gold;
  transform: scale(1.3);
}
.s1:hover ~ a {
  color: gold;
}
.s2:hover ~ a {
  color: gold;
}
.s3:hover ~ a {
  color: gold;
}
.s4:hover ~ a {
  color: gold;
}
.s5:hover ~ a {
  color: gold;
}
.wraper {
  position: absolute;
  bottom: 30px;
  right: 50px;
}
</style>
<script>
	$(document).ready(function(){
		$('.s1').click(function(){ // 5 sao
			$('.star-wrapper a').css("color", "gold");
		});

		$('.s2').click(function(){ // 4 sao
			var parent = $(this).parents('.star-wrapper');
			parent.find('.s1').css("color", "#DEDDE3");
			parent.find('.s2').css("color", "gold");
			parent.find('.s3').css("color", "gold");
			parent.find('.s4').css("color", "gold");
			parent.find('.s5').css("color", "gold");
		});

		$('.s3').click(function(){ // 3 sao
			var parent = $(this).parents('.star-wrapper');
			parent.find('.s1').css("color", "#DEDDE3");
			parent.find('.s2').css("color", "#DEDDE3");
			parent.find('.s3').css("color", "gold");
			parent.find('.s4').css("color", "gold");
			parent.find('.s5').css("color", "gold");
		});

		$('.s4').click(function(){ // 2 sao
			var parent = $(this).parents('.star-wrapper');
			parent.find('.s1').css("color", "#DEDDE3");
			parent.find('.s2').css("color", "#DEDDE3");
			parent.find('.s3').css("color", "#DEDDE3");
			parent.find('.s4').css("color", "gold");
			parent.find('.s5').css("color", "gold");
		});

		$('.s5').click(function(){ // 1 sao
			var parent = $(this).parents('.star-wrapper');
			parent.find('.s1').css("color", "#DEDDE3");
			parent.find('.s2').css("color", "#DEDDE3");
			parent.find('.s3').css("color", "#DEDDE3");
			parent.find('.s4').css("color", "#DEDDE3");
			parent.find('.s5').css("color", "gold");
		});


	});
</script>
<!-- End Fw -->
<script>
	$(document).ready(function(){
		$('.button-huy-don-hang').click(function(){
			// alert("Hi");
			var OrderId = $('.OrderId').val();
			var thisbutton = $(this);
			swal({
				title: "Xác nhận",
				text: "Bạn có chắc muốn hủy hóa đơn này không?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
				if (willDelete) {
					swal("Hãy cho ITGoShop biết lý do nhé!", {
						content: "input",
					})
					.then((value) => {
						$.ajax({
							url:"{{url('/cancel-order')}}",
							method: "GET",
							data:{OrderId: OrderId},
							success:function(data){
								
								swal("Hủy đơn hàng thành công!", {
									icon: "success",
								})
								.then((willDelete) => {
  								if (willDelete) {
									thisbutton.parent().remove();
									$('.OrderStatus').text('Đã hủy');
									$('html, body').animate({scrollTop: $('.bread-inner').offset().top}, 500);
									
								}
								});
								
							},
							error:function(data)
							{
								alert("Lỗi");
							}
						});
					});
					
				} 
			});
		});
	});
	
</script>
	<!-- Map Section -->
@endsection