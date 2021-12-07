<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng #</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> -->
    <style>
        body{
            /* font-family: 'Roboto', sans-serif; */
            
             font-family: Tahoma, sans-serif;}
    </style>
</head>
<body>
    <div class="container" style="max-width:675px">
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
                <b style="font-size: 22px;">HÓA ĐƠN BÁN HÀNG</b>
            </div>
            <div class="col-md-12" style="text-align: right;">
                <p>Ngày hóa đơn: 30/11/2021</p>
                <!-- <p>Người bán hàng: Lê Thị Hồng Cúc</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 18px;">I. Thông tin hóa đơn</b></p>
                <p>Mã hóa đơn: #</p>
                <p>Họ tên người mua hàng: Tạ Quang Huy</p>
                <p>Số điện thoại: 0365990290</p>
                <p>Địa chỉ: 220/17 khu phố 9 phường Tam Hiệp, TP.Biên Hòa, tỉnh Đồng Nai</p>
                <p>Hình thức thanh toán: Thanh toán online</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 18px;">II. Chi tiết hóa đơn</b></p>
                <table class="table"> 
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tạm tính</th>
                    </tr>
                    <tr>
                        <td>Dell Inspiron All in One 24" 5400</td>
                        <td>19.890.000 ₫</td>
                        <td>x1</td>
                        <td>19.890.000 ₫</td>
                    </tr>
                    <tr>
                        <td>Dell Inspiron All in One 24" 5400</td>
                        <td>19.890.000 ₫</td>
                        <td>x1</td>
                        <td>19.890.000 ₫</td>
                    </tr>
                    <tr>
                        <td>Dell Inspiron All in One 24" 5400</td>
                        <td>19.890.000 ₫</td>
                        <td>x1</td>
                        <td>19.890.000 ₫</td>
                    </tr>
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
                            <p> ₫</p>
                            <p>-0 ₫</p>
                            <p>₫</p>
                            <p style="color: red; font-size: 20px;">₫</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="text-align: right;">
            </div>
            <div class="col-md-4" style="text-align: center;">
                <p style="margin:20px 0px 100px 0px">
                    <b style="font-size: 18px;">Người lập hóa đơn</b><br>
                    <i>(Kí, đóng dấu và ghi rõ họ tên)</i>
                </p>
                
                <p>Tạ Quang Huy</p>
            </div>
        </div>
        
    </div>
    <footer class="footer">
        <div style="text-align: center;">
                    <hr>
                    <b>Cảm ơn quý khách đã tin tưởng và mua hàng tại ITGoShop!</b>
                    <hr>
                </div>
    </footer>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        window.print();
    });
</script>