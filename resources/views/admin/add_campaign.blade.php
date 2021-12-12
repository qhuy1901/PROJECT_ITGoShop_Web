@extends('admin_layout')
@section('title', 'Hệ thống Admin - ITGoShop')
@section('admin_content')
<div class="main-panel">
<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Thêm Campaign</h4>
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
								<a href="#">QUẢN LÝ CAMPAIGN</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Thêm Campaign</a>
							</li>
						</ul>
					</div>
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Thêm Campaign</div>
								</div>
								<?php
									$message = Session::get('message');
									if($message)
									{
										echo '<label>'.$message.'</label>';
										Session::put('message', null);
									}
								?>
								<form role="form" action="{{URL::to('/save-campaign')}}" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" có cái này mới thêm ảnh đc-->
									{{ csrf_field() }}
									<div class="card-body">
										<div class="row">
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="email2">Mã Campaign</label>
													<input type="text" name="CampaignId" class="form-control" id="email2" required>
													<!-- <small id="emailHelp2" class="form-text text-muted">Lưu ý: ...</small> -->
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="email2">Tên Campaign</label>
													<input type="text" name="CampaignName" class="form-control" id="email2" required>
													<!-- <small id="emailHelp2" class="form-text text-muted">Lưu ý: ...</small> -->
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="email2">Ngày bắt đầu</label>
													<input type="text" name="DateStart" class="form-control" id="email2" required>
													<!-- <small id="emailHelp2" class="form-text text-muted">Lưu ý: ...</small> -->
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="email2">Ngày kết thúc</label>
													<input type="text" name="DateFinish" class="form-control" id="email2" required>
													<!-- <small id="emailHelp2" class="form-text text-muted">Lưu ý: ...</small> -->
												</div>
											</div>
                                            <div class="col-6 col-lg-6">	
                                                <div class="form-group">
                                                        <label for="exampleFormControlFile1">Thêm ảnh sản phẩm</label>
                                                        <input type="file" name="CampaignImage" class="form-control-file" id="exampleFormControlFile1" required>
                                                </div>
											</div>
											<div class="col-lg-12">	
												<div class="form-group">
                                                        <label for="comment">Nội dung Campaign</label>
                                                        <textarea class="form-control" name="CampaignContent"  rows="5" placeholder="Mô tả campaign" required></textarea>
                                                </div>
											</div>
											<div class="col-lg-12">	
												<div class="form-group">
                                                        <label for="comment">Thể lệ Campaign</label>
                                                        <textarea class="form-control" name="CampaignNote" id="ckeditor1" rows="5" placeholder="Mô tả thể lệ" required></textarea>
                                                </div>
											</div>
											<div class="col-6 col-lg-6">
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
										</div>
                                    </div> 

									<div class="card-action">
										<button type="submit" name="add_campaign" class="btn btn-success">Thêm campaign</button>
										<button class="btn btn-danger">Hủy</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
@endsection