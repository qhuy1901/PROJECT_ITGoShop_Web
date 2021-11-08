@extends('admin_layout')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Quản lý đơn hàng</h4>
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
								<a href="#">Tất cả</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Tất cả đơn hàng</h4>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>ID</th>
													<th>Khách hàng</th>
													<th>Tổng đơn hàng</th>
													<th>Trạng thái</th>
													<th>Ngày đặt hàng</th>
													<th>Ngày hoàn thành</th>
													<th> Thao tác </th>
												</tr>
											</thead>
											
											<tbody>
												@foreach($all_order as $key => $order)
												<tr>
													<td>
														<a href="{{URL::to('/order-detail/'.$order->OrderId)}}">
															<span> {{$order->OrderId}}</span>
														</a>
													</td>
													<?php
														$firstName = $order->FirstName;
														$lastName = $order->LastName;
														$fullname = $lastName.$firstName ;
														
													?>
													<td>{{$fullname}}</td>
													<td>{{$order->Total}}</td>
													<td style="color: #77ACF1; font-size: 14px; font-weight: 900;">{{$order->OrderStatus}} </td>
													<td>{{$order->OrderDate}}</td>
													<td>{{$order->OrderDateCompleted}}</td>
													<td>
															<div class="form-button-action" data-toggle="modal" data-target="#addRowModal">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật trạng thái đơn hàng" >
																	<a class="active" ui-toggle-class="" > 
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="In đơn hàng" >
																	<a class="active" ui-toggle-class="" > 
																		<i class="fa fa-print text-active"></i>
																	</a>
																</button>
															</div>
															<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header no-bd">
																					<h5 class="modal-title">
																						<span class="fw-mediumbold">Cập nhật trạng thái đơn hàng</span> 
																					</h5>
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																					</button>
																				</div>
																				
																				<div class="modal-body">
																					<p class="small">Mã đơn hàng: {{$order->OrderId}} </p>
																					<form>
																						<div class="row">
																						
																							<div class="col-md-6 pr-0 ">
																									<select class="form-select form-select-sm" aria-label=".form-select-sm example">
																										<option selected>{{$order->OrderStatus}}</option>
																										<option value="2">Confirmed</option>
																										<option value="3">Shipped</option>
																										<option value="3">Delivering</option>
																										<option value="3">Completed</option>
																									</select>
																							</div>
																							<div class="col-md-6 ">
																									<div class="custom-control custom-checkbox">
																											<input type="checkbox" class="custom-control-input" id="defaultChecked2" checked>
																											<label class="custom-control-label" for="defaultChecked2">Gửi email cho khách hàng</label>
																									</div>
																							</div>
																							
																						</div>
																					</form>
																				</div>
																				<div class="modal-footer no-bd">
																					<button type="button" id="addRowButton" class="btn btn-primary">Lưu</button>
																					<button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
																				</div>
																			</div>
																		</div>
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
					$("#addOffice").val(),action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
@endsection