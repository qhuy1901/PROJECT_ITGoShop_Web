@extends('client_layout')
@section('title', $product_detail->ProductName)
@section('client_content')
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								{{csrf_field()}}
								<li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#">{{$product_detail->CategoryName}}  </a></li>
								<li  class="active"><i class="ti-arrow-right"></i></li>
								<li class="active"><a href="#">{{$product_detail->BrandName}} </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="ps-product--detail ">
						<div class="ps-container">
							<div class="row">
								<div class="col-lg-12 col-12">
									<div class="ps-product__thumbnail" style="height: 350px; width: 500px;" >
										<div class="ps-product__preview">
											<div class="ps-product__variants" >
												<div class="item" ><img src="{{URL::to('public/images_upload/product/'.$product_detail->ProductImage)}}" alt=""></div>
												@foreach($product_gallary as $key => $item)
												<div class="item"><img src="{{URL::to('/public/images_upload/product-gallary/'.$item->GallaryImage)}}" alt=""></div>
												@endforeach
											</div>
										</div>
										<div class="ps-product__image" style="max-height: 350px; max-width: 350px; width: auto; height: auto;">
											<div class="item"><img class="zoom" src="{{URL::to('public/images_upload/product/'.$product_detail->ProductImage)}}" alt="" data-zoom-image="{{URL::to('public/images_upload/product/'.$product_detail->ProductImage)}}"></div>
											@foreach($product_gallary as $key => $item)
												<div class="item"><img class="zoom"  src="{{URL::to('/public/images_upload/product-gallary/'.$item->GallaryImage)}}" alt=""></div>
											@endforeach
											<!-- <div class="item"><img class="zoom" src="{{URL::to('/public/client/Images/shoe-detail/2.jpg')}}" alt="" data-zoom-image="{{URL::to('/public/client/Images/shoe-detail/2.jpg')}}"></div> -->
											<!-- <div class="item"><img class="zoom" src="{{URL::to('/public/client/Images/shoe-detail/3.jpg')}}" alt="" data-zoom-image="{{URL::to('/public/client/Images/shoe-detail/3.jpg')}}"></div> -->
										</div>
									</div>
									<div class="ps-product__thumbnail--mobile">
										<div class="ps-product__main-img"><img src="{{URL::to('public/images_upload/product/'.$product_detail->ProductImage)}}" alt=""></div>
										<div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
											@foreach($product_gallary as $key => $item)
												<img src="{{URL::to('/public/images_upload/product-gallary/'.$item->GallaryImage)}}" alt="">
											@endforeach
										<!-- <img src="{{URL::to('/public/client/Images/shoe-detail/1.jpg')}}" alt="">
											<img src="{{URL::to('/public/client/Images/shoe-detail/2.jpg')}}" alt="">
											<img src="{{URL::to('/public/client/Images/shoe-detail/3.jpg')}}" alt=""> -->
										</div>
									</div>
									<div class="ps-product__info" style="padding-left: 0px;">
												<form action="{{URL::to('/save-cart')}}" method="POST" style="max-width:620px;">
													{{ csrf_field() }}
													<h2 class="blog-title">{{$product_detail->ProductName}}</h2>
													
													<div class="blog-meta" style="padding-top:30px">
														<span class="author">
															<!--if(product->Rating == 0)
																<a><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>Chưa có đánh giá</a>	
															else
																<a>
																i = 0;
																for(i; i < product->Rating; $i++)
																	<i class="fa fa-star-o"></i>
																endfor
																product->Rating</a>	
															endif-->
															<a><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>Chưa có đánh giá</a>	
															<a><i class="fa fa-shopping-cart"></i>Đã bán {{$product_detail->Sold}}</a>
															@if($product_detail->Quantity < 10)
																<a><i class="fa fa-archive"></i>Chỉ còn lại {{$product_detail->Quantity}} sản phẩm</a>
															@else
																<a><i class="fa fa-archive"></i>Còn {{$product_detail->Quantity}} sản phẩm</a>
															@endif
														</span>
													</div>
													<div class="content">
														<div class="blog-meta">
															<h1 style="color:red; background-color:#FAFAFA;padding: 25px;font-weight: bold; ">
																<!-- Gía sản phẩm -->			 
																{{number_format($product_detail->Price).' '.' ₫'}}
																					<sub style="color:black; font-size:15px "> 
																						<!--  Phần giảm giá --> 
																						<del>{{number_format($product_detail->Price + $product_detail->Price * $product_detail->Discount / 100 ).' '.' ₫'}}</del> 
																						<span class="o-giam-gia">-{{$product_detail->Discount}}% </span> 
																					</sub>										
															</h1>
														</div>
														<div class="single-widget get-button">
																	<div class="content">
																			<p>Số lượng: <input name="quantity" type="number" min="1" value="1" size="4" style="width:50px"></p> 
																			<div class="button">
																				<button type="submit" class="btn">
																					Thêm vào giỏ hàng
																				</button>
																			</div>
																			
																			<input name="ProductId" type="hidden" class="input_product_id" value="{{$product_detail->ProductId}}">
																	</div>
														</div>
													</div>
												</form>
									</div>
								</div>		
							</div>
						</div>
						
					</div>
					
					<div class="col-lg-12 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="blog-detail">
								<form action="{{URL::to('/save-cart')}}" method="POST">
									{{ csrf_field() }}
									<h2 class="blog-title">Chi Tiết Sản Phẩm</h2>
									
									<div class="content">
										<!-- Nội dung sản phẩm -->
										<div class="blog-meta">
											<p>{!!$product_detail->Content!!}</p> <!-- Thêm !! để dataa ko bị lỗi nếu data đã được styling-->
										</div>
											<!-- End Nội dung sản phẩm -->
											
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-12">
									<div class="comments">
										<h3 class="comment-title" >
											<a style="font-weight: bold; text-transform:none">Đánh giá - Nhận xét từ khách hàng</a>
										</h3>
										@if(count($rating_list) > 0)
										<div class="card" style="margin-bottom:20px">
											<div class="card-body" style="margin:20px">
												<?php $avg_rating = round($avg_rating, 1)?>
												<b style="font-size:30px">{{$avg_rating}}</b>
												<div class="star-wrapper" style="display: inline-block; margin-left:60px;">
															@if($avg_rating > 4.5) <!-- 5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 4) <!-- 4.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star-half-o s1" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 3.5) <!-- 4 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 3) <!-- 3.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star-half-o s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 2.5) <!-- 3 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 2) <!-- 2.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star-half-o s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 1.5) <!-- 2 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($avg_rating > 1) <!-- 1.5 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star-half-o s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@else <!-- 1 sao -->
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@endif			
												</div>
												<p style="font-size:10px" >{{count($rating_list)}} đánh giá</p>

												<hr style="height:0.1px;border:none;margin: 20px 0px">
												@foreach($rating_list as $key => $item)
												<div class="row" style="padding: 20px 0px;">
													<div class="col-5">
														<?php $userImage = $item->UserImage;
															if($userImage == '')
															{
																$userImage = 'default-user-icon.png';
															}?>
														<img src="{{URL::to('public/images_upload/user/'.$userImage)}}" style="margin-right:30px; max-width: 100px; max-height: 70px; width: auto; height: auto; border-radius:100%" class="float-left" alt="#">
														<div class="o-comment">
															<H4>{{$item->LastName}} {{$item->FirstName}}</H4>
															<?php date_default_timezone_set("Asia/Ho_Chi_Minh");
															$thangdanhgia = round((strtotime(date("d-m-Y")) - strtotime(date("d-m-Y", strtotime($item->CreatedAt))))/ 2592000, 0);
															$ngaydanhgia = round((strtotime(date("d-m-Y")) - strtotime(date("d-m-Y", strtotime($item->CreatedAt))))/ 86400, 0);
															$giodanhgia = round((strtotime(date("H:i:s d-m-Y")) - strtotime(date("H:i:s d-m-Y", strtotime($item->CreatedAt))))/ 3600, 0);
															$phutdanhgia = round((strtotime(date("H:i:s d-m-Y")) - strtotime(date("H:i:s d-m-Y", strtotime($item->CreatedAt))))/ 60, 0);
															$giaydanhgia = round((strtotime(date("H:i:s d-m-Y")) - strtotime(date("H:i:s d-m-Y", strtotime($item->CreatedAt)))), 0);
															 ?>
															@if($thangdanhgia > 0)
																<p>Đánh giá vào {{$thangdanhgia}} tháng trước</p>
															@elseif($ngaydanhgia > 0)
																<p>Đánh giá vào {{$ngaydanhgia}} ngày trước</p>
															@elseif($giodanhgia > 0)
																<p>Đánh giá vào {{$giodanhgia}} giờ trước</p>	
															@elseif($phutdanhgia > 0)
																<p>Đánh giá vào {{$phutdanhgia}} phút trước</p>
															@else
																<p>Đánh giá vào {{$giaydanhgia}} giây trước</p>
															@endif
														</div>
													</div>
													<div class="col-7" style="font-size:15px">
														<div class="star-wrapper" style="display: inline-block;font-size:6px">
															@if($item->Rating == 5)
															<a href="javascript:void(0)" class="fa fa-star s1" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($item->Rating == 4)
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($item->Rating == 3)
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($item->Rating == 2)
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@else 
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@endif
														</div>
														@if($item->Title == "")
															@if($item->Rating == 5)
															<b style="margin-left:10px">Cực kì hài lòng</b>
															@elseif($item->Rating == 4)
															<b style="margin-left:10px">Hài lòng</b>
															@elseif($item->Rating == 3)
															<b style="margin-left:10px">Bình thường</b>
															@elseif($item->Rating == 2)
															<b style="margin-left:10px">Không hài lòng</b>
															@else 
															<b style="margin-left:10px">Rất không hài lòng</b>
															@endif
														@else
															<b style="margin-left:10px">{{$item->Title}}</b>
														@endif
														<p style="color:#00AB56"><i class="fa fa-check" aria-hidden="true" style="color:white; background-color:#00AB56; border-radius: 25px; padding:2px;margin-right:3px"></i>Đã mua hàng</p>
														<div style="margin-top:10px;">
															<p>{{$item->Content}}</p>
														</div>
													</div>
												</div>
												@endforeach
											</div>
												<nav aria-label="Page navigation example">
													<div style="float:right;margin:30px;">
													{!! $rating_list !!}
													</div>
												</nav>
										</div>
										@else
										<div class="card" style="margin-bottom:20px">
											<div class="card-body" style="margin:20px">
												<img src="{{URL::to('public/client/Images/rating-star.PNG')}}" style="height:80px; margin:auto;  display: block;" alt="">
												<p style="text-align:center; margin-top:20px">Chưa có đánh giá nào cho sản phẩm này</p>
											</div>
										</div>
										@endif
										<h3 class="comment-title" >
											<a style="font-weight: bold;">Bình luận</a>
										</h3>
										<h4>Bình luận của bạn</h4>
										<div class="o-binh-luan" style="margin:0px 0px 30px;">
											<!-- <button type="button" style="position: absolute;right: 60px; bottom:550px;width: 60px;height: 30px; width: 60px;height: 30px;border-radius: 50px;font-size: 14px;background: black;"> <a href="#" style="color: white;font-weight: bold;">Gửi</a> </button> -->
											<textarea class="textarea-commnent-content" name="CommentContent" rows="4" style="padding: 16px; border-radius: 8px; resize: none; margin: 10px 0px 10px; font-size: 16px; background-color:#F3F5F8;" placeholder="Mời bạn để lại bình luận"></textarea>
											<button class="send-comment-button" type="button" style="margin-bottom:30px;float:right;width: 60px;height: 30px; width: 60px;height: 30px;border-radius: 50px;font-size: 14px;background: black;"> <a href="javascript:void(0)" style="color: white;font-weight: bold;">Gửi</a> </button>
										</div>
										<form>
											@csrf
											<input name="ProductId" type="hidden" class="input_product_id" value="{{$product_detail->ProductId}}">
											<div id="show_comment"></div>
										</form>
									</div>									
								</div>	
					<?php $number_of_related_product = count($related_product); ?>
					@if($number_of_related_product != 0)
					<div class="product-area most-popular section">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="section-title">
										<h2>các sản phẩm liên quan</h2>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="owl-carousel popular-slider">
										@foreach($related_product as $key => $product_detail)
										<!-- Start Single Product -->
										<div class="single-product">
											<div class="product-img" style="width: 250px; height: 200px;">
												<a href="{{URL::to('/product-detail/'.$product_detail->ProductId)}}">
													<img class="default-img" style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$product_detail->ProductImage)}}" alt="#">
													<img class="hover-img" src="{{URL::to('public/images_upload/product/'.$product_detail->ProductImage)}}" alt="">
												</a>
												<div class="button-head">
													<div class="product-action">
														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Lượt xem: {{$product_detail->View}}</span></a>
														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
													</div>
													<div class="product-action-2">
														<a title="Add to cart" class="add-to-cart-a-tag" href="javascript:void(0)">Thêm vào giỏ hàng</a>
														<input type="text" value="{{$product_detail->ProductId}}" hidden>
													</div>
												</div>
											</div>
											<div class="product-content">
																	<h3><a href="{{URL::to('/product-detail/'.$product_detail->ProductId)}}">{{$product_detail->ProductName}}</a></h3>
																	<div class="product-price">
																		<span>{{number_format($product_detail->Price * ((100- $product_detail->Discount)/100)).' '.'₫'}}</span>
																	</div>
											</div>
										</div>
										<!-- End Single Product -->
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->

		<!--  Framework -->
