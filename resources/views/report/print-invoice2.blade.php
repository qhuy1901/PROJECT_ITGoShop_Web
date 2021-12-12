<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In đơn hàng #{{$order_info->OrderId}}</title>
    <link rel="icon" type="image/png" href="{{URL::to('public/admin/images/pdf-icon.jpg')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container" style="font-size:22px;">
        <div class="row" style="margin-top: 40px;">
            <div class="col-sm-1">
                 <img src="{{URL::to('public/client/Images/logo3.png')}}" alt="">
            </div>
            <div class="col-sm-7">
                <b>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ ITGOSHOP</b>
                <p>Tầng 5, Số 117-119-121 Nguyễn Du, Phường Bến Thành, Quận 1, Thành Phố Hồ Chí Minh</p>
            </div>
            <div class="col-sm-4" style="text-align: right;">
                <p style="color:#F70C72;font-weight: bold;">"Tất cả vì khách hàng"</p>
            </div>
        </div>
        <hr style="margin:20px 0px 40px 0px">
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-12" style="text-align: center;">
                <b style="font-size: 26px;">HÓA ĐƠN BÁN HÀNG</b>
                <br><i>(Số hóa đơn: #{{$order_info->OrderId}})</i>
            </div>
            <div class="col-md-12" style="text-align: right;">
                <p>Ngày hóa đơn: 30/11/2021</p>
                <!-- <p>Người bán hàng: Lê Thị Hồng Cúc</p> -->
            </div>
        </div>
        <p><b style="font-size: 24px;">I. Thông tin hóa đơn</b></p>
        <div class="row">
            <div class="col-md-6">
                <p>Tên khách hàng: {{$order_info->LastName}} {{$order_info->FirstName}}</p>
                <p>Số điện thoại: {{$order_info->Mobile}}</p>
                <p>Địa chỉ: {{$default_shipping_address->Address. ", " .$default_shipping_address->xaphuongthitran. ", " .$default_shipping_address->quanhuyen. ", " .$default_shipping_address->tinhthanhpho}}</p>
                
            </div>
            <div class="col-md-6">
                <p>Hình thức giao hàng: {{$order_info->ShipMethod}}</p>
                <p>Hình thức thanh toán: {{$order_info->PaymentMethod}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">II. Chi tiết hóa đơn</b></p>
                <table class="table"> 
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th style="text-align:right">Thành tiền</th>
                    </tr>
                    <?php $sum = 0?>
                   @foreach($order_detail as $item) 
                    <tr>
                        <td>{{$item->ProductName}}</td>
                        <td>{{number_format($item->UnitPrice, 0, " ", ".").' ₫'}}</td>
                        <td>x{{$item->OrderQuantity}}</td>
                        <td style="text-align:right">{{number_format($item->UnitPrice * $item->OrderQuantity, 0, " ", ".").' ₫'}}</td>
                    </tr>
                    <?php $sum += $item->UnitPrice * $item->OrderQuantity?>
                    @endforeach
                    <tr>
                        <td colspan="2">
                        </td>
                        <td>
                            <p>Tạm tính</p>
                            <p>Giảm giá</p>
                            <p>Phí vận chuyển</p>
                            <p style="font-weight: bold;">Tổng cộng</p>
                        </td>
                        
                        <td style="text-align: right;">
                            <p>{{number_format($sum, 0, " ", ".").' ₫'}}</p>
                            <p>- 0 ₫</p>
                            <p>{{number_format($order_info->ShipFee, 0, " ", ".").' ₫'}}</p>
                            <p style="color: red; font-size: 24px;">{{number_format($order_info->Total, 0, " ", ".").' ₫'}}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4" style="text-align: center;">
                <p style="margin:20px 0px 100px 0px">
                    <b>Khách hàng</b><br>
                    <i>(Kí, đóng dấu và ghi rõ họ tên)</i>
                </p>
                
                <p>{{$order_info->LastName}} {{$order_info->FirstName}}</p>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4" style="text-align: center;">
                <p style="margin:20px 0px 100px 0px">
                    <b>Người lập hóa đơn</b><br>
                    <i>(Kí, đóng dấu và ghi rõ họ tên)</i>
                </p>
                
                <p>{{Session::get('LastName')}} {{Session::get('FirstName')}}</p>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-12" style="text-align: center;">
                <hr>
                <b>Cảm ơn quý khách đã tin tưởng và mua hàng tại ITGoShop!</b>
                <hr>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            window.print();
        });
    </script>
</body>
</html>