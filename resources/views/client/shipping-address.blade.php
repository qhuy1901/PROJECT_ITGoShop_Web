@extends('client_layout')
@section('client_content')
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="blog-single.html">Giỏ hàng<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Thanh toán<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="blog-single.html">Địa chỉ giao hàng</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
<section>
	<div class="container">
		<div class ="row" style="margin: 20px 0px 0px 0px;">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"></i>Địa chỉ giao hàng</h4></div>
				<div class="panel-body">
					<p style="padding-bottom: 10px;">Chọn địa chỉ giao hàng có sẵn bên dưới:</p>
					
					<div class="panel panel-default">
						<div class="panel-body" style="border: 1px dashed;">
							<p style="float:right; color: red;"><i>Mặc đinh</i></p>
							<h5 style="line-height: 1.8;">Tạ Quang Huy</h5>
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
						<div class="panel-body">
							
							<h5 style="line-height: 1.8;">Tạ Quang Huy</h5> 
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
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$(".them-dia-chi-moi").click(function(){
			if($("#form-dia-chi-moi").length < 1)
			{
				var noidung ="<div class='panel panel-default' id='form-dia-chi-moi'><div class='panel-heading' style='background-color: #77ACF1;'><h4 style='color: white;'></i>Thông tin địa chỉ giao hàng</h4></div><div class='panel-body'> <div class='row'> <div class='col-sm-6'>";
				noidung += "<div class='form-group'>";
				noidung += "<label for='exampleInputEmail1'>Tên người nhận</label><input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Nhập tên người nhận'></div>";
				noidung += "<div class='form-group'>";
				noidung +=	"<label for='exampleInputEmail1'>Điện thoại di dộng</label><input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Nhập số điện thoại'></div>";
				noidung += "<small><i>Để nhận hàng thuận tiện hơn, bạn vui lòng cho ITGoShop biết loại địa chỉ.</i></small>";
				noidung += "<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='option1'> <label class='form-check-label' for='inlineRadio1'> Nhà riêng/ Chung cư</label></div>";
				noidung += "<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='option2'><label class='form-check-label' for='inlineRadio2'>  Cơ quan/ Công ty</label></div>";
				noidung += "<div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups' style='margin-top: 4px;'>"
				noidung += "<div class='btn-group mr-2' role='group' aria-label='First group'> <button  type='button' class='button-huy-bo' style='margin-right: 10px; padding: 15px; background-color: white;' >Hủy bỏ</button></div>";
				noidung += "<div class='btn-group mr-2' role='group' aria-label='Second group'> <button type='button' style='padding: 15px; background-color: #333333; color: white;'>Giao đến địa chỉ này</button></div></div>";
  				noidung += "</div><div class='col-sm-6'>";
				noidung +="<label for='exampleInputEmail1'>Tỉnh/Thành phố</label><select class='form-control'><option>--- Chọn tỉnh Tỉnh/Thành phố ---</option></select>";
				noidung +="<label for='exampleInputEmail1'>Quận/Huyện</label><select class='form-control'><option>--- Chọn tỉnh Quận/Huyện ---</option></select>";
				noidung +="<label for='exampleInputEmail1'>Phường/Xã</label><select class='form-control'><option>--- Chọn tỉnh Phường/Xã---</option></select>";
				noidung += "<div class='form-group'><label for='exampleInputEmail1'>Địa chỉ</label><textarea class='form-control' id='exampleFormControlTextarea1' rows='2' placeholder='Ví dụ: 14, Nguyễn Thị Minh Khai'></textarea></div>";
				noidung += "</div></div></div></div>";
				$(this).parent().append(noidung);
			}
		}),


		$('body').on('click', '.button-huy-bo', function() {
			$("#form-dia-chi-moi").remove();
		});
	});
</script>
@endsection