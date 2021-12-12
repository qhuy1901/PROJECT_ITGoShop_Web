@extends('admin_layout')
@section('title', 'Quản lý sản phẩm - ITGoShop')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
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
								<a href="#">Sản phẩm</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Xem sản phẩm</a>
							</li>
						</ul>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title" style="margin-right:30px">Danh sách sản phẩm</h4>
											<button class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal" data-target="#addRowModal" style="height:36px;">
												<span class="btn-label">
													<i class="fas fa-file-import"></i>
												</span>Import
											</button>
											<form action="{{URL::to('/export-product')}}" method="POST" class="btn btn-info btn-border btn-round btn-sm">
												@csrf
												<span class="btn-label">
													<i class="fas fa-download"></i>
												</span>
												<input type="submit" value="Export" style="background: none;border: none;"></input>
											</form>	
									</div>
								</div>
								<div class="card-body">
										<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header no-bd">
														<h5 class="modal-title">
															<span class="fw-mediumbold">
															Import</span> 
															<span class="fw-light">
																sản phẩm mới
															</span>
														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="{{URL::to('/import-product')}}" method="POST" enctype="multipart/form-data">
														@csrf
														<div class="modal-body">
															<!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
																<div class="row">
																	<div class="col-sm-12">
																		<div class="form-group form-group-default">
																			<label>Thêm file sản phẩm (.xlsx)</label>
																			<input type="file" class="form-control" name="file" accept=".xlsx" style="margin: 20px 0px;" required>
																		</div>
																	</div>
																</div>
														</div>
														<div class="modal-footer no-bd">
															<input type="submit" class="btn btn-primary" value="Thêm"></input>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
														</div>
													</form>
												</div>
											</div>
										</div>

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
														<th>Tên sản phẩm</th>
														<th>Danh mục</th>
														<th>Thương hiệu</th>
														<th>Số lượng</th>
														<th>Ảnh sản phẩm</th>
														<!-- <th>Hiển thị</th> -->
														<!-- <th>Giảm giá</th> -->
														<th style="width:120px">Giá</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<!-- <tfoot>
													<tr>
														<th>Name</th>
														<th>Position</th>
														<th>Office</th>
														<th>Office</th>
														<th>Age</th>
														<th>Start date</th>
														<th>Salary</th> 
														<th>Salary</th>
														<th>Salary</th>
													</tr>
												</tfoot> -->
												<tbody>
													@foreach($all_product as $key => $product)
													<tr>
														<td><a href="{{URL::to('/update-product/'.$product->ProductId)}}" class="active" ui-toggle-class="" style="color:black">{{$product->ProductName}}</a></td>
														<td>{{$product->CategoryName}} 
														<input type="text" class="ProductId" value="{{$product->ProductId}}" hidden>
														</td>
														<td>{{$product->BrandName}}</td>
														<td>{{$product->Quantity}}</td>
														<td><img src="public/images_upload/product/{{$product->ProductImage}}" style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; "></td>
														<!-- <td>{{$product->Discount}}%</td> -->
														<td>{{number_format($product->Price, 0, " ", ".").' ₫'}}</td>
														<td>
															<div class="form-button-action">
																@if($product->Status == 1)
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị sản phẩm">
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn sản phẩm" hidden>
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>	
																@else	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị sản phẩm" hidden>
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn sản phẩm">
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>
																@endif
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Thư viện ảnh">
																	<a href="{{URL::to('/view-product-gallary/'.$product->ProductId)}}" class="active" ui-toggle-class="">
																		<i class="fas fa-images"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật sản phẩm">
																	<a href="javascript:void(0)" class="active" ui-toggle-class="">
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa sản phẩm">
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
			$('button[data-original-title="Hiển thị sản phẩm"]').click(function(){
				var ProductId = $(this).parents('tr').find('.ProductId').val();
				var activeButton = $(this);
				var unactiveButton = $(this).parent().find('button[data-original-title="Ẩn sản phẩm"]');
				$.ajax({
					url: '{{URL::to('/unactive-product')}}',
					method:"GET",
					data:{ProductId: ProductId},
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

			$('button[data-original-title="Ẩn sản phẩm"]').click(function(){
				var ProductId = $(this).parents('tr').find('.ProductId').val();
				var unactiveButton = $(this);
				var activeButton = $(this).parent().find('button[data-original-title="Hiển thị sản phẩm"]');
				$.ajax({
					url: '{{URL::to('/active-product')}}',
					method:"GET",
					data:{ProductId: ProductId},
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

			$('button[data-original-title="Xóa sản phẩm"]').click(function(){
				var ProductId = $(this).parents('tr').find('.ProductId').val();
				var thisImage = $(this).parents('tr');
				swal({
					title: "Xác nhận",
					text: "Bạn có chắc muốn xóa sản phẩm này không?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: '{{URL::to('/delete-product')}}',
							method:"GET",
							data:{ProductId: ProductId},
							success:function(data)
							{
								thisImage.remove();
								swal("Xóa sản phẩm thành công!", {
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
    