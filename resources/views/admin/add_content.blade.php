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
								<div class="card-body">
									<div class="row">
										<div class="col-md-8 col-lg-12">
											<div class="form-group">
												<div class="input-group mb-3">
													
													<input type="text" class="form-control" placeholder="Tên tác giả" aria-label="Username" aria-describedby="basic-addon1">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group mb-3">
													
													<input type="text" class="form-control" placeholder="Tiêu đề bái viết" aria-label="Username" aria-describedby="basic-addon1">
												</div>
											</div>
											<div class="form-group">
												<label for="exampleFormControlFile1">Ngày đăng</label>
												<input type="file" class="form-control-file" id="exampleFormControlFile1">
											</div>
											<div class="form-group">
												<label for="exampleFormControlFile1">Hình minh hoạ</label>
												<input type="file" class="form-control-file" id="exampleFormControlFile1">
											</div>
											<div class="form-group">
												<label for="comment">Nội dung bài viết</label>
												<textarea class="form-control" id="Nhập nội dung" rows="12">

												</textarea>
											</div>
											
										</div>
										<div class="col-md-8 col-lg-12">	
											<div class="form-group">
												<label class="form-label">Tags</label>
												<div class="selectgroup selectgroup-pills">
													<label class="selectgroup-item">
														<input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked="">
														<span class="selectgroup-button">HTML</span>
													</label>
													<label class="selectgroup-item">
														<input type="checkbox" name="value" value="CSS" class="selectgroup-input">
														<span class="selectgroup-button">CSS</span>
													</label>
													<label class="selectgroup-item">
														<input type="checkbox" name="value" value="PHP" class="selectgroup-input">
														<span class="selectgroup-button">PHP</span>
													</label>
													<label class="selectgroup-item">
														<input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
														<span class="selectgroup-button">JavaScript</span>
													</label>
													<label class="selectgroup-item">
														<input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
														<span class="selectgroup-button">Ruby</span>
													</label>
													<label class="selectgroup-item">
														<input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
														<span class="selectgroup-button">Ruby</span>
													</label>
													<label class="selectgroup-item">
														<input type="checkbox" name="value" value="C++" class="selectgroup-input">
														<span class="selectgroup-button">C++</span>
													</label>
												</div>
											</div>
										</div>
										
											
									</div>
								</div>
								<div class="card-action">
									<button class="btn btn-success">Submit</button>
									<button class="btn btn-danger">Cancel</button>
								</div>
							</div>
						</div>
					</div>
			</div>
@endsection