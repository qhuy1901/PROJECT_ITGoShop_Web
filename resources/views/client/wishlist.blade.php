@extends('client_layout')
@section('client_content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="product-detail.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="bloggrid.php">Wish List</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  <?php   
            $userId = Session::get('UserId');
            $avt = Session::get('UserImage');
	?>
  <div class="row gutters-sm pt-20 pl-60 pr-60 pb-80">
  <div class="col-md-3 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{URL::to('public/images_upload/user/'.$avt)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
						        <?php $LastName=Session::get('LastName'); $FirstName=Session::get('FirstName');?>
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
						<a href="{{URL::to('/profile/'.$userId)}}" style="color:#333; font-weight:500;">Tài khoản</a>
					</h4>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0" >
						<i  style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-heart-o"  ></i>
						<?php
                $UserId= Session::get('UserId');
                if($UserId) { ?>
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
            
            <div class=" col-md-9">
              <?php $number_wishlist = count($wishlist); ?>
              <h1 style="margin-bottom:20px">Danh sách sản phẩm yêu thích ({{$number_wishlist}})</h1>
              @foreach($wishlist as $key => $item)
              <div class="card" style="margin-bottom:15px; padding: 30px">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                     <img style="margin: auto; max-width: 250px; max-height: 250px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$item->ProductImage)}}" alt="#">
                    </div>
                    <div class="col-sm-8">
                      <div class="button" style="float:right">
                        <a href="javascript:void(0)" class="button-xoa-wishlist"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <input type="text" class="ProductId" value="{{$item->ProductId}}" hidden>
                      </div>
                      <h2 style="margin-top:30px"><a href="{{URL::to('/product-detail/'.$item->ProductId)}}" style="text-decoration:none;">{{$item->ProductName}}</a></h2>
                      <p style="margin-top:15px; font-size:16px; color: red;">{{number_format($item->Price, 0, " ", ".").' ₫'}}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
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

<script>
  $(document).ready(function(){
    $('.button-xoa-wishlist').click(function(){
      var ProductId = $(this).parent().find('.ProductId').val();
      var thisbox = $(this).parents('.card');
      $.ajax({
							url:"{{url('/remove-product-from-wishlist')}}",
							method: "GET",
							data:{ProductId: ProductId},
							success:function(data){
								swal({
                  title: "Thông báo",
                  text: "Đã xóa sản phẩm danh sách yêu thích!",
                  icon: "success",
                  buttons: "OK",
                })
                thisbox.remove();
							},
							error:function(data)
							{
								alert("Lỗi");
							}
						});
    });
  });
</script>
@endsection