@extends('admin_layout')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">QUẢN LÝ BANNER SLIDER</h4>
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
								<a href="#">Banner Slider</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Xem banner slider</a>
							</li>
						</ul>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Danh sách banner slider</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
												Thêm banner slider
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
																banner slider mới
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
														<th style="width:80px">Ngày tạo</th>
														<th style="max-width:320px">Tên banner slider</th>
														<th>Ảnh banner slider</th>
														<th style="max-width:30px">Trạng thái</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<tbody>
                                                    @foreach($all_slide as $key => $slide)
													<tr>
														<td>{{date("d-m-Y", strtotime($slide->CreatedAt))}}</td>
														<td>{{$slide->SliderName}}<input type="text" class="SliderId" value="{{$slide->SliderId}}" hidden></td>
                                                        <td><img src="public/images_upload/banner-slider/{{$slide->SliderImage}}" style="margin: 15px; max-width: 260px; max-height: 260px; width: auto; height: auto; "></td>
                                                        <td>
                                                            <div class="form-button-action">
																@if($slide->SliderStatus == 1)
																<!-- Chú ý: https://fontawesome.com/v5.15/icons/eye?style=solid icon này lấy ở đây -->
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị banner slider">
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn banner slider" hidden>
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>	
																@else	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị banner slider" hidden>
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn banner slider">
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>
																@endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật banner slider">
																	<a href="javascript:void(0)" class="active" ui-toggle-class="">
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa banner slider">
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
			$('button[data-original-title="Hiển thị banner slider"]').click(function(){
				var SliderId = $(this).parents('tr').find('.SliderId').val();
				var activeButton = $(this);
				var unactiveButton = $(this).parent().find('button[data-original-title="Ẩn banner slider"]');
				$.ajax({
					url: '{{URL::to('/unactive-banner-slider')}}',
					method:"GET",
					data:{SliderId: SliderId},
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

			$('button[data-original-title="Ẩn banner slider"]').click(function(){
				var SliderId = $(this).parents('tr').find('.SliderId').val();
				var unactiveButton = $(this);
				var activeButton = $(this).parent().find('button[data-original-title="Hiển thị banner slider"]');
				$.ajax({
					url: '{{URL::to('/active-banner-slider')}}',
					method:"GET",
					data:{SliderId: SliderId},
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

			$('button[data-original-title="Xóa banner slider"]').click(function(){
				var SliderId = $(this).parents('tr').find('.SliderId').val();
				var thisSlider = $(this).parents('tr');
				swal({
					title: "Xác nhận",
					text: "Bạn có chắc muốn xóa slider này không?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: '{{URL::to('/delete-banner-slider')}}',
							method:"GET",
							data:{SliderId: SliderId},
							success:function(data)
							{
								thisSlider.remove();
								swal("Xóa slider thành công!", {
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

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật banner slider"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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

