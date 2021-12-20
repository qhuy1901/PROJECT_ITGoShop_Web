<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn bán hàng - ITGoShop</title>
</head>
<body>
    <div class="card" style="margin: 40px 100px;">
      
      <div class="card-body" style="font-size:16px">
        <h2>Cảm ơn quý khách {{$OrderInfo->LastName . " " . $OrderInfo->FirstName}} đã đặt hàng tại ITGoShop,</h2>
        <p class="card-text">ITGoShop rất vui thông báo đơn hàng #{{$OrderInfo->OrderId}} của quý khách đã được tiếp nhận và đang trong quá trình xử lý. ITGoShop sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.</p>
        <p  class="card-text" style="color:#77ACF1;"><b>THÔNG TIN ĐƠN HÀNG #{{$OrderInfo->OrderId}}</b>  (Thời gian đặt hàng: {{date("H:i d/m/Y", strtotime($OrderInfo->OrderDate))}})</p>
        <hr>
        <p class="card-text"><b>Mô tả đơn hàng:</b> {{$OrderInfo->Description}}</p>
        <p class="card-text"><b>Địa chỉ giao hàng:</b></p>
        <p>Tên người nhận: {{$ShippingAddress->ReceiverName}}<p>
				<p>Địa chỉ: {{$ShippingAddress->Address. ", " .$ShippingAddress->xaphuongthitran. ", " .$ShippingAddress->quanhuyen. ", " .$ShippingAddress->tinhthanhpho}}<p>
				<p>Điện thoại: {{$ShippingAddress->Phone}}</p>
        <p class="card-text"><b>Phương thức thanh toán:</b> {{$OrderInfo->ShipMethod}}</p>
        <p class="card-text"><b>Thời gian giao hàng dự kiến: </b>dự kiến giao hàng vào ngày {{date("d-m-Y", strtotime($OrderInfo->EstimatedDeliveryTime))}}</p>
        <p class="card-text"><b>Phí vận chuyển: </b> {{number_format($OrderInfo->ShipFee, 0, " ", ".").' ₫'}}</p>
        <p class="card-text"><b>TỔNG TRỊ GIÁ ĐƠN HÀNG: </b><b style="color:red; font-size: 20px">{{number_format($OrderInfo->Total, 0, " ", ".").' ₫'}}</b></p>
        <p class="card-text">Trân trọng,</p>
        <p class="card-text">Đội ngũ ITGoShop.</p>
        <p class="card-text"><i>Lưu ý: Với những đơn hàng thanh toán trả trước, xin vui lòng đảm bảo người nhận hàng đúng thông tin đã đăng kí trong đơn hàng, và chuẩn bị giấy tờ tùy thân để đơn vị giao nhận có thể xác thực thông tin khi giao hàng</i></p>
      </div>
    </div>
    <div>
       
    </div>
</body>
</html>