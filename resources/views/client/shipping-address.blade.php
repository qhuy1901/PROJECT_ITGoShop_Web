@extends('client_layout')
@section('client_content')

<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{URL::to('/show-cart')}}">Giỏ hàng<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="{{URL::to('/checkout')}}">Thanh toán<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{URL::to('/show-shipping-address')}}">Địa chỉ giao hàng</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
</div>
<section>
	<div class="container">
		<div class ="col-lg-12" >
			<div class="panel panel-default" style="margin: 20px 0px 0px 0px;">
				<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Địa chỉ giao hàng</b></h4></div>
				<div class="panel-body">
					<p style="padding-bottom: 10px;">Chọn địa chỉ giao hàng có sẵn bên dưới:</p>
					
					<div class="panel panel-default">
						<div class="panel-body" style="border: 1px dashed; font-size: 14px">
							<p style="float:right; color: red;"><i>Mặc định</i></p>
							<h4 style="line-height: 1.8; "><b>{{$default_shipping_address->ReceiverName}}</b></h4>
							<p>Địa chỉ: {{$default_shipping_address->Address. ", " .$default_shipping_address->xaphuongthitran. ", " .$default_shipping_address->quanhuyen. ", " .$default_shipping_address->tinhthanhpho}}</p>
							<p>Điện thoại: {{$default_shipping_address->Phone}}</p>
							<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 4px;">
								<div class="btn-group mr-2" role="group" aria-label="First group">
								  <button type="button" style="padding: 15px; background-color: #333333; color: white;">Giao đến địa chỉ này</button>
								</div>
								<div class="btn-group mr-2" role="group" aria-label="Second group">
									<button type="button" style="padding: 15px; background-color: white;">Sửa</button>
								 
								</div>
							</div>
						</div>
					</div>
					
					@foreach($shipping_address_list as $shipping_address)
					<div class="panel panel-default">
						<div class="panel-body" style="font-size: 14px">
							<h4 style="line-height: 1.8;"><b>{{$shipping_address->ReceiverName}}</b></h4> 
							<p>Địa chỉ: {{$shipping_address->Address. ", " .$shipping_address->xaphuongthitran. ", " .$shipping_address->quanhuyen. ", " .$shipping_address->tinhthanhpho}}</p>
							<p>Điện thoại: {{$shipping_address->Phone}}</p>
							<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 4px;">
								<div class="btn-group mr-2" role="group" aria-label="First group">
								  <button type="button" style="padding: 15px; background-color: #333333; color: white;">Giao đến địa chỉ này</button>
								</div>
								<div class="btn-group mr-2" role="group" aria-label="Second group">
									<button type="button" style="padding: 15px; background-color: white;">Sửa</button>
								 
								</div>
								<div class="btn-group" role="group" aria-label="Third group">
									<button type="button" class="button-xoa-dia-chi" style="padding: 15px; background-color: white;">Xóa</button>
									<input type="text" class="ShippingAddressId" value="{{$shipping_address->ShippingAddressId}}" hidden>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			
			<p style="padding: 20px 0px;">Bạn muốn giao hàng đến địa chỉ khác? <a href="javascript:void(0)" class="them-dia-chi-moi" style="color: #77ACF1;">Thêm địa chỉ giao hàng mới</a></p>
			<div class="panel panel-default" id="form-dia-chi-moi">
				<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Thêm địa chỉ giao hàng</b></h4></div>
					<form action="{{URL::to('/add-shipping-address')}}" method="post">
						{{ csrf_field() }}
						<div class="panel-body"> 
							<div class="row"> 
								<div class="col-sm-5">
									<div class="form-group">
										<p><b>Tên người nhận</b></p>
										<input type="text" class="form-control" id="exampleInputEmail1" name="ReceiverName" aria-describedby="emailHelp" placeholder="Nhập tên người nhận">
									</div>
									<div class="form-group">
										<p><b>Điện thoại di động</b></p>
										<input type="text" class="form-control" id="exampleInputEmail1" name="Phone" aria-describedby="emailHelp" placeholder="Nhập số điện thoại">
									</div>
									<p><i>Để nhận hàng thuận tiện hơn, bạn vui lòng cho ITGoShop biết loại địa chỉ.</i> </p><br>
									<div class="ps-radio ps-radio--inline">
										<input class="form-control" type="radio" id="rdo01" name="ShippingAddressType" value="Nhà riêng/ Chung cư" checked>
										<label for="rdo01" style="font-size:14px">Nhà riêng/ Chung cư</label>
									</div>
									<div class="ps-radio ps-radio--inline">
										<input class="form-control" type="radio" name="ShippingAddressType" id="rdo02"  value="Cơ quan/ Công ty">
										<label for="rdo02" style="font-size:14px">Cơ quan/ Công ty</label>
									</div>		
								</div>
								
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<p><b>Tỉnh/Thành phố</b></p>
											<select class="form-control" id="select-tinhthanhpho" name="tinhthanhpho" style="height:35px"> 
												<option>--- Chọn Tỉnh/Thành phố ---</option>
												@foreach($all_tinhthanhpho as $key => $tinhthanhpho)
													<option value="{{$tinhthanhpho->matp}}">{{$tinhthanhpho->name}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-sm-6">
											<p><b>Quận/Huyện</b></p>
											<select class="form-control" id="select-quanhuyen" name="quanhuyen" style="height:35px">
												<option>--- Chọn Quận/Huyện ---</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<p style="margin-top:13px"><b>Phường/Xã</b></p>
											<select class="form-control" style="height:35px" name="xaphuongthitran" id="select-xaphuongthitran">
												<option>--- Chọn Phường/Xã ---</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<p style="margin-top:13px"><b>Địa chỉ</b></p>
											<textarea class="form-control" id="exampleFormControlTextarea1" name="diachi" rows="2" placeholder="Ví dụ: 14, Nguyễn Thị Minh Khai"></textarea>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups' style='margin-top: 4px;'>
								<div class='btn-group mr-2' role='group' aria-label='First group'> 
									<button  type='button' class='button-huy-bo' style='margin-right: 10px; padding: 15px; background-color: white;font-size: 14px;' >Hủy bỏ</button>
								</div>
								<div class='btn-group mr-2' role='group' aria-label='Second group'> 
									<button type='submit' style='padding: 15px; background-color: #333333; color: white;font-size: 14px;'>Giao đến địa chỉ này</button>
								</div>
							</div>
						</div>
					</form>		
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
	$(document).ready(function(){
		$(".button-xoa-dia-chi").click( function(){
			var ShippingAddressId = $(this).parent().find('.ShippingAddressId').val();
			swal({
				title: "Xóa địa chỉ",
				text: "Bạn muốn xoá địa chỉ này ra khỏi sổ địa chỉ?",
				icon: "warning",
				buttons: ["Không", "Đồng ý"],
				dangerMode: true,
				})
				.then((willDelete) => {
				if (willDelete) {
					$(this).parent().parent().parent().parent().slideUp();
					$.ajax({
						url: '{{URL::to('/delete-shipping-address')}}',
						methed:"GET",
						data:{ShippingAddressId: ShippingAddressId},
						
						success:function(data)
						{
							swal("Đã xóa địa chỉ thành công!", 
							{
								icon: "success",
							});
						},
						error:function(data)
						{
							alert('Lỗi');
						}
					});
				} 
			});
		});
	});
</script>
@endsection