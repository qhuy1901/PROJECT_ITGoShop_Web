
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
          @foreach($order_detail  as $key => $order)
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                  <div class="row align-items-center">
                    {{csrf_field()}}
                    <div class="col-lg-6 col-md-6">
                      <span>
                        <i class="fas fa-calendar-alt"></i> <b>{{$order->OrderDate}}</b>  
                      </span> <br>
                      <small class="text-muted">Mã đơn hàng: {{$order->OrderId}}</small>
                    </div>
                    <div class="col-lg-6 col-md-6 ms-auto text-md-end" >
                      <a  class=" d-inline-block"  style="max-width: 200px; line-height: 1.5; border: 1px solid black; padding: 0.5rem  0.75rem ; border-radius: 0.25rem; " > {{$order->OrderStatus}}    </a>
                    </div>
                  </div>
                </header>
								</div>
								<div class="card-body">
                  <div class="row">
                        <div class="col-lg-4">
                          <div class="box shadow-sm bg-light">
                              <h5>Thông tin khách hàng</h5> 
                              <?php
                                  $Sum = 0;
                                  $firstName = $order->FirstName;
                                  $lastName = $order->LastName;
                                  $fullname = $lastName.$firstName ;
                              ?>
                                      <p>
                                      Họ Tên: {{$fullname}} <br>Email: {{$order->Email}} <br>Số điện thoại: {{$order->Mobile}}
                                      </p>
                          </div>
                          
                          <div class="box shadow-sm bg-light">
                                <h5>Thông tin giao hàng</h5> 
                                <p>
                                    Họ Tên Người Nhận: {{$default_shipping_address->ReceiverName}} 
                                    <br>Số Điện Thoại: {{$default_shipping_address->Phone}}
                                    <br>Địa Chỉ: {{$default_shipping_address->Address. ", " .$default_shipping_address->xaphuongthitran. ", " .$default_shipping_address->quanhuyen. ", " .$default_shipping_address->tinhthanhpho}}
                                    
                                </p>
                                
                          </div>
                          <div class="box shadow-sm bg-light">
                            <h5>Thông tin thanh toán</h5>
                            <p> 
                              Hình thức thanh toán: {{$order->PaymentMethod}}
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
                        @foreach($order_list as $key => $orderdetail)
                              @if($order->OrderId == $orderdetail->OrderId)
                          <tr>
                           
                                <td>
                                  <a style="position: relative; display: flex;  width: 100%; align-items: center;" class="itemside" >
                                      <div class="left">
                                          <img src="{{URL::to('public/images_upload/product/'.$orderdetail->ProductImage)}}" width="40" height="40" class="img-xs" alt="Item">
                                      </div>
                                      <div style="padding-left: 15px; padding-right: 7px;" class="info" >  {{$orderdetail->ProductName}}  </div>
                                  </a>
                                </td>
                                <td> {{number_format($orderdetail->Price).' '.'₫'}} </td>
                                <td> {{$orderdetail->OrderQuantity}} </td>
                                <?php

                                  $Thanhtien = $orderdetail->OrderQuantity * $orderdetail->Price;
                                  $Sum = $Sum + $Thanhtien;
                                ?>
                                <td style="text-align: right !important;"> {{number_format($Thanhtien).' '.'₫'}}  </td>
                           
                          </tr>
                          @endif
                          @endforeach
                          <?php

                          $SumO = $Sum + $order->ShipFee;
                          ?>
                          
                          <tr>
                            <td colspan="4"> 
                                <article style="float: right !important; " class="float-end ">
                                  <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;">Tổng cộng:</dt> <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;">{{number_format($Sum).' '.'₫'}}</dd> 
                                    </dl>
                                    <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;">Phí vận chuyển:</dt> <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;">{{number_format($order->	ShipFee).' '.'₫'}}</dd> 
                                    </dl>
                                    <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;">Tổng đơn hàng:</dt> <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;"> <b class="h5">{{number_format($SumO).' '.'₫'}}</b> </dd> 
                                    </dl>
                                    <dl style="display: flex;" class="dlist"> 
                                      <dt style="width: 150px; font-weight: normal;" class="text-muted">Trạng thái:</dt> 
                                      <dd>  
                                        <span style="color: #006d0e; background-color: #ccf0d1; border-color: #b3e9b9;"  class="badge rounded-pill  text-order">{{$order->PaymentStatus}} </span> 
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
          @endforeach
        </div>
      </div>
    </div>
    
									
@endsection