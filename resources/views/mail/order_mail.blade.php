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
      <img src="https://lh3.googleusercontent.com/fJJFHOofommzstKUVqFsOlAEvUk6IyTPf3MW1w2ni3x5SGpBDnnEhXfSiYV6fZdPLXP3d_gRaVsNDKnkdmBL4wArEMkz8uuKcIp9hAAganBh1F587Qz8zirjketX8UpLGz_eYYzSyc0ecqLN68YeI7XXJ10EVRaXBiYnXDpL1by_cIalcdrg0-j-GjVTpieWQtTTGU8vUljwzZiK-LjlL3NleFSucEPYyc-qVECIZFxdO2uONhfXPvwwP5FVc2LePacnrhV1EWOa7yx6onMkhyy-fCN7gie9wNdxjzfNtpxgwJFQ8HoNxrHnQiTl_17kNUr8EwzM7aphOL4oiB6sNm9nc-lXAhUs1ylRQB99P8jTMHDk_qVCrXBzRbZZfoTBJ79FHdqQi8vqqyqJHvwG9axGCGy_6xWmgqGkM17HOf4pLHzdvuUfNfWjX3tpIC1u_zbXeH2kvJ-uyllfslOhbcLf99haNF5W8BZ4Ip7pnAq-yGbiCEgdy25s2xxFzcsKZ23TIr2z1Bu7TYcXo8j2kgPk9Tv1NOUdLUOIrAulODvZ_LXpcDt53sSlpg4v-zZalGPsZA1UHVhX2ePYUKdUsB71JS6HBkRRdU3Rd-_cnmmIKQSBllhii1gti7WfCUNvlabOvcIy2AMWN0SxSBTQUqDySgmc_dRU_23Skygp9rzeX3s2bUtP9DHq3yOU4qwCMyCSd7HtqpGRq9vbzErQEjQ3=w220-h64-no?authuser=1" alt="" style="height: 50px;">
   
      <!-- <img src="https://lh3.googleusercontent.com/7GUtF9Gd14QM4jHIhXwNwW5AZCQDNbauFmKObH3Oa1bcdDI_8DaFYorS6GEYEp4Bnb0Ah1W72kwRYrTASNYinLNQLgIxLBTQtQzuPBGfHzyoHlJU3XjkqTP9BxKMeJelN8esvUHZMES6no3qpOq3F8AR9Arx05KZLqIzI8DYyTPsUus8nxC3zogAg_OOEyvrKDZDuHg5oirg8HuFKCHUTb-c5PzRvn6x3Fjn_hdBTh7roRmwl1xlI_tmujqs2-sKxQ8r-K8lCeoi2Ejxc5dc91b4bpis6X9JH3cSNio3JKr87HWO-1qdeBVcedmpimwU55JmS5ebv2YzjdciiUQXGomRMUQFHDpce6Zwj9g3hfs0ns67L91nh5_Ydcav6j9J5gM0PJse3gAw6cfiKPkB8mkgTeJE460Ki-w88wAF9VHCnibWOWsm76Z2bQqs3n_Kw1a6epqmanz5NVLyuqkdYo7YIvb1X-wQanekzE6vaIQu7ziO5Uh9HT3vZrm7cJu3L5rNQrhQRkT992MlvHRQjBhZWUGSezFctkOnDg3-bzOSCPCQAsw_0UR03yyUDXk9wXTCKaPfDWVSrCr3aBQiMiJySCdeo956H1skmix8qcaR4BFbrZTmqv7m9zeMXzeNQdb0jH-ePoS4k4e7tcJXJXoxa87FpgWqZoswvut-lm9g8vrjclHOIzO2aHeKF-HEGexNToMQzSgJU4TUb9ycyh9l=w220-h64-no?authuser=1" alt="" style="height: 50px;"> -->
      <hr style="background-color: #77ACF1;padding: 2px;">
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