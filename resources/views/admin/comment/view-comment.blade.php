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
														<th style="max-width:320px">Nội dung bình luận</th>
														<th>Tên khách hàng</th>
														<th>Tên sản phẩm</th>
														<th>Trả lời</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<form>
													@csrf
													<tbody id="show-all-comment"></tbody>
												</form>
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
<a href="{{url('/load-all-comment')}}">HiHI</a>
	<script>
		$(document).ready(function(){
			var _token = $('input[name="_token"]').val();

			load_reply();
			setInterval(load_reply, 1000);

			function load_reply()
			{
				$.ajax({
					url: "{{url('/load-all-comment')}}",
					method:"POST",
					data:{ _token:_token},
					success:function(data){
						$('#show-all-comment').html(data);
					},
					error:function(data)
					{
						alert("Lỗi");
					}
				});
			}
		});
	</script>
	
	<script>
		$(document).ready(function(){
			$('button[data-original-title="Hiển thị bình luận"]').click(function(){
				var CommentId = $(this).parents('tr').find('.CommentId').val();
				var activeButton = $(this);
				var unactiveButton = $(this).parent().find('button[data-original-title="Ẩn bình luận"]');
				$.ajax({
					url: '{{URL::to('/unactive-product-gallary')}}',
					method:"GET",
					data:{CommentId: CommentId},
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

			$('button[data-original-title="Ẩn bình luận"]').click(function(){
				var CommentId = $(this).parents('tr').find('.CommentId').val();
				var unactiveButton = $(this);
				var activeButton = $(this).parent().find('button[data-original-title="Hiển thị bình luận"]');
				$.ajax({
					url: '{{URL::to('/active-product-gallary')}}',
					method:"GET",
					data:{CommentId: CommentId},
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

			$('button[data-original-title="Xóa bình luận"]').click(function(){
				var comment_id = $(this).parents('tr').find('.CommentId').val();
				var thisImage = $(this).parents('tr');
				swal({
					title: "Xác nhận",
					text: "Bạn có chắc muốn xóa bình luận này không?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: '{{URL::to('/delete-comment')}}',
							method:"GET",
							data:{comment_id: comment_id},
							success:function(data)
							{
								thisImage.remove();
								swal("Xóa bình luận thành công!", {
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

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 10,
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
					},
					"bDestroy": true
				});
			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật bình luận"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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

