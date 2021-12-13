@extends('admin_layout')
@section('title', 'Hệ thống Admin - ITGoShop')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">THƯƠNG HIỆU</h4>
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
								<a href="#">Quản lý thương hiệu</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Cập nhật thương hiệu</a>
							</li>
						</ul>
					</div>
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Cập nhật thương hiệu</div>
								</div>
								<form role="form" action="{{URL::to('/save-update-brand/'.$brand_info->BrandId)}}" method="post" enctype="multipart/form-data">
									<div class="card-body">
														{{ csrf_field() }}
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label for="email2">Mã thương hiệu</label>
																	<input type="text" name="BrandId" class="form-control" id="email2" value="{{$brand_info->BrandId}}" disabled>
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label for="email2">Tên thương hiệu</label>
																	<input type="text" name="BrandName" class="form-control" id="email2" value="{{$brand_info->BrandName}}" placeholder="Nhập tên thương hiệu">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label for="exampleFormControlSelect1">Chọn danh mục hiển thị</label>
																	<select class="form-control" name="CategoryId" id="exampleFormControlSelect1">
																		@foreach($all_category as $key => $Category)
																			@if($Category->CategoryId == $brand_info->CategoryId)
																				<option value="{{$Category->CategoryId}}" selected>{{$Category->CategoryName}}</option>
																			@else
																				<option value="{{$Category->CategoryId}}">{{$Category->CategoryName}}</option>
																			@endif
																		@endforeach
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="comment">Mô tả thương hiệu</label>
																	<textarea class="form-control" name="Description" id="comment" rows="5" placeholder="Mô tả thương hiệu">{{$brand_info->Description}}</textarea>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label class="form-label d-block">Hiển thị</label>
																	@if($brand_info->Status == 1)
																	<div class="selectgroup selectgroup-secondary selectgroup-pills">
																		<label class="selectgroup-item">
																			<input type="radio" name="Status" value="1" class="selectgroup-input" checked="">
																			<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
																		</label>
																		<label class="selectgroup-item">
																			<input type="radio" name="Status" value="0" class="selectgroup-input">
																			<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
																		</label>
																	</div>
																	@else
																	<div class="selectgroup selectgroup-secondary selectgroup-pills">
																		<label class="selectgroup-item">
																			<input type="radio" name="Status" value="1" class="selectgroup-input">
																			<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
																		</label>
																		<label class="selectgroup-item">
																			<input type="radio" name="Status" value="0" class="selectgroup-input" checked="">
																			<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
																		</label>
																	</div>
																	@endif
																</div>
															</div>
															<div class="col-md-6">
																<label for="exampleFormControlFile1"><b>Logo cho thương hiệu</b></label>
                                                       		 	<input type="file" name="BrandImage" class="form-control-file" id="exampleFormControlFile1">
																<img src="{{URL::to('public/images_upload/brand/'.$brand_info->BrandLogo)}}" style="max-width:200px" alt="">
															</div>
														</div>
														<div class="card-action">
															<button type="submit" class="btn btn-primary">Cập nhật thương hiệu</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal"><a href="{{URL::to('/view-brand')}}" style="text-decoration:none; color:white">Hủy</a></button>
														</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
       
@endsection