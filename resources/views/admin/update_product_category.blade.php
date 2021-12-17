@extends('admin_layout')
@section('title', 'Cập nhật danh mục sản phẩm - ITGoShop')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Forms</h4>
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
								<a href="#">Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Basic Form</a>
							</li>
						</ul>
					</div>
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Cập nhật danh mục sản phẩm</div>
								</div>
								<?php
									$message = Session::get('message');
									if($message)
									{
										echo '<label>'.$message.'</label>';
										Session::put('message', null);
									}
								?>
								@foreach($update_product_category as $key => $update_value)
								<form role="form" action="{{URL::to('/update-product-category/'.$update_value->CategoryId)}}" method="post">
									{{ csrf_field() }}
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 col-lg-12">
												<div class="form-group">
													<label for="email2">Mã danh mục sản phẩm</label>
													<input type="text" readonly value="{{$update_value->CategoryId}}" name="CategoryName" class="form-control" id="email2">
												</div>
												<div class="form-group">
													<label for="email2">Tên danh mục sản phẩm</label>
													<input type="text" value="{{$update_value->CategoryName}}" name="CategoryName" class="form-control" id="email2">
												</div>

												<!--<div class="form-group">
													<label for="comment">Mô tả danh mục sản phẩm</label>
													<textarea class="form-control" name="description" id="comment" rows="5">
														
													</textarea>
												</div>-->

												 <div class="form-group">
													<label for="exampleFormControlSelect1">Hiển thị danh mục sản phẩm</label>
													<select class="form-control" name="status" id="exampleFormControlSelect1">
														<option value="1">Hiển thị</option>
														<option value="0">Ẩn</option>
													</select>
												</div> 
											</div>
										</div>
									</div>
									<div class="card-action">
										<button type="submit" name="update_product_category" class="btn btn-success">Cập nhật danh mục sản phẩm</button>
										<button class="btn btn-danger">Hủy</button>
									</div>
								</form>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
       
@endsection