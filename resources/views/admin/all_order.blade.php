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
												<tr style=" font-size: 12px; font-weight: 500; text-align: center;">
													<th>ID</th>
													<th>Khách hàng</th>
													<th>Tổng đơn hàng</th>
													<th>Trạng thái đơn hàng</th>
													<th>Trạng thái thanh toán</th>
													
													<th> Thao tác </th>
												</tr>
											</thead>
											
											<tbody>
												@foreach($all_order as $key => $order)
												<tr>
													<td>
														<a href="{{URL::to('/order_detail/'.$order->OrderId)}}">
															<span class="OrderId">{{$order->OrderId}}</span>
														</a>
													</td>
													<?php
														$firstName = $order->FirstName;
														$lastName = $order->LastName;
														$fullname = $lastName.' '.$firstName ;
													?>
													<td>{{$fullname}}</td>
													<td>{{number_format($order->Total, 0, " ", ".").' ₫'}}</td> 
													
													<td class="OrderStatus" style="color: #77ACF1; font-size: 14px; font-weight: 600; text-align: center;">{{$order->OrderStatus}}<!-- CHÚ Ý !!!! Không thêm khoảng cách (SPACE) vô đây, tránh bị lỗi js  --></td>
													<td class= "PaymentStatus" style="color: #77ACF1; font-size: 14px; font-weight: 600; text-align: center;">@if($order->OrderStatus != 'Đã hủy'){{$order->PaymentStatus}}@else - @endif<!-- CHÚ Ý !!!! Không thêm khoảng cách (SPACE) vô đây, tránh bị lỗi js  --></td>
													
													<td>
														@if($order->OrderStatus != 'Đã hủy')
															<div class="form-button-action" >
																<button type="button" data-target="#addRowModal" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg btn-update-order" data-original-title="Cập nhật trạng thái đơn hàng" >
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
														@endif	
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
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
																					<!-- <form action="{{url('/update-order/'.$order->OrderId)}}" method="POST">
																						@csrf -->
																						<input type="text" id="ma-don-hang-hidden" value="" hidden>
																						<h1 class="small" id="ma-don-hang">Mã đơn hàng: {{$order->OrderId}} </h1>
																						<div class="row">
																							<div class="col-md-12 pr-0" style="margin-bottom:30px">
																								<b style="margin-bottom:15px">Trạng thái đơn hàng</b>
																									<select class="form-control" id="trang-thai-don-hang"  name="status" aria-label=".form-select-sm example" style="width:90%;margin-top: 10px">
																										<option value="Đặt hàng thành công">Đặt hàng thành công</option>
																										<option value="Đã tiếp nhận đơn hàng">Đã tiếp nhận đơn hàng</option>
																										<option value="Đang lấy hàng">Đang lấy hàng</option>
																										<option value="Đang đóng gói">Đang đóng gói</option>
																										<option value="Đã giao cho đơn vị vận chuyển">Đã giao cho đơn vị vận chuyển</option>
																										<option value="Đang giao hàng">Đang giao hàng</option>
																										<option value="Giao hàng thành công">Giao hàng thành công</option>
																									</select>
																							</div>
																							<div class="col-md-12 pr-0">
																							<b style="margin-bottom:15px">Trạng thái thanh toán</b>
																									<select class="form-control" name="payment" id="trang-thai-thanh-toan" aria-label=".form-select-sm example"  style="width:90%;margin-top: 10px">
																										<option value="Đã thanh toán">Đã thanh toán</option>
																										<option value="Chờ thanh toán">Chờ thanh toán</option>
																									</select>
																							</div>
																						</div>
																						<div class="modal-footer no-bd">
																							<button type="button" class="btn btn-primary btn-luu-update-order" data-dismiss="modal">Lưu</button>
																							<button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
																						</div>
																					<!-- </form> -->
																				</div>
																				
																			</div>
																		</div>
																</div>
									</div>
								</div>
							</div>
						</div>

						
		</div>
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
	<script>
		var local_parent;
		$(document).ready(function() { 
			

			$('.btn-update-order').click(function(){ 
				var parent = $(this).parents('tr'); 
				local_parent = parent;
				var OrderId = parent.find('.OrderId').text(); 
				var OrderStatus = parent.find('.OrderStatus').text(); 
				var PaymentStatus = parent.find('.PaymentStatus').text(); 
				$('#ma-don-hang').text("Mã đơn hàng: " + OrderId); 
				$('#ma-don-hang-hidden').val(OrderId);
				$('#trang-thai-don-hang option[value="'+OrderStatus+'"]').attr('selected','selected');
				$('#trang-thai-thanh-toan option[value="'+ PaymentStatus +'"]').attr('selected','selected');
				// alert(local_parent.attr('class'));
				}); 
			});

			$('.btn-luu-update-order').click(function(){
				
				var OrderId = $('#ma-don-hang-hidden').val();
				var OrderStatus = $('#trang-thai-don-hang').val();
				var PaymentStatus = $('#trang-thai-thanh-toan').val(); 
				$.ajax({
					url: '{{URL::to('/update-order-status')}}',
					method:"GET",
					data:{OrderId: OrderId, OrderStatus: OrderStatus, PaymentStatus: PaymentStatus},
					success:function(data)
					{
						$('#addRowModal').modal('hide');
						local_parent.find('.OrderStatus').text(OrderStatus);
						local_parent.find('.PaymentStatus').text(PaymentStatus);
						swal({
						text: "Cập nhật trạng thái đơn hàng thành công!",
						icon: "success",
						});
					},
					error:function(data)
					{
						swal({
						text: "Cập nhật trạng thái đơn hàng không thành công!",
						icon: "error",
						});
					}	
				});
			});
	</script>
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
					$(".sel-status").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
@endsection