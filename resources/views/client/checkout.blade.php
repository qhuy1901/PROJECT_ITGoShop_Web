@extends('client_layout')
@section('title', 'ITGoShop - Hệ thống Máy tính và Phụ kiện')
@section('client_content')
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>


<section>
			<?php
				$content = Cart::content();
				$number_product = Cart::count();
			?>
			<div class="container">
				<div class ="col-lg-12" style="margin: 20px 0px 0px 0px; padding-right: 0px;padding-left: 0px;">
					<div class="panel panel-default">
						<div class="panel-body" style=" background-color: #77ACF1; color:white ; font-size: 14px;">
							Do ảnh hưởng của dịch Covid-19, một số khu vực có thể nhận hàng chậm hơn dự kiến. <br> 
							ITGoShop đang nỗ lực giao các đơn hàng trong thời gian sớm nhất. Cám ơn sự thông cảm của quý khách!
						</div>
					  </div>
				</div>
				<!-- Nếu khách hàng đã có địa chỉ mặc định thì thanh toán luôn nếu ko thì phải thêm mới địa chỉ giao hàng -->
				@if($default_shipping_address)
				<form action="{{URL::to('/create-order')}}" method="POST">
					{{csrf_field()}}
					<div class ="row">
						<div class="col-lg-8">
							<div class="panel panel-default">
								<div class="panel-heading" style="background-color: #77ACF1; "><h4 style="color: white;"><b>Thông tin đơn hàng</b></h4></div>
								<div class="panel-body">
									<table>
										<thead style="font-size: 16px;">
											<tr>
												<th colspan="2"><b>Sản phẩm</b></th>
												<th><b>Đơn giá</b></th>
												<th><b>Số lượng</b></th>
												<th><b>Thành tiền</b></th>
											</tr>
										</thead>
										
										<tbody>
											@foreach($content as $item)
											<tr style="font-size: 14px;">
												<td style=" height:80px">
													<img style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$item->options->image)}}" alt="">
												</td>
												<td>{{$item->name}}</td>
												<td>{{number_format($item->price, 0, " ", ".").' ₫'}}</td>
												<td style="text-align:center">x{{$item->qty}}</td>
												<td><?php $subtotal = $item->price * $item->qty;  echo number_format($subtotal, 0, " ", ".").' ₫'; ?></td>
											</tr>
											@endforeach
										</tbody>
									</table>
									
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Chọn hình thức thanh toán</b></h4></div>
									<div class="panel-body" style="font-size: 14px;">
										<div class="form-group cheque">
											<div class="ps-radio">
											<input class="form-control" type="radio" id="rdo01" name="payment" checked>
											<label for="rdo01"><img src="{{URL::to('public/client/Images/thanh-toan-khi-nhan-hang.PNG')}}" alt="#">Thanh toán khi giao hàng</label>
											</div>
										</div>
										<div class="form-group paypal">
											<div class="ps-radio ps-radio--inline">
											<input class="form-control" type="radio" name="payment" id="rdo02">
											<label for="rdo02"><img src="{{URL::to('public/client/Images/thanh-toan-zalopay.PNG')}}" alt="#">Thanh toán bằng thẻ</label>
											</div>
											
											
										</div>
									</div>
								</div>
							<button type="submit" class="btn btn-primary btn-lg btn-dat-mua" style="width:320px;font-size:20px; background-color: #000; ">ĐẶT MUA</button>
							<p style="margin: 7px 0px;"><i>(Xin vui lòng kiểm tra lại đơn hàng trước khi Đặt Mua)</i></p>
						</div>

						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-body">
									<button type="button" style="float:right; padding: 6px; background-color: white;"><a href="{{URL::to('/show-shipping-address')}}" style="font-size:11px">Sửa</a></button>
									<h4><div style="margin-bottom:20px;"> <i class="fa fa-map-marker" aria-hidden="true" ></i> <b>Địa chỉ giao hàng </b>  </div></h4>
									<div></div>
									<hr>
									<input type="text" id="ShippingAddressId" name="ShippingAddressId" value="{{$default_shipping_address->ShippingAddressId}}" hidden>
									<p><b>{{$default_shipping_address->ReceiverName}}</b></p>
									<p>{{$default_shipping_address->Address. ", " .$default_shipping_address->xaphuongthitran. ", " .$default_shipping_address->quanhuyen. ", " .$default_shipping_address->tinhthanhpho}}</p>
									<p>Điện thoại: {{$default_shipping_address->Phone}}</p>

								</div>
								
							</div>
							
							<div class="panel panel-default">
								<div class="panel-body">
									<button type="button" style="float:right; padding: 6px; background-color: white;"><a href="{{URL::to('/show-cart')}}" style="font-size:11px">Sửa</a></button>
									<h4><b>Đơn hàng </b></h4>
									<p><i>{{$number_product}} sản phẩm</i></p>
									<hr>
									<p style="float:right">{{(Cart::subtotal(0, ',', '.')).' ₫'}}</p>
									<p>Tạm tính: </p> 
									<p style="float:right">0 ₫</p>
									<p>Phí vận chuyển: </p> 
									<p style="float:right; color: red;">- 0 ₫</p>
									<p>Giảm giá: </p> 
									<p style="float:right; color: red; font-size: 20px">{{(Cart::total(0, ',', '.')).' ₫'}}</p> 
									<p><b style="color:black">Thành tiền: </b> </p>  
									<p style="float:right;"><i>(Đã bao gồm VAT nếu có)</i></p> 
								</div>
							</div>
						</div>
					</div>
				</form>
				@else
				<div class="row">
					<div class="col-lg-12">
						<form action="{{URL::to('/add-shipping-address')}}" method="post">
						{{ csrf_field() }}
							<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Vui lòng điền thông tin địa chỉ giao hàng</b></h4></div>
							<div class="panel-body"> 
								<div class="row"> 
									<div class="col-sm-5">
										<div class="form-group">
											<p><b>Tên người nhận</b></p>
											<input type="text" class="form-control" name="ReceiverName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên người nhận">
										</div>
										<div class="form-group">
											<p><b>Điện thoại di động</b></p>
											<input type="text" class="form-control" name="Phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại">
										</div>
										<p><i>Để nhận hàng thuận tiện hơn, bạn vui lòng cho ITGoShop biết loại địa chỉ.</i> </p><br>
										<div class="ps-radio ps-radio--inline">
											<input class="form-control" type="radio" id="rdo01" name="ShippingAddressType" value="Nhà riêng/ Chung cư" checked>
											<label for="rdo01" style="font-size:14px">Nhà riêng/ Chung cư</label>
										</div>
										<div class="ps-radio ps-radio--inline">
											<input class="form-control" type="radio" name="ShippingAddressType" id="rdo02" value="Nhà riêng/ Cơ quan/ Công ty">
												<label for="rdo02" style="font-size:14px">Cơ quan/ Công ty</label>
										</div>		
									</div>
								
									<div class="col-sm-7">
										<div class="row">
											<div class="col-sm-6">
												<p><b>Tỉnh/Thành phố</b></p>
												<select class="form-control select-tinhthanhpho" style="height:35px" name="tinhthanhpho"> 
													<option>--- Chọn Tỉnh/Thành phố ---</option>
													@foreach($all_tinhthanhpho as $key => $tinhthanhpho)
														<option value="{{$tinhthanhpho->matp}}">{{$tinhthanhpho->name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-sm-6">
												<p><b>Quận/Huyện</b></p>
												<select class="form-control select-quanhuyen" style="height:35px" name="quanhuyen">
													<option>--- Chọn Quận/Huyện ---</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<p style="margin-top:13px"><b>Phường/Xã</b></p>
												<select class="form-control select-xaphuongthitran" style="height:35px"  name="xaphuongthitran">
													<option>--- Chọn Phường/Xã ---</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<p style="margin-top:13px"><b>Địa chỉ</b></p>
												<textarea class="form-control" name="diachi" id="exampleFormControlTextarea1" rows="2" placeholder="Ví dụ: 14, Nguyễn Thị Minh Khai"></textarea>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups' style='margin-top: 4px;'>
									<div class='btn-group mr-2' role='group' aria-label='First group'> 
										<button  type='button' style='margin-right: 10px; padding: 15px; background-color: white;font-size: 14px;'> <a href="{{URL::to('/show-cart')}}">Hủy bỏ</a></button>
									</div>
									<div class='btn-group mr-2' role='group' aria-label='Second group'> 
										<button type='submit' style='padding: 15px; background-color: #333333; color: white;font-size: 14px;'>Giao đến địa chỉ này</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				@endif
			</div>
		</section>	
		<script>
			$(document).ready(function(){
				$('.btn-dat-mua').click(function(){
					swal("Đặt hàng hàng công! Cảm ơn quý khách.", {
							icon: "success",
							});
				// 	swal({
				// 	title: "Xác nhận",
				// 	text: "Bạn chắc chắn muốn đặt hàng chứ?",
				// 	icon: "info",
				// 	buttons: true,
				// 	dangerMode: true,
				// })
				// .then((willDelete) => {
				// if (willDelete) {
				// 	var ShippingAddressId = $('#ShippingAddressId').val();
				// 	$.ajax({
				// 		url: '{{URL::to('/create-order')}}',
				// 		methed:"POST",
				// 		data:{ShippingAddressId: ShippingAddressId},
				// 		success:function(data)
				// 		{
				// 			swal("Đặt hàng hàng công! Cảm ơn quý khách.", {
				// 			icon: "success",
				// 			});
				// 			// var url = "{{URL::to('/show-order-detail/data')}}";
				// 			// alert(url);
				// 			// window.location.href = "{{URL::to('/show-order-detail/" + data + "')}}";
				// 			window.location.href = "{{URL::to('/my-orders')}}";
				// 		},
				// 		error:function(data)
				// 		{
				// 			alert('Lỗi');
				// 		}
				// 	});
					
				// } else {
				// 	swal("Your imaginary file is safe!");
				// }
				// });
				});
				
			});
		</script>
		<a href="{{URL::to('/create-order')}}">HiHI</a>
@endsection