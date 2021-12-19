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
								<a href="#">Thêm thương hiệu</a>
							</li>
						</ul>
					</div>
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Thêm thương hiệu</div>
								</div>
								<form role="form"  action="{{URL::to('/save-brand')}}" method="post" enctype="multipart/form-data">
									<div class="card-body">
														
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label for="email2">Mã thương hiệu</label>
																	<input type="text" name="BrandId" class="form-control" id="email2" placeholder="Nhập tên thương hiệu nhánh" >
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label for="email2">Tên thương hiệu</label>
																	<input type="text" name="BrandName" class="form-control" id="email2"  placeholder="Nhập tên thương hiệu">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label for="exampleFormControlSelect1">Chọn danh mục lớn</label>
																	<select class="form-control" name="CategoryId" id="exampleFormControlSelect1">
																		@foreach($all_category as $key => $Category)
																			
																				<option value="{{$Category->CategoryId}}">{{$Category->CategoryName}}</option>
																		@endforeach
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="comment">Mô tả thương hiệu</label>
																	<textarea class="form-control" name="Description" id="comment" rows="5" placeholder="Mô tả thương hiệu"></textarea>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label class="form-label d-block">Hiển thị</label>
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
																</div>
															</div>
															<div class="col-md-6">
																<label for="exampleFormControlFile1"><b>Logo cho thương hiệu</b></label>
                                                       		 	<input type="file" name="BrandImage" class="form-control-file" id="exampleFormControlFile1">
															</div>
														</div>
														<div class="card-action">
															<button type="submit" class="btn btn-primary">Thêm thương hiệu</button>
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