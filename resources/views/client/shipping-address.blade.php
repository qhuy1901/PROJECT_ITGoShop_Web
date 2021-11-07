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
							<p style="float:right; color: red;"><i>Mặc đinh</i></p>
							<h4 style="line-height: 1.8; "><b>Tạ Quang Huy</b></h4>
							<p>Địa chỉ: 220/17A Khu phố 9, Phường Tam Hiệp, Thành phố Biên Hòa, Đồng Nai Việt Nam</p>
							<p>Điện thoại: 0365990290</p>
							<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 4px;">
								<div class="btn-group mr-2" role="group" aria-label="First group">
								  <button type="button" style="padding: 15px; background-color: #333333; color: white;">Giao đến địa chỉ này</button>
								</div>
								<div class="btn-group mr-2" role="group" aria-label="Second group">
									<button type="button" style="padding: 15px; background-color: white;">Sửa</button>
								 
								</div>
								<div class="btn-group" role="group" aria-label="Third group">
									<button type="button" style="padding: 15px; background-color: white;">Xóa</button>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body" style="font-size: 14px">
							<h4 style="line-height: 1.8;"><b>Tạ Quang Huy</b></h4> 
							<p>Địa chỉ: 220/17A Khu phố 9, Phường Tam Hiệp, Thành phố Biên Hòa, Đồng Nai Việt Nam</p>
							<p>Điện thoại: 0365990290</p>
							<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 4px;">
								<div class="btn-group mr-2" role="group" aria-label="First group">
								  <button type="button" style="padding: 15px; background-color: #333333; color: white;">Giao đến địa chỉ này</button>
								</div>
								<div class="btn-group mr-2" role="group" aria-label="Second group">
									<button type="button" style="padding: 15px; background-color: white;">Sửa</button>
								 
								</div>
								<div class="btn-group" role="group" aria-label="Third group">
									<button type="button" style="padding: 15px; background-color: white;">Xóa</button>
								</div>
							</div>
						
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			<p style="padding: 20px 0px;">Bạn muốn giao hàng đến địa chỉ khác? <a href="javascript:void(0)" class="them-dia-chi-moi" style="color: #77ACF1;">Thêm địa chỉ giao hàng mới</a></p>
			<div class="panel panel-default" id="form-dia-chi-moi">
				<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Thông tin địa chỉ giao hàng</b></h4></div>
				<div class="panel-body"> 
					<div class="row"> 
						<div class="col-sm-5">
							<div class="form-group">
								<p><b>Tên người nhận</b></p>
								<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên người nhận">
							</div>
							<div class="form-group">
								<p><b>Điện thoại di động</b></p>
								<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại">
							</div>
							<p><i>Để nhận hàng thuận tiện hơn, bạn vui lòng cho ITGoShop biết loại địa chỉ.</i> </p><br>
							<div class="ps-radio ps-radio--inline">
								<input class="form-control" type="radio" id="rdo01" name="payment" checked>
								<label for="rdo01" style="font-size:14px">Nhà riêng/ Chung cư</label>
							</div>
							<div class="ps-radio ps-radio--inline">
								<input class="form-control" type="radio" name="payment" id="rdo02">
									<label for="rdo02" style="font-size:14px">Cơ quan/ Công ty</label>
							</div>		
  						</div>
						
						<div class="col-sm-7">
							<div class="row">
								<div class="col-sm-6">
									<p><b>Tỉnh/Thành phố</b></p>
									<select class="form-control" id="select-tinhthanhpho" style="height:35px"> 
										<option>--- Chọn Tỉnh/Thành phố ---</option>
										@foreach($all_tinhthanhpho as $key => $tinhthanhpho)
											<option value="{{$tinhthanhpho->matp}}">{{$tinhthanhpho->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-sm-6">
									<p><b>Quận/Huyện</b></p>
									<select class="form-control" id="select-quanhuyen" style="height:35px">
										<option>--- Chọn Quận/Huyện ---</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<p style="margin-top:13px"><b>Phường/Xã</b></p>
									<select class="form-control" style="height:35px" id="select-xaphuongthitran">
										<option>--- Chọn Phường/Xã ---</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<p style="margin-top:13px"><b>Địa chỉ</b></p>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Ví dụ: 14, Nguyễn Thị Minh Khai"></textarea>
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
									<button type='button' style='padding: 15px; background-color: #333333; color: white;font-size: 14px;'>Giao đến địa chỉ này</button>
								</div>
							</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection