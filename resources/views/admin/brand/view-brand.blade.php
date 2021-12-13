@extends('admin_layout')
@section('title', 'Quản lý thương hiệu - ITGoShop')
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
								<a href="#">Thương hiệu</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Xem thương hiệu</a>
							</li>
						</ul>
					</div>
					<div class="row">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Danh sách thương hiệu</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											 Thêm thương hiệu
										</button>
									</div>
								</div>

								<div class="card-body">
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content" style="width:800px;margin:auto;right:100px">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Thêm thương hiệu</span> 
														<span class="fw-light">
															mới
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body" style="padding:2rem">
													<!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
													<form role="form" action="{{URL::to('/save-brand')}}" method="post" enctype="multipart/form-data">
														{{ csrf_field() }}
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="email2">Tên thương hiệu</label>
																	<input type="text" name="BrandName" class="form-control" id="email2" placeholder="Nhập tên thương hiệu">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleFormControlSelect1">Chọn danh mục hiển thị</label>
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
																<label for="exampleFormControlFile1">Thêm logo cho thương hiệu</label>
                                                       		 	<input type="file" name="BrandImage" class="form-control-file" id="exampleFormControlFile1" required>
															</div>
														</div>
														<div class="card-action">
															<button type="submit" name="add_product_category" class="btn btn-primary">Thêm thương hiệu</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
											<table id="multi-filter-select" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th style="width:15%">Mã thương hiệu</th>
														<th style="width:5%">Logo</th>
														<th style="width:15%">Tên thương hiệu</th>
														<th style="width:35%">Mô tả thương hiệu</th>
														<th style="width:10%">Hiển thị tại danh mục</th>
														<th style="width:20%">Hành động</th>
													</tr>
												</thead>
												<tbody>
													@foreach($all_brand as $key => $brand)
													<tr>
														<td>{{$brand->BrandId}}</td>
														<td><img src="{{URL::to('public/images_upload/brand/'.$brand->BrandLogo)}}" style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; " alt=""></td>
														<td>{{$brand->BrandName}}<input type="text" class="BrandId" value="{{$brand->BrandId}}" hidden></td>
														<td><div class="text">{{$brand->Description}}</div></td>
														<td>{{$brand->CategoryName}}</td>
														<td>
															<div class="form-button-action">
																@if($brand->Status == 1)
																<!-- Chú ý: https://fontawesome.com/v5.15/icons/eye?style=solid icon này lấy ở đây -->
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị thương hiệu">
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn thương hiệu" hidden>
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>	
																@else	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị thương hiệu" hidden>
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn thương hiệu">
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>
																@endif
                                                            </div>
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật thương hiệu">
																	<a href="{{URL::to('/update-brand/'.$brand->BrandId)}}" class="active" ui-toggle-class="">
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa thương hiệu">
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

	<style>
		.text {
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 2; /* number of lines to show */
					line-clamp: 2; 
			-webkit-box-orient: vertical;
		}
	</style>
<script>
		$(document).ready(function(){
			$('button[data-original-title="Hiển thị thương hiệu"]').click(function(){
				var BrandId = $(this).parents('tr').find('.BrandId').val();
				var activeButton = $(this);
				var unactiveButton = $(this).parent().find('button[data-original-title="Ẩn thương hiệu"]');
				$.ajax({
					url: '{{URL::to('/unactive-brand')}}',
					method:"GET",
					data:{BrandId: BrandId},
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

			$('button[data-original-title="Ẩn thương hiệu"]').click(function(){
				var BrandId = $(this).parents('tr').find('.BrandId').val();
				var unactiveButton = $(this);
				var activeButton = $(this).parent().find('button[data-original-title="Hiển thị thương hiệu"]');
				$.ajax({
					url: '{{URL::to('/active-brand')}}',
					method:"GET",
					data:{BrandId: BrandId},
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

			$('button[data-original-title="Xóa thương hiệu"]').click(function(){
				var BrandId = $(this).parents('tr').find('.BrandId').val();
				var thisSlider = $(this).parents('tr');
				swal({
					title: "Xác nhận",
					text: "Bạn có chắc muốn xóa thương hiệu và các thương hiệu nhánh của nó không?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: '{{URL::to('/delete-brand')}}',
							method:"GET",
							data:{BrandId: BrandId},
							success:function(data)
							{
								thisSlider.remove();
								swal("Xóa thương hiệu thành công!", {
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

    <script >
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

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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