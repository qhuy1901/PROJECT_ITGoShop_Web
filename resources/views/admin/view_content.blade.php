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
								<a href="#">Quản lý bài viết</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tất cả</a>
							</li>
						</ul>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<?php
													$message = Session::get('message');
													if($message)
													{
														echo '<label>'.$message.'</label>';
														Session::put('message', null);
													}
									?>
									<table id="add-row" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Tác giả</th>
												<th>Ngày đăng</th>
												<th>Tiêu đề</th>
												<th>Tóm tắt</th>
												<th>Hình ảnh</th>
												<th>Hiển thị</th>
												<th style="width: 10%">Thao tác</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Tác giả</th>
												<th>Ngày đăng</th>
												<th>Tiêu đề</th>
												<th>Tóm tắt</th>
												<th>Hình ảnh</th>
												<th>Hiển thị</th>
												<th>Thao tác</th>
											</tr>
										</tfoot>
										<tbody>
											@foreach($all_content as $key => $blog)
											<tr>
														<td>{{$blog->Author}}</td>
														<td>{{$blog->DatePost}}</td>
														<td>{{$blog->Title}}</td>
														<td>{{$blog->Summary}}</td>
														<td><img src="public/images_upload/blog/{{$blog->Image}}" height="80" width="80"></td>
														
														<td>
															<?php
																if($blog->Status == 1){
																?>	
																		<!-- Chú ý: https://fontawesome.com/v5.15/icons/eye?style=solid icon này lấy ở đây -->
																		<a href="{{URL::to('/unactive-blog/'.$blog->BlogId)}}"><span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span></a>
																<?php
															}else{
																?>	
																		<a href="{{URL::to('/active-blog/'.$blog->BlogId)}}"><span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span></a>
																<?php
																	}
															?>
														</td>
														<td>
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																	<a href="{{URL::to('/update-post/'.$blog->BlogId)}}" class="active" ui-toggle-class="">
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																	<a onclick="return confirm('Bạn cho chắc muốn xóa bài viết này không?')" href="{{URL::to('/delete-post/'.$blog->BlogId)}}" class="active" ui-toggle-class="">
																		<i class="fa fa-times text-danger text"></i>
																	</a>
																</button>
															</div>
														</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection