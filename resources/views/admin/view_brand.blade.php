@extends('admin_layout')
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
											<div class="modal-content">
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

												<div class="modal-body">
													<p class="small">Create a new row using this form, make sure you fill them all</p>
													<form role="form" action="{{URL::to('/save-brand')}}" method="post">
														{{ csrf_field() }}
														<div class="row">
															<div class="form-group">
																<label for="email2">Tên thương hiệu</label>
																<input type="text" name="brand_name" class="form-control" id="email2" placeholder="Nhập tên danh mục">
															</div>

															<div class="form-group">
																<label for="comment">Mô tả thương hiệu</label>
																<textarea class="form-control" name="description" id="comment" rows="5" placeholder="Mô tả danh mục"></textarea>
															</div>

															<div class="form-group">
																<label class="form-label d-block">Hiển thị</label>
																<div class="selectgroup selectgroup-secondary selectgroup-pills">
																	<label class="selectgroup-item">
																			<input type="radio" name="status" value="1" class="selectgroup-input" checked="">
																		<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
																	</label>
																	<label class="selectgroup-item">
																			<input type="radio" name="status" value="0" class="selectgroup-input">
																		<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
																	</label>
																</div>
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
														<th>Mã thương hiệu</th>
														<th>Tên thương hiệu</th>
														<th>Mô tả thương hiệu</th>
														<th>Hiển thị</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Name</th>
														<th>Position</th>
														<th>Office</th>
														<th>Age</th>
														<th>Salary</th>
													</tr>
												</tfoot>
												<tbody>
													@foreach($all_brand as $key => $brand)
													<tr>
														<td>{{$brand->brand_id}}</td>
														<td>{{$brand->brand_name}}</td>
														<td>{{$brand->description}}</td>
														<td>
															<?php
																if($brand->status == 1){
															?>	
																	<!-- Chú ý: https://fontawesome.com/v5.15/icons/eye?style=solid icon này lấy ở đây -->
																	<a href="{{URL::to('/unactive-brand/'.$brand->brand_id)}}"><span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span></a>
															<?php
																}else{
															?>	
																	<a href="{{URL::to('/active-brand/'.$brand->brand_id)}}"><span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span></a>
															<?php
																}
															?>
														</td>

														<td>
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																	<a href="{{URL::to('/update-brand/'.$brand->brand_id)}}" class="active" ui-toggle-class="">
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																	<a onclick="return confirm('Bạn cho chắc muốn xóa danh mục này không?')" href="{{URL::to('/delete-brand/'.$brand->brand_id)}}" class="active" ui-toggle-class="">
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
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
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
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
    <script src="{{asset('public/admin/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('public/admin/js/core/popper.min.js')}}"></script>
	<script src="{{asset('public/admin//js/core/bootstrap.min.js')}}"></script>
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