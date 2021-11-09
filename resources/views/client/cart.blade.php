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
							<li class="active"><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9">
					<!-- Shopping Summery -->
					<?php
						$content = Cart::content();
						$number_product = Cart::count();
					?>
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th> </th>
								<th>Tên sản phẩm</th>
								<th class="text-center">Đơn giá</th>
								<th class="text-center">Số lượng</th>
								<th class="text-center">Tổng tiền</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							@if($number_product == 0)
								<tr>
                                    <td colspan="6">
                                        <img style="display: block; width: auto; height: 250px; margin-left: auto; margin-right: auto; " src="{{URL::to('public/client/Images/empty-cart.png')}}">
                                    </td>
                                </tr>
							@else
								@foreach($content as $item)
								<tr>
									<td class="image" data-title="No" style="width: 60px; height: 60px;"><img style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$item->options->image)}}" alt="#"></td>
									<td class="product-des" data-title="Description">
										<p class="product-name"><a href="{{URL::to('/product-detail/'.$item->id)}}">{{$item->name}}</a></p>
									</td>
									<td class="price" data-title="Price" data-value="{{$item->price}}" ><span>{{number_format($item->price, 0, " ", ".").' ₫'}}</span></td>
									<td class="qty" data-title="Qty"><!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[{{$item->id}}]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[{{$item->id}}]" id="{{$item->rowId}}" class="input-number"  data-min="1" data-max="100" value="{{$item->qty}}">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$item->id}}]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</td>
									

									<td class="total-amount" data-title="Total">
										<?php $subtotal = $item->price * $item->qty; ?>
										<span class="thanh-tien" data-value="{{$subtotal}}">
											<?php echo number_format($subtotal, 0, " ", ".").' ₫'; ?>
										</span>
									</td> 

									<!-- <td class="action" data-title="Remove">
										<a href="{{URL::to('/remove-item/'.$item->rowId)}}"><i class="ti-trash remove-icon"></i></a>
									</td> -->
									<!-- //onClick="removeItem(this.id) -->
									<td class="action" data-title="Remove">
										<button id = "{{$item->rowId}}" class="delete-button"><i class="ti-trash remove-icon"></i></button>							
									</td>

								</tr>
								@endforeach
							@endif
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>

				<div class="col-6 col-lg-3">
					<?php $CustomerId = Session::get('CustomerId'); ?>
					@if($CustomerId)
						<div style="padding: 20px; background-color: white; width: 280px;">
							<ul>
								<li style="margin-bottom: 3px;"><b>Giao tới</b><span style="float:right;"><a href="#">Thay đổi</a></span></li>
								<li style="font-size: 16px; margin: 3px 0px;"><b>Tạ Quang Huy</b>  |  <b>0365990290</b></li>
								<li><p>220/17 khu phố 9 phường Tam Hiệp thành phố Biên Hòa tỉnh Đồng Nai</p></li>
							</ul>
						</div>
					@endif

                    <div class="total-amount">
                        <div class="right" style="padding: 20px; width: 280px; background-color: white; position: absolute; top:0px">
                            <ul>
								<li>Tạm tính<span id="tam-tinh">{{(Cart::subtotal(0, ',', '.')).' ₫'}}</span></li> 
								
								<li>Giảm giá<span>0 ₫</span></li>
								<li class="last">Tổng cộng<span id="tong-cong">{{(Cart::total(0, ',', '.')).' ₫'}}</span></li>
                            </ul>
                            <div class="button5">
									<a href="{{URL::to('/checkout')}}" class="btn">Thanh Toán</a>
								<a href="{{URL::to('/')}}" class="btn">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right" style="height:200px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
		
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Miễn phí vận chuyển</h4>
						<p>Đơn đặt hàng trên 1.000.000VND</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Miễn phí đổi trả</h4>
						<p>Trong vòng 30 ngày</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Bảo mật tuyệt đối</h4>
						<p>100% thanh toán an toàn</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Giá tốt nhất</h4>
						<p>Quà tặng và ưu đãi hấp dẫn</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
@endsection