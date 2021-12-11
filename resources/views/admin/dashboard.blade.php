@extends('admin_layout')
@section('admin_content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<form>
									@csrf
								<h2 class="text-white pb-2 fw-bold">Thống kê bán hàng</h2>
								<div class="ml-md-auto py-2 py-md-3">
									<a class="text-white fw-bold" style="margin-right: 8px;">Thời gian báo cáo</a> 
									<a class="btn btn-white btn-border mr-2" > 
										<span class="btn-label"><i class="fas fa-calendar-alt"></i></span>
										Từ ngày: <input type="date" class="form-control" id="tu-ngay" min="2020-01-01" style="display:inline-block; width: 65%;" required>
									</a>
									<a class="btn btn-white btn-border mr-2"> 
										<span class="btn-label" >
											<i class="fas fa-calendar-alt"></i>
										</span>
										Đến ngày: <input type="date" class="form-control" id="den-ngay" min="2020-01-01" style="display:inline-block; width: 65%;" required>
									</a>
									
									<button type="button" id="btn-hien-thi-thong-ke" class="btn btn-success" style=" background: #39A2DB !important; padding: 10px;">Hiển thị kết quả</button>
									
									<a class="btn btn-white btn-border mr-2"> 
										<span class="btn-label" >
											<i class="fas fa-calendar-alt"></i>
										</span>
										Lọc theo:
										<select name="" id="sel-loc-theo" class="form-control" style="display:inline-block; width: 62%; margin">
											<option>----Chọn----</option>
											<option value="7ngay">7 ngày qua</option>
											<option value="thangtruoc">Tháng trước</option>
											<option value="thangnay">Tháng này</option>
											<option value="namqua">1 năm qua</option>
										</select>
										 <!-- <input type="date" class="form-control" id="den-ngay" min="2020-01-01" style="display:inline-block; width: 65%;" required> -->
									</a>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
				<div class="row row-card-no-pd mt--2">
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<!-- <i class="flaticon-chart-pie text-warning"></i> -->
													<i class="fas fa-users text-warning"></i>
												</div>
											</div>
											
											<div class="col-7 col-stats">
												<div class="numbers">
												
													<p class="card-category">Khách hàng</p>
													
													<h4 class="card-title">{{$number_of_customer}} <div class="float-right text-warning">(+7%)</div></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<!-- <i class="flaticon-coins text-success"></i> -->
													<i class="fas fa-boxes text-success"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Sản phẩm</p>
													<h4 class="card-title">{{$number_of_product}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<!-- <i class="flaticon-error text-danger"></i> -->
													<i class="fas fa-shopping-cart  text-danger"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Đơn hàng</p>
													<h4 class="card-title">{{$number_of_order}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<!-- <i class="flaticon-twitter text-primary"></i> -->
													<i class="fas fa-comment-dots text-primary"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Lượt truy cập</p>
													<h4 class="card-title">{{$login_namnay}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Chỉ số quan trọng</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Doanh Thu</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Đơn hàng</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Lượt truy cập</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div> -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Biểu đồ doanh thu</div>
										<div class="card-tools">
											<a target="_blank" rel="noopener noreferrer" id="print-revenue-report" href="{{URL::to('/print-revenue-report')}}" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												In thống kê doanh thu
											</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" style="min-height: 375px">
										<!-- <canvas id="statisticsChart"></canvas> -->
										<div id="bieuDoDoanhThu"></div>
										<!-- <div id="myfirstchart" style="height: 250px;"></div> -->
									</div>
									<!-- <div id="myChartLegend"></div> -->
									
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card card-primary">
								<div class="card-header">
									<div class="card-title">Doanh thu tháng <?php echo date('m') ?></div>
									<div class="card-category"><?php echo date('F j, Y',strtotime("first day of this month")).' - '.date('F j, Y'); ?></div>
								</div>
								<div class="card-body pb-0">
									<div class="mb-4 mt-2">
										<h1>{{number_format($this_month_revenue->totalProfit).' '.'₫'}}</h1>
									</div>
									<!-- <div class="pull-in">
										<canvas id="dailySalesChart"></canvas>
									</div> -->
								</div>
							</div>
							<div class="card">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right text-warning">(+7%)</div>
									<h2 class="mb-2">{{$order_homnay}}</h2>
									<p class="text-muted">Số đơn hàng mới hôm nay</p>
									<div class="pull-in sparkline-fix">
										<!-- <div id="lineChart"></div> -->
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right text-warning">(+30%)</div>
									<h2 class="mb-2">{{$login_today}}</h2>
									<p class="text-muted">Lượt truy cập hôm nay</p>
									<div class="pull-in sparkline-fix">
										<!-- <div id="lineChart"></div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Thống kê tình trạng đơn hàng<p class="text-muted">30 ngày gần đây</p></div>
										
										<div class="card-tools">
											<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
												Export
											</a>
											<a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print
											</a>
										</div>
										
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" >
									<form>
									@csrf
										<div id="pieChart" style="height: 250px;"></div>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<?php $last_month = date("m",strtotime("-1 month"));
										$now_month = date('m');
									?>
								<div class="card-header">
									<div class="card-title"><i class="fas fa-fire" style="color:red;"></i> Top sản phẩm bán chạy</div>
									<small class="text-muted">Tháng {{$last_month}} và tháng {{$now_month}}</small>
									<a target="_blank" style="float:right" rel="noopener noreferrer" id="print-product-report" href="{{URL::to('/print-product-report')}}" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												In thống kê sản phẩm
											</a>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive table-hover table-sales">
												<table class="table">
													<thead>
														<tr>
															<th colspan="2">Sản phẩm</th>
															<th>Ngày mở bán</th>
															<th>Doanh thu đem lại</th>
															<th class="text-right">Số sản phẩm bán được</th>
															<th class="text-right">Số sản phẩm còn lại</th>
															<!-- Số sản phẩm còn lại để biết cần nhập thêm nữa không -->
														</tr>
													</thead>
													<tbody>
														@foreach($top_product as $key => $item)
														<tr>
															<td>
																<div class="avatar">
																	<img src="{{URL::to('public/images_upload/product/'.$item->ProductImage)}}" alt="..." class="avatar-img rounded">
																</div>
															</td>
															<td>
																<h6 class="fw-bold mb-1"><a href="{{URL::to('/product-detail/'.$item->ProductId)}}">{{$item->ProductName}}</a></h6>
															</td>
															<td>
																{{date("d/m/Y", strtotime($item->StartsAt))}}
															</td>
															<td>
																<h4 class="text-info fw-bold">+{{number_format($item->number_solded * ($item->Price - $item->Cost)).' '.'₫'}}</h4>
															</td>
															<td class="text-right">
																<h4 class="text-info fw-bold">{{$item->number_solded}}</h4>
															</td>
															<td  class="text-right">
																<h4 class="text-info">{{$item->Quantity}}</h4>
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

					<div class="row">
						<div class="col-md-4">
							<div class="card" style="height:510px">
								<div class="card-header">
									<?php $last_month = date("m",strtotime("-1 month"));
										$now_month = date('m');
									?>
									<div class="card-title"><i class="fas fa-fire" style="color:red;"></i>  Bài viết được xem nhiều nhất</div>
									<!-- <small class="text-muted">Tháng {{$last_month}} và tháng {{$now_month}}</small> -->
								</div>
								<div class="card-body pb-20">
									@foreach($top_blog_view as $key => $item)
									<div class="d-flex">
										<div class="avatar">
											<img src="{{URL::to('public/images_upload/blog/'.$item->Image)}}" alt="..." class="avatar-img rounded border">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1"><a href="{{URL::to('/blog-detail/'.$item->BlogId)}}">{{$item->Title}}</a></h6>
											<small class="text-muted"></small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">{{$item->View}}</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card" style="height:510px">
								<div class="card-header">
									<div class="card-title"><i class="fas fa-eye text-success"></i> Sản phẩm được xem nhiều nhất</div>
									<small class="text-muted">Tháng {{$last_month}} và tháng {{$now_month}}</small>
								</div>
								<div class="card-body pb-20">
									@foreach($top_product_view as $key => $item)
									<div class="d-flex">
										<div class="avatar">
											<img src="{{URL::to('public/images_upload/product/'.$item->ProductImage)}}" alt="..." class="avatar-img rounded border">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1"><a href="{{URL::to('/product-detail/'.$item->ProductId)}}">{{$item->ProductName}}</a></h6>
											<small class="text-muted">Ngày mở bán: {{date("d/m/Y", strtotime($item->StartsAt))}}</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">{{$item->View}}</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									@endforeach
									<!-- <div class="pull-in">
										<canvas id="topProductsChart"></canvas>
									</div> -->
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card" style="height:510px">
								<div class="card-header">
									<div class="card-title"><i class="fas fa-warehouse" style="color:green;"></i> Sản phẩm tồn kho</div>
								</div>
								<div class="card-body pb-0">
									@foreach($inventory_list as $key => $item)
									<div class="d-flex">
										<div class="avatar">
											<img src="{{URL::to('public/images_upload/product/'.$item->ProductImage)}}" alt="..." class="avatar-img rounded border">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1"><a href="{{URL::to('/product-detail/'.$item->ProductId)}}">{{$item->ProductName}}</a></h6>
											<small class="text-muted">Ngày mở bán: {{date("d/m/Y", strtotime($item->StartsAt))}}</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">{{$item->Quantity}}</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									@endforeach
									<!-- <div class="pull-in">
										<canvas id="topProductsChart"></canvas>
									</div> -->
								</div>
							</div>
						</div>
						<!-- <div class="col-md-4">
							<div class="card card-primary bg-primary-gradient">
								<div class="card-body">
									<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
									<h1 class="mb-4 fw-bold">17</h1>
									<h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
									<div id="activeUsersChart"></div>
									<h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
									<ul class="list-unstyled">
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/readypro/index.html</small> <span>7</span></li>
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/atlantis/demo.html</small> <span>10</span></li>
									</ul>
								</div>
							</div>
						</div> -->
					</div>
					<div class="row">
						<!-- <div class="col-md-6">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-title">Feed Activity</div>
								</div>
								<div class="card-body">
									<ol class="activity-feed">
										<li class="feed-item feed-item-secondary">
											<time class="date" datetime="9-25">Sep 25</time>
											<span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-success">
											<time class="date" datetime="9-24">Sep 24</time>
											<span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
										</li>
										<li class="feed-item feed-item-info">
											<time class="date" datetime="9-23">Sep 23</time>
											<span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
										</li>
										<li class="feed-item feed-item-warning">
											<time class="date" datetime="9-21">Sep 21</time>
											<span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-danger">
											<time class="date" datetime="9-18">Sep 18</time>
											<span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
										</li>
										<li class="feed-item">
											<time class="date" datetime="9-17">Sep 17</time>
											<span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
										</li>
									</ol>
								</div>
							</div>
						</div> -->
						<!-- <div class="col-md-6">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Bài viết xem nhiều nhất</div>
										<div class="card-tools">
											<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<div class="avatar avatar-online">
											<span class="avatar-title rounded-circle border border-white bg-info">J</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
											<span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">8:40 PM</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">1 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div> 
										<div class="float-right pt-1">
											<small class="text-muted">2 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<div class="card-head-row">
											<h4 class="card-title">Thống kê lượt truy cập</h4>
											<div class="card-tools">
												<button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
												<button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
												<button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
											</div>
										</div>
										<!-- <p class="card-category">
										Map of the distribution of users around the world</p> -->
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="table-responsive table-hover table-sales">
													<table class="table">
														<thead>
															<tr>
																<th>Thời điểm</th>
																<th>Tổng lượng truy cập</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="text-left">
																	Đang online
																</td>
																<td class="text-right">
																	1
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	Hôm nay
																</td>
																<td class="text-right">
																	{{$login_today}} lượt truy cập
																</td>
															</tr>
															<tr>
																<td class="text-left"">
																	Tháng nay
																</td>
																<td class="text-right">
																	{{$login_thangnay}} lượt truy cập
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	Tháng trước
																</td>
																<td class="text-right">
																	{{$login_thangtruoc}} lượt truy cập
																</td>
															</tr>
															<tr>
																<td class="text-left">
																	Một năm qua
																</td>
																<td class="text-right">
																	{{$login_namnay}} lượt truy cập
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="col-md-8">
							<div class="card" style="height:490px">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Lượt truy cập<p class="text-muted">7 ngày gần đây</p></div>
										
										<div class="card-tools">
											<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
												Export
											</a>
											<a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print
											</a>
										</div>
										
									</div>
								</div>
								<div class="card-body">
									<h4 class="mb-1 fw-bold"></h4>
									<!-- <div id="task-complete" class="chart-circle mt-4 mb-3"></div> -->
									<form>
									@csrf
										<div id="lineChart" style="height: 250px;"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <a href="{{url('/load-pie-chart')}}">HiHI</a> -->
<script>
	$(document).ready(function(){
		load_pie_chart();
		load_default_chart();
		load_access_chart();
		// var today = new Date();
		// $('#tu-ngay').attr('max', today);
		var line_chart = new Morris.Line({
			element: 'lineChart',
			lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
			pointFillColors:['#ffffff'],
			pointStrokeColors:['black'],
			fillOpacity: 0.6,
			hideHover: 'auto',
			parseTime: false,
			xkey: 'period',
			ykeys:['number_access'],
			behaveLikeLine: true,
			labels: ['Lượng truy cập']
		});
		function load_access_chart()
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
					url:"{{url('/load-access-chart')}}",
					method: "POST",
					dataType:"json",
					data:{ _token: _token},
					success:function(data)
					{
						line_chart.setData(data);
					},
					error:function(data)
					{
						swal({
						text: "Không tìm thấy dữ liệu",
						icon: "error",
						});
					}
				});
		}

		var pie_chart = new Morris.Donut({
			element: 'pieChart',
			resize: true,
			colors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
			data: [
				{ label: 'Đã tiếp nhận', value: 20 },
				{ label: 'Đang vận chuyển', value: 10 },
				{ label: 'Đã hủy', value: 5 },
				{ label: 'Đã xác nhận', value: 5 },
				{ label: 'Hoàn thành', value: 20 }
			],
		});
		setInterval(load_pie_chart, 3000);

		function load_pie_chart()
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
					url:"{{url('/load-pie-chart')}}",
					method: "POST",
					dataType:"json",
					data:{ _token: _token},
					success:function(data)
					{
						pie_chart.setData(data);
					},
					error:function(data)
					{
						swal({
						text: "Không tìm thấy dữ liệu",
						icon: "error",
						});
					}
				});
		}

		function load_default_chart()
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
					url:"{{url('/load-default-chart')}}",
					method: "POST",
					dataType:"json",
					data:{ _token: _token},
					success:function(data)
					{
						chart.setData(data);
					},
					error:function(data)
					{
						swal({
						text: "Không tìm thấy dữ liệu",
						icon: "error",
						});
					}
				});
		}

		$('#sel-loc-theo').change(function(){
			var _token = $('input[name="_token"]').val();
			var time_span = $('#sel-loc-theo').val();
			if(time_span != '----Chọn----')
			{
				$.ajax({
					url:"{{url('/filter-by-time-span')}}",
					method: "POST",
					dataType:"json",
					data:{ time_span: time_span, _token: _token},
					success:function(data)
					{
						chart.setData(data);
					},
					error:function(data)
					{
						swal({
						text: "Không tìm thấy dữ liệu",
						icon: "error",
						});
					}
				});
			}
			
		});

		var chart = new Morris.Bar({
			element: 'bieuDoDoanhThu',
			lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
			pointFillColors:['#ffffff'],
			pointStrokeColors:['black'],
			fillOpacity: 0.6,
			hideHover: 'auto',
			parseTime: false,
			xkey: 'period',
			ykeys:['sales', 'profit'],
			behaveLikeLine: true,
			labels: ['Bán hàng', 'Doanh thu']
		});

		$('#btn-hien-thi-thong-ke').click(function(){
			var _token = $('input[name="_token"]').val();
			var tu_ngay = $('#tu-ngay').val();
			var den_ngay = $('#den-ngay').val();
			if(!tu_ngay || !den_ngay)
			{
				swal({
					text: "Vui lòng chọn thời gian báo cáo",
					icon: "info",
					});
			}
			else if(den_ngay < tu_ngay)
			{
				swal({
					text: "Ngày báo cáo không hợp lệ! Vui lòng nhập lại",
					icon: "info",
					});
			}
			else
			{
				$.ajax({
					url:"{{url('/filter-by-date')}}",
					method: "POST",
					dataType:"json",
					data:{tu_ngay: tu_ngay, den_ngay: den_ngay, _token: _token},
					success:function(data)
					{
						chart.setData(data);
						var newURL = "{{URL::to('/print-revenue-report/tu-ngay/den-ngay')}}";
						newURL = newURL.replace('tu-ngay', tu_ngay);
						newURL = newURL.replace('den-ngay', den_ngay);
						$('#print-revenue-report').attr("href", newURL);
						var newProductURL = "{{URL::to('/print-product-report/tu-ngay/den-ngay')}}";
						newProductURL = newProductURL.replace('tu-ngay', tu_ngay);
						newProductURL = newProductURL.replace('den-ngay', den_ngay);
						$('#print-product-report').attr("href", newProductURL);
					},
					error:function(data)
					{
						swal({
						text: "Không tìm thấy dữ liệu",
						icon: "error",
						});
					}
				});

			}
			
		});
	});
</script>
@endsection