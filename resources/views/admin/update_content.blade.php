@extends('admin_layout')
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
								<a href="#">Cập nhật nội dung bài viết</a>
							</li>
						</ul>
					</div>
					@foreach($post_info as $key => $update_value)
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Cập nhật nội dung bài viết</div>
								</div>
								<form role="form" action="{{URL::to('/update-post/'.$update_value->BlogId)}}" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" có cái này mới thêm ảnh đc-->
									{{ csrf_field() }}
										<div class="card-body">
											<div class="row">
												<div class="col-md-8 col-lg-12">
													<div class="form-group">
														<label for="exampleFormControlFile1">Tác giả</label>
														<div class="input-group mb-3">
															<input type="text" name="Author" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{$update_value->Author}}">
														</div>
													</div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Ngày đăng</label>
														<input type="date" name="DatePost"   id="dp2" value="{{$update_value->DatePost}}">
													</div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Tiêu đề bài viết</label>
														<div class="input-group mb-3">
															
															<input type="text" name="Title" class="form-control" placeholder="Tiêu đề bài viết" aria-label="Username" aria-describedby="basic-addon1" value="{{$update_value->Title}}" >
														</div>
													</div>
													
													<div class="form-group">
														<label for="exampleFormControlFile1">Tóm tắt bài viết</label>
														<div class="input-group mb-3">
															
															<input type="text" name="Summary" class="form-control" placeholder="Tóm tắt bài viết" aria-label="Username" aria-describedby="basic-addon1" value="{{$update_value->Summary}}">
														</div>
													</div>
													<div class="form-group">
														<label for="comment">Nội dung bài viết</label>
														<textarea class="form-control" name="Content" id="ckeditor1" id="Nhập nội dung" rows="12">
														{{$update_value->Content}}
														</textarea>
													</div>
													
													<div class="form-group">
                                                    <label class="form-label d-block">Hiển thị</label>
                                                    <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                        <label class="selectgroup-item">
															@if($update_value->Status == 1)
                                                            	<input type="radio" name="status" value="1" class="selectgroup-input" checked="">
															@else
																<input type="radio" name="status" value="1" class="selectgroup-input">
															@endif
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
                                                        </label>
                                                        <label class="selectgroup-item">
															@if($update_value->Status == 0)
                                                            	<input type="radio" name="status" value="0" class="selectgroup-input" checked="">
															@else
																<input type="radio" name="status" value="0" class="selectgroup-input">
															@endif
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Hình minh hoạ</label>
														<input type="file" name="Image" class="form-control-file" id="exampleFormControlFile1">
														<img src="{{URL::to('public/images_upload/blog/'.$update_value->Image)}}" height=100 width=100>
													</div>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" name="update_post" class="btn btn-success">Cập nhật</button>
											<button class="btn btn-danger">Huỷ</button>
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