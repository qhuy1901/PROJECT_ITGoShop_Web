@extends('admin_layout')
@section('title', 'Đánh giá sản phẩm - ITGoShop')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Đánh giá sản phẩm</h4>
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
								<a href="#">Xem đánh giá sản phẩm</a>
							</li>
						</ul>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Danh sách nhận xét - đánh giá từ khách hàng</h4>
										
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
											<table id="multi-filter-select" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th style="width:15%">Ngày tạo</th>
														<th style="width:20%">Tên sản phẩm</th>
														<th style="width:20%">Tên khách hàng</th>
														<th style="width:40%">Nội dung</th>
														<th>Hành động</th>
													</tr>
												</thead>
												<tfoot>
                                                    <tr>
														<th>Ngày tạo</th>
														<th>Tên sản phẩm</th>
														<th>Tên khách hàng</th>
														<th>Nội dung</th>
														<th></th>
													</tr>
												</tfoot>
												<tbody>
                                                    @foreach($all_rating as $item)
													<tr>
														<input type="text" class="UserId" value="{{$item->UserId}}" hidden>
														<input type="text" class="ProductId" value="{{$item->ProductId}}" hidden>
														<td>{{date("d-m-Y", strtotime($item->CreatedAt))}}</td>
														<td><a target="_blank" rel="noopener noreferrer" href="{{URL::to('/product-detail/'.$item->ProductId)}}" style="text-decoration:none;color:black;">{{$item->ProductName}}</a></td>
                                                        <td>{{$item->LastName}} {{$item->FirstName}}</td>
                                                        <td>
														<div class="star-wrapper" style="display: inline-block;font-size:6px">
															@if($item->Rating == 5)
															<a href="javascript:void(0)" class="fa fa-star s1" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($item->Rating == 4)
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($item->Rating == 3)
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@elseif($item->Rating == 2)
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4" style="color:gold"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@else 
															<a href="javascript:void(0)" class="fa fa-star s1"></a>
															<a href="javascript:void(0)" class="fa fa-star s2"></a>
															<a href="javascript:void(0)" class="fa fa-star s3"></a>
															<a href="javascript:void(0)" class="fa fa-star s4"></a>
															<a href="javascript:void(0)" class="fa fa-star s5" style="color:gold"></a>
															@endif
														</div>
														<b>{{$item->Title}}</b> <br>
														"{{$item->Content}}"
														</td>
                                                        <td>
                                                            <div class="form-button-action">
																@if($item->ProductRatingStatus  == 1)
																<!-- Chú ý: https://fontawesome.com/v5.15/icons/eye?style=solid icon này lấy ở đây -->
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị đánh giá">
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn đánh giá" hidden>
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>	
																@else	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Hiển thị đánh giá" hidden>
																		<span class="fa-thumb-styling fa fa-eye" style="font-size:18px"></span>
																	</button>	
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ẩn đánh giá">
																		<span class="fa-thumb-styling fa fa-eye-slash" style="color:red; font-size:18px"></span>
																	</button>
																@endif
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa đánh giá">
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
/* ul.pagination{
	left:0 !important
} */
	.star-wrapper {
  direction: rtl;
}
.star-wrapper a {
  font-size: 2em;
  color: #DEDDE3;
  text-decoration: none;
  transition: all 0.5s;
  margin: 4px;
}
/* .star-wrapper a:hover {
  color: gold;
  transform: scale(1.3);
} */
.wraper {
  position: absolute;
  bottom: 30px;
  right: 50px;
}
</style>
	<a href="{{URL::to('/unactive-rating')}}">hello</a>
	<script>
		$(document).ready(function(){
			$('button[data-original-title="Hiển thị đánh giá"]').click(function(){
				var UserId = $(this).parents('tr').find('.UserId').val();
				var ProductId = $(this).parents('tr').find('.ProductId').val();
				var activeButton = $(this);
				var unactiveButton = $(this).parent().find('button[data-original-title="Ẩn đánh giá"]');
				$.ajax({
					url: '{{URL::to('/unactive-rating')}}',
					method:"GET",
					data:{UserId: UserId, ProductId: ProductId},
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

			$('button[data-original-title="Ẩn đánh giá"]').click(function(){
				var UserId = $(this).parents('tr').find('.UserId').val();
				var ProductId = $(this).parents('tr').find('.ProductId').val();
				var unactiveButton = $(this);
				var activeButton = $(this).parent().find('button[data-original-title="Hiển thị đánh giá"]');
				$.ajax({
					url: '{{URL::to('/active-rating')}}',
					method:"GET",
					data:{UserId: UserId, ProductId: ProductId},
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

			$('button[data-original-title="Xóa đánh giá"]').click(function(){
				var UserId = $(this).parents('tr').find('.UserId').val();
				var ProductId = $(this).parents('tr').find('.ProductId').val();
				var thisSlider = $(this).parents('tr');
				swal({
					title: "Xác nhận",
					text: "Bạn có chắc muốn xóa đánh giá này không?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: '{{URL::to('/delete-rating')}}',
							method:"GET",
							data:{UserId: UserId, ProductId: ProductId},
							success:function(data)
							{
								thisSlider.remove();
								swal("Xóa đánh giá thành công!", {
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

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật đánh giá"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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