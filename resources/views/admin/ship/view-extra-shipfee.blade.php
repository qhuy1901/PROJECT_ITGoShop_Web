@extends('admin_layout')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">QUẢN LÝ VẬN CHUYỂN</h4>
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
								<a href="#">Vận chuyển</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Xem phí vận chuyển theo quận, huyện</a>
							</li>
						</ul>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Danh sách phương thức vận chuyển</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
											<table id="multi-filter-select" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>Mã quận, huyện</th>
														<th style="max-width:320px">Tên quận huyện</th>
														<th>Phí vận chuyển thêm</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<tbody>
                                                    @foreach($extra_shipfee as $key => $item)
													<tr>
														<td>{{$item->maqh}} </td>
														<td>{{$item->quanhuyen}}, {{$item->tinhtp}} </td>
                                                        <td contenteditable class="edit-extra-shipfee" data-maqh="{{$item->maqh}}">{{number_format($item->ExtraShippingFee, 0, " ", ".").' ₫'}}</td>
                                                        <td>
                                                            <div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật phương thức vận chuyển">
																	<a href="javascript:void(0)" class="active" ui-toggle-class="">
																		<i class="fa fa-edit text-active"></i>
																	</a>
																</button>
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa phương thức vận chuyển">
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
            <!--<a href="{{URL::to('/update-extra-shipfee')}}">Hello</a>-->
            <script>
                function numberWithCommas(x) // Hàm để format tiền
                {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
                $(document).ready(function(){
                    $('body').on('blur', '.edit-extra-shipfee', function(){
                        var maqh = $(this).data('maqh');
                        var ExtraShippingFee = ($(this).text().replace('₫', '')).replace('.', '');
                        $(this).text(numberWithCommas(ExtraShippingFee) + " ₫");
                        $.ajax({
                            url: "{{URL::to('/update-extra-shipfee')}}",
                            methed:"GET",
                            data:{maqh:maqh, ExtraShippingFee: ExtraShippingFee},
                            error:function(data)
                            {
                                alert(ExtraShippingFee);
                                alert('Lỗi');
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
				"pageLength": 25,
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
				"pageLength": 50,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật Vận chuyển"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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

