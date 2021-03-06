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

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Danh sách danh mục sản phẩm</h4>
										
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
											<?php
															$message = Session::get('message');
															if($message)
															{
																echo '<label>'.$message.'</label>';
																Session::put('message', null);
															}
											?>
											<table id="multi-filter-select" class="display table table-striped table-hover" >
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
												<tbody>
													@foreach($all_content as $key => $blog)
													@csrf
													<tr>
																<td>{{$blog->Author}}</td>
																<td>{{$blog->DatePost}}</td>
																<td>{{$blog->Title}}</td>
																<td>{{$blog->Summary}}</td>
																<td><img src="public/images_upload/blog/{{$blog->Image}}" height="80" width="80"></td>
																
																<td>
																	
																	<div class="form-button-action">
																		@if($blog->Status == 1)
																		<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị bài viết">
																			<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																		</button>	
																		<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn bài viết" hidden>
																			<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																		</button>	
																		@else	
																		<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị bài viết" hidden>
																			<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																		</button>	
																		<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn bài viết">
																			<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																		</button>
																		@endif
																		<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa  bài viết">
																			<a href="javascript:void(0)" class="active" ui-toggle-class="">
																				<i class="fa fa-times text-danger text"></i>
																			</a>
																		</button>
																	</div>
																</td>
																<td>
																	<div class="form-button-action">
																		<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																			<a href="{{URL::to('/update-post/'.$blog->BlogId)}}" class="active" ui-toggle-class="">
																				<i class="fa fa-edit text-active"></i>
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
				</div>
			</div>
	<script>
		$(document).ready(function(){
			$('button[data-original-title="Hiển thị bài viết"]').click(function(){
				var BlogId = $(this).parents('tr').find('.BlogId').val();
				var activeButton = $(this);
				var unactiveButton = $(this).parent().find('button[data-original-title="Ẩn bài viết"]');
				$.ajax({
					url: '{{URL::to('/unactive-post')}}',
					method:"GET",
					data:{BlogId: BlogId},
					success:function(data)
					{
						activeButton.attr('hidden',true);
						unactiveButton.removeAttr('hidden');
					},
					error:function(data)
					{
						alert('Lỗi');
					}	
				});
			});

			$('button[data-original-title="Ẩn bài viết"]').click(function(){
				var BlogId = $(this).parents('tr').find('.BlogId').val();
				var unactiveButton = $(this);
				var activeButton = $(this).parent().find('button[data-original-title="Hiển thị bài viết"]');
				$.ajax({
					url: '{{URL::to('/active-post')}}',
					method:"GET",
					data:{BlogId: BlogId},
					success:function(data)
					{
						unactiveButton.attr('hidden',true);
						activeButton.removeAttr('hidden');
					},
					error:function(data)
					{
						alert('Lỗi');
					}	
				});
			});
			
			$('button[data-original-title="Xóa bài viết"]').click(function(){
				var BlogId = $(this).parents('tr').find('.BlogId').val();
				var thisImage = $(this).parents('tr');
				swal({
					title: "Xác nhận",
					text: "Bạn có chắc muốn xóa bài viết này không?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: '{{URL::to('/delete-post')}}',
							method:"GET",
							data:{ProductId: BlogId},
							success:function(data)
							{
								thisImage.remove();
								swal("Xóa bài viết thành công!", {
								icon: "success",
								});
							},
							error:function(data)
							{
								alert('Lỗi');
							}	
						});
						
					} 
				});
				
			});
		});
	</script>
<!-- <script src="{{asset('public/admin/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('public/admin/js/core/popper.min.js')}}"></script>
	<script src="{{asset('public/admin//js/core/bootstrap.min.js')}}"></script> -->
	<!-- jQuery UI -->
	<script src="{{asset('public/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('public/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="{{asset('public/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Datatables -->
	<script src="{{asset('public/admin/js/plugin/datatables/datatables.min.js')}}"></script>
	<!-- Atlantis JS -->
	<script src="{{asset('public/admin/js/atlantis.min.js')}}"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('public/admin/js/setting-demo2.js')}}"></script>

    
	 <script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật sản phẩm"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
@endsection