<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITGoShop - Hệ thống máy tính và phụ kiện</title>
</head>
<body>
    <div class="card" style="margin: 40px 100px;">
      <img src="https://lh3.googleusercontent.com/7GUtF9Gd14QM4jHIhXwNwW5AZCQDNbauFmKObH3Oa1bcdDI_8DaFYorS6GEYEp4Bnb0Ah1W72kwRYrTASNYinLNQLgIxLBTQtQzuPBGfHzyoHlJU3XjkqTP9BxKMeJelN8esvUHZMES6no3qpOq3F8AR9Arx05KZLqIzI8DYyTPsUus8nxC3zogAg_OOEyvrKDZDuHg5oirg8HuFKCHUTb-c5PzRvn6x3Fjn_hdBTh7roRmwl1xlI_tmujqs2-sKxQ8r-K8lCeoi2Ejxc5dc91b4bpis6X9JH3cSNio3JKr87HWO-1qdeBVcedmpimwU55JmS5ebv2YzjdciiUQXGomRMUQFHDpce6Zwj9g3hfs0ns67L91nh5_Ydcav6j9J5gM0PJse3gAw6cfiKPkB8mkgTeJE460Ki-w88wAF9VHCnibWOWsm76Z2bQqs3n_Kw1a6epqmanz5NVLyuqkdYo7YIvb1X-wQanekzE6vaIQu7ziO5Uh9HT3vZrm7cJu3L5rNQrhQRkT992MlvHRQjBhZWUGSezFctkOnDg3-bzOSCPCQAsw_0UR03yyUDXk9wXTCKaPfDWVSrCr3aBQiMiJySCdeo956H1skmix8qcaR4BFbrZTmqv7m9zeMXzeNQdb0jH-ePoS4k4e7tcJXJXoxa87FpgWqZoswvut-lm9g8vrjclHOIzO2aHeKF-HEGexNToMQzSgJU4TUb9ycyh9l=w220-h64-no?authuser=1" alt="" style="height: 50px;">
      <hr style="background-color: #77ACF1;padding: 2px;">
      <div class="card-body" style="font-size:16px">
        <h2>Đơn hàng {{$OrderInfo->OrderId}} của bạn đã hoàn thành!</h2>
        <p class="card-text">Xin chào {{$OrderInfo->LastName . " " . $OrderInfo->FirstName}}, <br> ITGoShop rất vui thông báo đơn hàng của bạn đã giao thành công!</p>
        <p  class="card-text" style="color:#77ACF1;"><b>THÔNG TIN ĐƠN HÀNG #{{$OrderInfo->OrderId}}</b>  (Thời gian đặt hàng: {{date("H:i d/m/Y", strtotime($OrderInfo->OrderDate))}})</p>
        <hr>
        <p class="card-text"><b>Mô tả đơn hàng:</b> {{$OrderInfo->Description}}</p>
        <p class="card-text"><b>Địa chỉ giao hàng:</b></p>
        <p>{{$ShippingAddress->ReceiverName}}<p>
				<p>Địa chỉ: {{$ShippingAddress->Address. ", " .$ShippingAddress->xaphuongthitran. ", " .$ShippingAddress->quanhuyen. ", " .$ShippingAddress->tinhthanhpho}}<p>
				<p>Điện thoại: {{$ShippingAddress->Phone}}</p>
        <p class="card-text"><b>Phương thức thanh toán:</b> Thanh toán tiền mặt khi nhận hàng</p>
        <p class="card-text"><b>Phí vận chuyển: </b> Miễn phí</p>
        <p class="card-text"><b>TỔNG TRỊ GIÁ ĐƠN HÀNG: </b><b style="color:red; font-size: 20px">{{number_format($OrderInfo->Total, 0, " ", ".").' ₫'}}</b></p>
        <p class="card-text">Cảm ơn bạn đã tin tưởng và mua hàng tại ITGo Shop. Nếu có bất kì vấn đề gì liên quan đến đơn hàng, bạn vui lòng liên hệ số hotline <b>1900 1818</b></i></p>
        <p class="card-text">Trân trọng,</p>
        <p class="card-text">Đội ngũ ITGoShop.</p>
      </div>
    </div>
    <div>
       
    </div>
</body>
</html>