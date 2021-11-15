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
    
  <div class="row gutters-sm pt-20 pl-60 pr-60 pb-80">
            <div class="col-md-3 mb-4 pt-45">
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
                      <a href="{{URL::to('/wishlist')}}" style="color:#333; font-weight:500;">Sản phẩm yêu thích</a>
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
										<div class="row">
											<div class=" col-xl-4 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img" style="width: 250px; height: 200px;">
														<a href="product-detail.html">
															<img class="default-img" src="https://via.placeholder.com/550x750" style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto; " alt="#">
															<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem chi tiết</span></a>
																<a title="Wishlist" href="#"><i class="fa fa-heart "></i><span>Bỏ thích</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-detail.html">Women Pant Collectons</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
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