<style>
ul.pagination{
	left:0 !important
}
	.star-wrapper {
  direction: rtl;
}
.star-wrapper a {
  font-size: 2em;
  color: #DEDDE3;
  text-decoration: none;
  transition: all 0.5s;
  margin: 4px;
}
/* .star-wrapper a:hover {
  color: gold;
  transform: scale(1.3);
} */
.wraper {
  position: absolute;
  bottom: 30px;
  right: 50px;
}
</style>
		<!--  -->
		<script>
		$(document).ready(function(){
			var product_id = $('.input_product_id').val();
			var _token = $('input[name="_token"]').val();
			load_comment();
			setInterval(load_comment, 20000);
			function load_comment()
			{
				$.ajax({
					url: "{{url('/load-comment')}}",
					method:"POST",
					data:{ProductId: product_id, _token:_token},
					success:function(data){
						$('#show_comment').html(data);
					},
					error:function(data)
					{
						alert("Lỗi");
					}
				});
			}
			$('.send-comment-button').click(function(){
				var customer_id = $('#input-customer-id').val();
				var admin_id = $('#input-admin-id').val();
				if(customer_id || admin_id)
				{
					var ProductId = $('.input_product_id').val();
					var CommentContent = $('.textarea-commnent-content').val();
					var _token = $('input[name="_token"]').val();
					if(CommentContent != '')
					{
						$.ajax({
							url:"{{url('/send-comment')}}",
							method: "POST",
							data:{ProductId: ProductId, CommentContent: CommentContent, _token:_token, ParentComment:0},
							success:function(data){
								load_comment();
								$('.textarea-commnent-content').val('');
							},
							error:function(data)
							{
								alert("Lỗi");
							}
						});
					}
					else
					{
						swal("Vui lòng nhập nội dung bình luận.");
					}
				}
				else
				{
					swal({
						text: "Bạn cần đăng nhập để thêm bình luận cho sản phẩm.",
						icon: "info",
						buttons: ["OK", "Đăng nhập"],
						}).then(function(isConfirm) {
							if (isConfirm) {
								window.location = "{{url('/login')}}";
							}
					})
				}
			});

			$('body').on('click', '.send-sub-comment-button' ,function(){
				var customer_id = $('#input-customer-id').val();
				var admin_id = $('#input-admin-id').val();
				if(customer_id || admin_id)
				{
					var ProductId = $('.input_product_id').val();
					var CommentContent = $('.textarea-sub-commnent-content').val();
					var ParentComment = $(this).parents('.o-comment').find('.ParentCommentId').val();
					var _token = $('input[name="_token"]').val();
					var add_next_cmt = $(this).parents('.o-comment').find('.single-comment').last();
					if(CommentContent != '')
					{
						$.ajax({
							url:"{{url('/send-comment')}}",
							method: "POST",
							data:{ProductId: ProductId, CommentContent: CommentContent, _token:_token, ParentComment: ParentComment},
							success:function(data){
								load_comment();
								$('.textarea-commnent-content').val('');
								add_next_cmt.css('background','#ccf2f4');
								$('html, body').animate({scrollTop: add_next_cmt.offset().top}, 700);
							},
							error:function(data)
							{
								alert("Lỗi");
							}
						});
					}
					else
					{
						swal("Vui lòng nhập nội dung bình luận.");
					}
				}
				else
				{
					swal({
						text: "Bạn cần đăng nhập để thêm bình luận cho sản phẩm.",
						icon: "info",
						buttons: ["OK", "Đăng nhập"],
						}).then(function(isConfirm) {
							if (isConfirm) {
								window.location = "{{url('/login')}}";
							}
					})
				}
			});
			
			$('body').on('click', '.btn-xoa-comment' ,function(){
				var comment_id = $(this).parents('.single-comment').find('.CommentId').val();
				var thisdiv = $(this).parents('.single-comment');
				$.ajax({
					url:"{{url('/delete-comment')}}",
					method: "GET",
					data:{comment_id: comment_id},
					success:function(data){
						swal({
								title: "Xác nhận",
								text: "Bạn có chắc muốn xóa bình luận này không?",
								icon: "warning",
								buttons: true,
								dangerMode: true,
								})
								.then((willDelete) => {
								if (willDelete) {
									load_comment();
								} 
							});
					},
					error:function(data)
					{
						alert("Lỗi");
					}
				});
			});

			$('body').on('click', '.btn-reply', function(){
				var o_binh_luan_khac = $(this).parents('.comments').find('.o-binh-luan-con').remove();
				var noidung = '';
				noidung += "<form> <input type='hidden' name='_token' value='{{ csrf_token() }}' /><div class='o-binh-luan-con' style='margin:0px 0px 30px;'><textarea class='textarea-sub-commnent-content' name='CommentContent' rows='2' style='padding: 16px; border-radius: 8px; resize: none; margin: 10px 0px 10px; font-size: 16px; background-color:#F3F5F8;' placeholder='Mời bạn để lại bình luận'></textarea>";
				noidung += "<button class='send-sub-comment-button' type='button'style='margin-bottom:30px;float:right;width: 60px;height: 30px; width: 60px;height: 30px;border-radius: 50px;font-size: 14px;background: black;'>  <a href='javascript:void(0)' style='color: white;font-weight: bold;'>Gửi</a> </button></div></form>";
				$(this).parents('.single-comment').append(noidung);
			});
		});
		</script>
		<!-- <a href="{{URL::to('/check_reply_for_comment')}}">Hi</a> -->
@endsection