@extends('admin_layout')
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
										<h4 class="card-title">Danh sách danh mục sản phẩm</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
												Thêm sản phẩm
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header no-bd">
														<h5 class="modal-title">
															<span class="fw-mediumbold">
															Thêm</span> 
															<span class="fw-light">
																sản phẩm mới
															</span>
														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													
													<div class="modal-body">
														<p class="small">Create a new row using this form, make sure you fill them all</p>
														<form>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group form-group-default">
																		<label>Name</label>
																		<input id="addName" type="text" class="form-control" placeholder="fill name">
																	</div>
																</div>
																<div class="col-md-6 pr-0">
																	<div class="form-group form-group-default">
																		<label>Position</label>
																		<input id="addPosition" type="text" class="form-control" placeholder="fill position">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group form-group-default">
																		<label>Office</label>
																		<input id="addOffice" type="text" class="form-control" placeholder="fill office">
																	</div>
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer no-bd">
														<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
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
														<th>Hiển thị</th>
														<th>Giảm giá</th>
														<th>Giá</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<tfoot>
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
												</tfoot>
												<tbody>
													@foreach($all_product as $key => $product)
													<tr>
														<td>{{$product->ProductName}}</td>
														<td>{{$product->CategoryName}}</td>
														<td>{{$product->BrandName}}</td>
														<td>{{$product->Quantity}}</td>
														<td><img src="public/images_upload/product/{{$product->ProductImage}}" height="80" width="80"></td>
														<td>
															<?php
																if($product->Status == 1){
															?>	
																	<!-- Chú ý: https://fontawesome.com/v5.15/icons/eye?style=solid icon này lấy ở đây -->
																	<a href="{{URL::to('/unactive-product/'.$product->ProductId)}}"><span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span></a>
															<?php
																}else{
															?>	
																	<a href="{{URL::to('/active-product/'.$product->ProductId)}}"><span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span></a>
															<?php
																}
															?>
														</td>
														<td>{{$product->Discount}}%</td>
														<td>{{number_format($product->Price)}}</td>

														<td>
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																	<a href="{{URL::to('/update-product/'.$product->ProductId)}}" class="active" ui-toggle-class="">
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																	<a onclick="return confirm('Bạn cho chắc muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-product/'.$product->ProductId)}}" class="active" ui-toggle-class="">
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
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									ITGo Shop
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2021, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">ITGo Team</a>
					</div>				
				</div>
			</footer>
		</div>
		
	
	</div>
	@endsection
    <script src="{{asset('public/admin/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('public/admin/js/core/popper.min.js')}}"></script>
	<script src="{{asset('public/admin//js/core/bootstrap.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{asset('public/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('public/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="{{asset('public/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"')}}></script>
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
