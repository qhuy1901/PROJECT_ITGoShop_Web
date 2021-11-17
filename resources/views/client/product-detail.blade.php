@extends('client_layout')
@section('title', 'Tên sản phẩm')
@section('client_content')
		@foreach($product_detail  as $key => $product)
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								{{csrf_field()}}
								<li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#">{{$product->CategoryName}}  </a></li>
								<li  class="active"><i class="ti-arrow-right"></i></li>
								<li class="active"><a href="#">{{$product->BrandName}} </a></li>
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
									<div class="ps-product__thumbnail" style="height: 395px; width: 600px;" >
										<div class="ps-product__preview">
											<div class="ps-product__variants" >
												<div class="item" ><img src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt=""></div>
												@foreach($product_gallary as $key => $item)
												<div class="item"><img src="{{URL::to('/public/images_upload/product-gallary/'.$item->GallaryImage)}}" alt=""></div>
												@endforeach
											</div>
										</div>
										<div class="ps-product__image" style="max-height: 395px; max-width: 450px; width: auto; height: auto;">
											<div class="item"><img class="zoom" src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="" data-zoom-image="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}"></div>
											@foreach($product_gallary as $key => $item)
												<div class="item"><img class="zoom"  src="{{URL::to('/public/images_upload/product-gallary/'.$item->GallaryImage)}}" alt=""></div>
											@endforeach
											<!-- <div class="item"><img class="zoom" src="{{URL::to('/public/client/Images/shoe-detail/2.jpg')}}" alt="" data-zoom-image="{{URL::to('/public/client/Images/shoe-detail/2.jpg')}}"></div> -->
											<!-- <div class="item"><img class="zoom" src="{{URL::to('/public/client/Images/shoe-detail/3.jpg')}}" alt="" data-zoom-image="{{URL::to('/public/client/Images/shoe-detail/3.jpg')}}"></div> -->
										</div>
									</div>
									<div class="ps-product__thumbnail--mobile">
										<div class="ps-product__main-img"><img src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt=""></div>
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
												<form action="{{URL::to('/save-cart')}}" method="POST">
													{{ csrf_field() }}
													<h2 class="blog-title">{{$product->ProductName}}</h2>
													
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
															<a><i class="fa fa-shopping-cart"></i>Đã bán {{$product->Sold}}</a>
															@if($product->Quantity < 10)
																<a><i class="fa fa-archive"></i>Chỉ còn lại {{$product->Quantity}} sản phẩm</a>
															@else
																<a><i class="fa fa-archive"></i>Còn {{$product->Quantity}} sản phẩm</a>
															@endif
														</span>
													</div>
													<div class="content">
														<div class="blog-meta">
															<h1 style="color:red; background-color:#FAFAFA;padding: 10px;font-weight: bold; ">
																<!-- Gía sản phẩm -->			 
																<b>{{number_format($product->Price).' '.' ₫'}}</b>
																					<sub style="color:black; font-size:15px "> 
																						<!--  Phần giảm giá --> 
																						<del>{{number_format($product->Price + $product->Price * $product->Discount / 100 ).' '.' ₫'}}</del> 
																						<span class="o-giam-gia">-{{$product->Discount}}% </span> 
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
																			
																			<input name="ProductId" type="hidden" class="input_product_id" value="{{$product->ProductId}}">
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
											
											<p>{!!$product->Content!!}</p> <!-- Thêm !! để dataa ko bị lỗi nếu data đã được styling-->
										</div>
											<!-- End Nội dung sản phẩm -->
											
										</div>
									</div>

									
									<div class="share-social">
										<div class="row">
											<div class="col-12">
												<div class="content-tags">
													<h4>Tags:</h4>
													<ul class="tag-inner">
														<li><a href="#">Glass</a></li>
														<li><a href="#">Pant</a></li>
														<li><a href="#">t-shirt</a></li>
														<li><a href="#">swater</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-12">
									<div class="comments">
										<h3 class="comment-title" >
											<a style="font-weight: bold;">Đánh giá sản phẩm</a>
											<div class="ps-product__rating" >
														<select class="ps-rating">
															<option value="1">1</option>
															<option value="1">2</option>
															<option value="1">3</option>
															<option value="1">4</option>
															<option value="2">5</option>
														</select>
											</div>
										</h3>
										<h3 class="comment-title" >
											<a style="font-weight: bold;">Bình luận</a>
										</h3>
										<h4>Bình luận của bạn</h4>
										<div class="o-binh-luan" style="margin:0px 0px 30px;">
											<!-- <button type="button" style="position: absolute;right: 60px; bottom:550px;width: 60px;height: 30px; width: 60px;height: 30px;border-radius: 50px;font-size: 14px;background: black;"> <a href="#" style="color: white;font-weight: bold;">Gửi</a> </button> -->
											<textarea class="textarea-commnent-content" name="CommentContent" rows="4" style="padding: 16px; border-radius: 8px; resize: none; margin: 10px 0px 10px; font-size: 16px; background-color:#F3F5F8;" placeholder="Mời bạn để lại bình luận"></textarea>
											<button class="send-comment-button" type="button" style="margin-bottom:30px;float:right;width: 60px;height: 30px; width: 60px;height: 30px;border-radius: 50px;font-size: 14px;background: black;"> <a href="javascript:void(0)" style="color: white;font-weight: bold;">Gửi</a> </button>
										</div>
										
											
										<!-- </div> -->
										
										<form>
											@csrf
											<input name="ProductId" type="hidden" class="input_product_id" value="{{$product->ProductId}}">
											<div id="show_comment"></div>
										</form>
										
										<!-- <div class="single-comment left">
											<img src="https://via.placeholder.com/80x80" alt="#">
											<div class="content">
												<h4>john deo <span>Feb 28, 2018 at 8:59 pm</span></h4>
												<p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee  Phosfluorescently leverage.</p>
												<div class="button">
													<a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
												</div>
											</div>
										</div>
										<div class="single-comment">
											<img src="https://via.placeholder.com/80x80" alt="#">
											<div class="content">
												<h4>megan mart <span>Feb 28, 2018 at 8:59 pm</span></h4>
												<p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee  Phosfluorescently leverage.</p>
												<div class="button">
													<a href="javascript:void(0)" class="btn btn-reply"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a>
												</div>
											</div>
										</div> -->
									</div>									
								</div>	
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
										@foreach($related_product as $key => $product)
										<!-- Start Single Product -->
										<div class="single-product">
											<div class="product-img" style="width: 250px; height: 200px;">
												<a href="{{URL::to('/product-detail/'.$product->ProductId)}}">
													<img class="default-img" style="margin: auto; max-width: 250px; max-height: 200px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$product->ProductImage)}}" alt="#">
													<img class="hover-img" src="{{URL::to('/product-detail/'.$product->ProductId)}}" alt="">
													
												</a>
												<div class="button-head">
													<div class="product-action">
														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
													</div>
													<div class="product-action-2">
														<a title="Add to cart" class="add-to-cart-a-tag" href="javascript:void(0)">Thêm vào giỏ hàng</a>
														<input type="text" value="{{$product->ProductId}}" hidden>
													</div>
												</div>
											</div>
											<div class="product-content">
																	<h3><a href="{{URL::to('/product-detail/'.$product->ProductId)}}">{{$product->ProductName}}</a></h3>
																	<div class="product-price">
																		<span>{{number_format($product->Price * ((100- $product->Discount)/100)).' '.'₫'}}</span>
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
					
				</div>
			</div>
		</section>
		<a href="{{URL::to('/send-comment')}}">Hi</a>
		@endforeach
		<!--/ End Blog Single -->
		<script>
		$(document).ready(function(){
			var product_id = $('.input_product_id').val();
			var _token = $('input[name="_token"]').val();
			load_comment();
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
				if(customer_id)
				{
					var ProductId = $('.input_product_id').val();
					var CommentContent = $('.textarea-commnent-content').val();
					var _token = $('input[name="_token"]').val();
					
					$.ajax({
						url:"{{url('/send-comment')}}",
						method: "POST",
						data:{ProductId: ProductId, CommentContent: CommentContent, _token:_token},
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
					window.location.href = "{{URL::to('/login')}}";
				}
			});

			$('body').on('click', '.send-sub-comment-button' ,function(){
				var customer_id = $('#input-customer-id').val();
				if(customer_id)
				{
					var ProductId = $('.input_product_id').val();
					var CommentContent = $('.textarea-sub-commnent-content').val();
					var ParentComment = $('.textarea-sub-commnent-content').val();
					var _token = $('input[name="_token"]').val();
					alert(CommentContent);
					$.ajax({
						url:"{{url('/send-comment')}}",
						method: "POST",
						data:{ProductId: ProductId, CommentContent: CommentContent, _token:_token},
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
					window.location.href = "{{URL::to('/login')}}";
				}
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
@endsection