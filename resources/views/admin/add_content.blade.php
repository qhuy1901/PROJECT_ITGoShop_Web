@extends('admin_layout')
@section('title', 'Hệ thống Admin - ITGoShop')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Blog</h4>
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
								<a href="#">Quản lý Blog</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Thêm bài đăng</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Nội dung bài viết</div>
								</div>
								<?php
									$message = Session::get('message');
									if($message)
									{
										echo '<label>'.$message.'</label>';
										Session::put('message', null);
									}
								?>
								<form role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" có cái này mới thêm ảnh đc-->
									{{ csrf_field() }}
										<div class="card-body">
											<div class="row">
												<div class="col-md-8 col-lg-12">
													<div class="form-group">
														<div class="input-group mb-3">
															
															<input type="text" name="Author" class="form-control" placeholder="Tên tác giả" aria-label="Username" aria-describedby="basic-addon1">
														</div>
													</div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Ngày đăng</label>
														<input type="date" name="DatePost" placeholder="30/10/2021" data-date-format="mm/dd/yyyy" id="dp2">
													</div>
													<div class="form-group">
														<div class="input-group mb-3">
															
															<input type="text" name="Title" class="form-control" placeholder="Tiêu đề bài viết" aria-label="Username" aria-describedby="basic-addon1">
														</div>
													</div>
													
													<div class="form-group">
														<div class="input-group mb-3">
															
															<input type="text" name="Summary" class="form-control" placeholder="Tóm tắt bài viết" aria-label="Username" aria-describedby="basic-addon1">
														</div>
													</div>
													<div class="form-group">
														<label for="comment">Nội dung bài viết</label>
														<textarea class="form-control" name="Content" id="ckeditor1" id="Nhập nội dung" rows="12">

														</textarea>
													</div>
													
													<div class="form-group">
														<label class="form-label d-block">Hiển thị</label>
														<div class="selectgroup selectgroup-secondary selectgroup-pills">
															<label class="selectgroup-item">
																<input type="radio" name="status" value="1" class="selectgroup-input" checked="">
																<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
															</label>
															<label class="selectgroup-item">
																<input type="radio" name="status" value="0" class="selectgroup-input">
																<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
															</label>
														</div>
                                                	</div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Hình minh hoạ</label>
														<input type="file" name="Image" class="form-control-file" id="exampleFormControlFile1">
													</div>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" name="add_content" class="btn btn-success">Thêm</button>
											<button class="btn btn-danger">Huỷ</button>
										</div>
								</form>
							</div>
						</div>
					</div>
			</div>
@endsection