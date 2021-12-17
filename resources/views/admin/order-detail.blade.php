@extends('admin_layout')
@section('title', 'Chi tiết đơn hàng - ITGoShop')
@section('admin_content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Chi tiết đơn hàng</h4>
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
                                        <i class="fas fa-calendar-alt"></i> <b>Ngày đặt hàng: {{$order_info->OrderDate}}</b>
                                    </span> <br>
                                    <small class="text-muted">Mã đơn hàng: {{$order_info->OrderId}}</small>
                                </div>
                                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                                    <a class=" d-inline-block" style="max-width: 200px; line-height: 1.5; border: 1px solid black; padding: 0.5rem  0.75rem ; border-radius: 0.25rem; "> {{$order_info->OrderStatus}}    </a>
                                </div>

                            </div>
                            </header>
                        </div>
                        <div class="card-body">
                            <div class="row" style="margin:30px 0px">
                                <div class="col-lg-4">
                                    <div class="box shadow-sm bg-light">
                                        <h5>Thông tin khách hàng</h5> <p> Họ Tên: {{$order_info->LastName}} {{$order_info->FirstName}}<br>Email: {{$order_info->Email}} <br>Số điện thoại: {{$order_info->Mobile}}</p>
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
                                            Hình thức thanh toán: {{$order_info->PaymentMethod}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table border table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th width="20%">Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th width="20%" class="text-end">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sum = 0?>
                                                @foreach ($order_detail as $key => $item)
                                    <tr>
                                        <td>
                                            <div class="info"> <img style="margin-right:20px;" src="{{URL::to('public/images_upload/product/'.$item->ProductImage)}}" width="40" height="40" class="img-xs" alt="Item"><a href="{{URL::to('/product-detail/'.$item->ProductId)}}"></a> {{$item->ProductName}}  </div>

                                        </td>
                                        <td> {{number_format($item->UnitPrice, 0, " ", ".").' ₫'}} </td>
                                        <td> x{{$item->OrderQuantity}} </td>
                                        <td style="text-align: right !important;"> {{number_format($item->UnitPrice * $item->OrderQuantity, 0, " ", ".").' ₫'}} </td>
                                    </tr>
                                                <?php $sum += $item->UnitPrice * $item->OrderQuantity?>
                                                @endforeach
                                                <tr>
                                                    <td colspan="4">
                                                        <article style="float: right !important; " class="float-end ">
                                                            <dl style="display: flex;" class="dlist">
                                                                <dt style="width: 150px; font-weight: normal;">Tổng cộng:</dt>
                                                                <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;">{{number_format($sum, 0, " ", ".").' ₫'}}</dd>
                                                            </dl>
                                                            <dl style="display: flex;" class="dlist">
                                                                <dt style="width: 150px; font-weight: normal;">Phí vận chuyển:</dt>
                                                                <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;">{{number_format($order_info->ShipFee, 0, " ", ".").' ₫'}}</dd>
                                                            </dl>
                                                            <dl style="display: flex;" class="dlist">
                                                                <dt style="width: 150px; font-weight: normal;">Tổng đơn hàng:</dt>
                                                                <dd style="margin-left: 30px; vertical-align: baseline; flex-grow: 1;  margin-bottom: 0;   text-align: right;"> <b class="h5">{{number_format($order_info->Total, 0, " ", ".").' ₫'}}</b> </dd>
                                                            </dl>
                                                            <dl style="display: flex;" class="dlist">
                                                                <dt style="width: 150px; font-weight: normal;" class="text-muted">Trạng thái:</dt>
                                                                <dd>
                                                                    <span style="color: #006d0e; background-color: #ccf0d1; border-color: #b3e9b9;" class="badge rounded-pill  text-order">{{$order_info->PaymentStatus}} </span>
                                                                </dd>
                                                            </dl>
                                                        </article>
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
            </div>
        </div>
    </div>


    @endsection
