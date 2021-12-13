@extends('admin_layout')
@section('title', 'Cập nhật sản phẩm - ITGoShop')
@section('admin_content')

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Chỉnh sửa sản phẩm</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Chỉnh Sửa Sản Phẩm</a>
							</li>
						</ul>
					</div>
					@foreach($product_info as $key => $update_value)
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Chỉnh sửa thông tin phẩm</div>
								</div>
								<?php
									$message = Session::get('message');
									if($message)
									{
										echo '<label>'.$message.'</label>';
										Session::put('message', null);
									}
								?>
								<form role="form" action="{{URL::to('/update-product/'.$update_value->ProductId)}}" method="post" enctype="multipart/form-data"> 
									{{ csrf_field() }}								
									<div class="card-body">
										<div class="row">
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="disableinput">Mã sản phẩm</label>
													<input type="text" class="form-control" id="disableinput" value="{{$update_value->ProductId}}" disabled>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="email2">Tên sản phẩm</label>
													<input type="text" name="ProductName" class="form-control" id="email2" placeholder="Nhập tên sản phẩm" value="{{$update_value->ProductName}}">
													
												</div>
											</div>
											<div class="col-6 col-lg-6">
												<div class="form-group">
													<label for="exampleFormControlSelect1">Danh mục sản phẩm</label>
													<select class="form-control" name="Category" id="exampleFormControlSelect1">
														@foreach($product_category_list as $key => $Category)
															@if($Category->CategoryId == $update_value->CategoryId)
																<option selected value="{{$Category->CategoryId}}">{{$Category->CategoryName}}</option>
															@else
																<option value="{{$Category->CategoryId}}">{{$Category->CategoryName}}</option>
															@endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-6 col-lg-6">
												<div class="form-group">
													<label for="exampleFormControlSelect1">Thương hiệu sản phẩm</label>
													<select class="form-control" name="Brand" id="exampleFormControlSelect1">
														@foreach($brand_list as $key => $brand)
															@if($brand->BrandId == $update_value->BrandId)
																<option selected value="{{$brand->BrandId}}">{{$brand->BrandName}}</option>
															@else
																<option value="{{$brand->BrandId}}">{{$brand->BrandName}}</option>
															@endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-6 col-lg-6">
												<div class="form-group">
													<label for="exampleFormControlSelect1">Thương hiệu nhánh</label>
													<select class="form-control" name="Subbrand" id="exampleFormControlSelect1">
														@foreach($sub_brand_list as $key => $subbrand)
															@if($subbrand->SubBrandId == $update_value->SubBrandId)
																<option selected value="{{$subbrand->SubBrandId}}">{{$subbrand->SubBrandName}}</option>
															@else
																<option value="{{$subbrand->SubBrandId}}">{{$subbrand->SubBrandName}}</option>
															@endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-6 col-lg-6">
												<div class="form-group">
                                                    <label class="mb-3"><b>Giá sản phẩm</b></label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="Price" class="form-control" aria-label="Amount (to the nearest dollar)"  value="{{$update_value->Price}}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">VND</span>
                                                        </div>
                                                    </div>
                                                </div>	
											</div>
											
											<div class="col-6 col-lg-6">
												<div class="form-group">
                                                    <label class="mb-3"><b>Giảm giá</b></label>
                                                    <div class="input-group mb-3">
													<input type="text" name="Discount" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$update_value->Discount}}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>	
											</div>

											<div class="col-6 col-lg-6">
												<div class="form-group">
													<label for="email2">Số lượng tồn kho</label>
													<input type="text" name="Quantity" class="form-control" id="email2" placeholder="Nhập số lượng sản phẩm"  value="{{$update_value->Quantity}}">
												</div>
											</div>


                                            <div class="col-6 col-lg-6">	
                                                <div class="form-group">
                                                        <label for="exampleFormControlFile1">Hình ảnh sản phẩm</label>
                                                        <input type="file" name="product_image" class="form-control-file" id="exampleFormControlFile1">
														<img src="{{URL::to('public/images_upload/product/'.$update_value->ProductImage)}}" style="margin: auto; max-width: 160px; max-height: 160px; width: auto; height: auto;">
                                                </div>
											</div>
											<div class="col-6 col-lg-6">
												<div class="form-group">
                                                    <label class="form-label d-block">Hiển thị</label>
                                                    <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                        <label class="selectgroup-item">
															@if($update_value->Status == 1)
                                                            	<input type="radio" name="Status" value="1" class="selectgroup-input" checked="">
															@else
																<input type="radio" name="Status" value="1" class="selectgroup-input">
															@endif
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
                                                        </label>
                                                        <label class="selectgroup-item">
															@if($update_value->Status == 0)
                                                            	<input type="radio" name="Status" value="0" class="selectgroup-input" checked="">
															@else
																<input type="radio" name="Status" value="0" class="selectgroup-input">
															@endif
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
											</div>
											<div class="col-lg-12">	
												<div class="form-group">
                                                    <label for="comment">Nội dung sản phẩm</label>
													<textarea  class="form-control" name="Content" id="ckeditor1" rows="5" placeholder="Mô tả sản phẩm">{{$update_value->Content}}</textarea>                                                
												</div>
											</div>
										</div>
                                    </div> 
									<div class="card-action">
										<button type="submit" name="update_product" class="btn btn-success">Cập nhật thông tin sản phẩm</button>
										<button class="btn btn-danger">Hủy</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>	

@endsection