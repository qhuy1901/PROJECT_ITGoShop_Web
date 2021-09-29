@extends('admin_layout')
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
									<div class="card-title">Thêm sản phẩm</div>
								</div>
								<?php
									$message = Session::get('message');
									if($message)
									{
										echo '<label>'.$message.'</label>';
										Session::put('message', null);
									}
								?>
								<form role="form" action="{{URL::to('/save-product')}}" method="post">
									{{ csrf_field() }}
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-lg-4">
												<div class="form-group">
													<label for="email2">Tên sản phẩm</label>
													<input type="text" name="product_name" class="form-control" id="email2" placeholder="Nhập tên sản phẩm">
													<small id="emailHelp2" class="form-text text-muted">Lưu ý: ...</small>
												</div>

                                                <div class="form-group">
													<label for="exampleFormControlSelect1">Danh mục sản phẩm</label>
													<select class="form-control" name="category_id" id="exampleFormControlSelect1">
														<option value="1">Hiển thị</option>
														<option value="0">Ẩn</option>
													</select>
												</div>

                                                <div class="form-group">
													<label for="exampleFormControlSelect1">Thương hiệu sản phẩm</label>
													<select class="form-control" name="category_id" id="exampleFormControlSelect1">
														<option value="1">Hiển thị</option>
														<option value="0">Ẩn</option>
													</select>
												</div>
                                            </div>

                                            <div class="col-md-6 col-lg-4">	
                                                <div class="form-group">
                                                    <label class="mb-3"><b>Giá sản phẩm</b></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">VND</span>
                                                        </div>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>
                                                </div>	

                                                <div class="form-group">
                                                    <label class="mb-3"><b>Giảm giá</b></label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>	

                                                <div class="form-group">
                                                    <label class="form-label d-block">Hiển thị</label>
                                                    <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="icon-input" value="1" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="icon-input" value="2" class="selectgroup-input">
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-4">
                                                <div class="form-group">
                                                        <label for="comment">Nội dung sản phẩm</label>
                                                        <textarea class="form-control" name="description" id="comment" rows="5" placeholder="Mô tả sản phẩm">

                                                        </textarea>
                                                </div>

                                                <div class="form-group">
                                                        <label for="exampleFormControlFile1">Thêm ảnh sản phẩm</label>
                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                    </div>
                                            </div>
                                        </div>
                                    </div> 

									<div class="card-action">
										<button type="submit" name="add_product" class="btn btn-success">Thêm sản phẩm</button>
										<button class="btn btn-danger">Hủy</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
       
@endsection