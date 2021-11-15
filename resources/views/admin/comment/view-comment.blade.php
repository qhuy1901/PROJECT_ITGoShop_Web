@extends('admin_layout')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">BÌNH LUẬN</h4>
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
								<a href="#">Quản lý bình luận sản phẩm</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Xem và phản hồi bình luận</a>
							</li>
						</ul>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Bình luận của sản phẩm</h4>
										<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
												
										</button> -->
									</div>
								</div>
								<div class="card-body">
									
									
									<div class="table-responsive">
										<div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
											<table id="multi-filter-select" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th style="width:80px">Thời gian</th>
														<th style="max-width:320px">Bình luận</th>
														<th>Tên khách hàng</th>
														<th>Tên sản phẩm</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<tbody>
                                                    @foreach($all_comment as $key => $comment)
													<tr>
														<td>{{date("d-m-Y", strtotime($comment->CreatedAt))}}</td>
                                                        <td>{{$comment->CommentContent}}<input type="text" class="CommentId" value="{{$comment->CommentId}}" hidden></td>
                                                        <td>{{$comment->FirstName. ' ' .$comment->LastName}}</td>
														<td>{{$comment->ProductName}}</td>
                                                        <td>
                                                            <div class="form-button-action">
																@if($comment->CommentStatus == 1)
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị thư viện ảnh">
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn thư viện ảnh" hidden>
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>	
																@else	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị thư viện ảnh" hidden>
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn thư viện ảnh">
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>
																@endif
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa thư viện ảnh">
																	<a href="javascript:void(0)" class="active" ui-toggle-class="">
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
				</div>
			</div>
	<script>
		$(document).ready(function(){
			
			// $('file').change(function()
			// {	alert("Hi");
			// 	var error = '';
			// 	var file = $('file')[0].files;

			// 	if(files.length > 5)
			// 	{
			// 		error += '<p>Bạn chỉ được chọn tối đa 5 ảnh</p>';

			// 	}else if(file.length == ''){
			// 		error += '<p>Bạn không được bỏ trống ảnh</p>';

			// 	}else if(file.size > 20000000)
			// 	{
			// 		error += '<p>File ảnh không được lớn hơn 2MB</p>';
			// 	}
			// 	if(error == '')
			// 	{

			// 	}else
			// 	{
			// 		$('#file').val('');
			// 		$('#error-gallery-message').html('<span class="text-danger>'+error+'</span>');
			// 		return false;
			// 	}
			// });
		});

	</script>
	
	<script>
		$(document).ready(function(){
			$('button[data-original-title="Hiển thị thư viện ảnh"]').click(function(){
				var GallaryId = $(this).parents('tr').find('.GallaryId').val();
				var activeButton = $(this);
				var unactiveButton = $(this).parent().find('button[data-original-title="Ẩn thư viện ảnh"]');
				$.ajax({
					url: '{{URL::to('/unactive-product-gallary')}}',
					method:"GET",
					data:{GallaryId: GallaryId},
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

			$('button[data-original-title="Ẩn thư viện ảnh"]').click(function(){
				var GallaryId = $(this).parents('tr').find('.GallaryId').val();
				var unactiveButton = $(this);
				var activeButton = $(this).parent().find('button[data-original-title="Hiển thị thư viện ảnh"]');
				$.ajax({
					url: '{{URL::to('/active-product-gallary')}}',
					method:"GET",
					data:{GallaryId: GallaryId},
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

			$('button[data-original-title="Xóa thư viện ảnh"]').click(function(){
				var GallaryId = $(this).parents('tr').find('.GallaryId').val();
				var thisImage = $(this).parents('tr');
				swal({
					title: "Xác nhận",
					text: "Bạn có chắc muốn xóa ảnh này không?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: '{{URL::to('/delete-product-gallary')}}',
							method:"GET",
							data:{GallaryId: GallaryId},
							success:function(data)
							{
								thisImage.remove();
								swal("Xóa ảnh thành công!", {
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

    <script>
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 10,
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
				"pageLength": 10,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật thư viện ảnh"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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

