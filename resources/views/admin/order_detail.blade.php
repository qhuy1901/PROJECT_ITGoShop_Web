
@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Order detail</h4>
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
								<a href="#">Order</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Order detail</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                      <span>
                        <i class="fas fa-calendar-alt"></i> <b>Wed, Aug 13, 2020, 4:34PM</b>  
                      </span> <br>
                      <small class="text-muted">Mã đơn hàng: 3453012</small>
                    </div>
                    <div class="col-lg-6 col-md-6 ms-auto text-md-end" >
                      <a  class=" d-inline-block"  style="max-width: 200px; line-height: 1.5; border: 1px solid black; padding: 0.5rem  0.75rem ; border-radius: 0.25rem; " > Pending    </a>
                    </div>
                  </div>
                </header>
								</div>
								<div class="card-body">
                  <div class="row">
                        <div class="col-lg-4">
                          <div class="box shadow-sm bg-light">
                              <h5>Thông tin khách hàng</h5> 
                                      <p>
                                        John Alexander <br> alex@example.com <br> +998 99 22123456
                                      </p>
                          </div>
                          
                          <div class="box shadow-sm bg-light">
                                <h5>Địa chỉ giao hàng</h5> 
                                <p>
                                            City: Tashkent, Uzbekistan <br>Block A, House 123, Floor 2 <br> Po Box 10000
                                </p>
                          </div>
                          <div class="box shadow-sm bg-light">
                            <h5>Thông tin thanh toán</h5>
                            <p> 
                              Master Card **** **** 4768  <br>
                              Business name: Grand Market LLC <br>
                              Phone: +1 (800) 555-154-52
                            </p>
                          </div>
                        </div> 
                    <div class="col-lg-8">
                      <div class="table-responsive">
                      <table class="table border table-hover table-lg">
                        <thead>
                          <tr>
                            <th width="40%">Sản phẩm</th>
                            <th width="20%">Đơn giá</th>
                            <th width="20%">Số lượng</th>
                            <th width="20%" class="text-end">Thành tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr>
                            <td>
                              <a class="itemside" href="https://www.ecommerce-admin.com/demo/page-orders-detail.html#">
                                  <div class="left">
                                      <img src="./Sample title - Ecommerce admin dashboard template_files/2.jpg" width="40" height="40" class="img-xs" alt="Item">
                                  </div>
                                  <div class="info">  Winter jacket for men  </div>
                              </a>
                            </td>
                            <td> $7.50 </td>
                            <td> 2 </td>
                            <td style="text-align: right !important;">  $15.00  </td>
                          </tr>
                          
                          
                          <tr>
                            <td colspan="4"> 
                                <article style="float: right !important; " class="float-end ">
                                  <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;">Tổng cộng:</dt> <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;">$973.35</dd> 
                                    </dl>
                                    <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;">Phí vận chuyển:</dt> <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;">$10.00</dd> 
                                    </dl>
                                    <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;">Tổng đơn hàng:</dt> <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;"> <b class="h5">$983.00</b> </dd> 
                                    </dl>
                                    <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;" class="text-muted">Trạng thái:</dt> 
                                      <dd>  
                                        <span style="color: #006d0e; background-color: #ccf0d1; border-color: #b3e9b9;"  class="badge rounded-pill  text-order">Payment done</span> 
                                      </dd> 
                                    </dl>
                                </article>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </div> <!-- table-responsive// -->
                    </div>  <!-- col// -->
                    
                  </div>
                </div>
              </div>
            </div> 
          </div> 
        </div>
      </div>
    </div>

									
@endsection