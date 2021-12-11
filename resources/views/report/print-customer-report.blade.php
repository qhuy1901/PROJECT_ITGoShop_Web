<?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê doanh thu khách hàng từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}}</title>
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<!-- <button onclick="window.print();" class="noPrint">Print</button> -->
    <div class="container" style="font-size:22px;">
        <div class="row" style="margin-top: 40px;">
            <div class="col-sm-1">
                <img src="{{URL::to('public/client/Images/logo3.png')}}" alt="">
            </div>
            <div class="col-sm-11">
                <b>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ ITGOSHOP</b>
                <p>Tầng 5, Số 117-119-121 Nguyễn Du, Phường Bến Thành, Quận 1, Thành Phố Hồ Chí Minh</p>
            </div>
            <!-- <div class="col-sm-4" style="text-align: right;">
                <p style="color:#F70C72;font-weight: bold;">"Tất cả vì khách hàng"</p>
            </div> -->
        </div>
        <hr style="margin:20px 0px 40px 0px">
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-12" style="text-align: center;">
                <b style="font-size: 26px;">THỐNG KÊ VÀ PHÂN TÍCH KHÁCH HÀNG</b><br>
                <i>(Từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}})</i>
            </div>
            <div class="col-md-12" style="text-align: right;">
                <p style="margin:30px 0px">Thời gian thống kê: {{date('H:i d-m-Y')}}</p>
                <!-- <p>Người bán hàng: Lê Thị Hồng Cúc</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">I. Thống kê doanh thu từ khách hàng</b></p>
                <input type="hidden" id="tu-ngay" value="{{$tu_ngay}}">
                <input type="hidden" id="den-ngay" value="{{$den_ngay}}">
                <table class="table table-bordered" style="text-align:center">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên khách hàng</th>
                        <th scope="col">Số lần mua hàng</th>
                        <th scope="col">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; $total_revenue = 0; $total_order = 0; $max_revenue = 0;$max_revenue_customer=''; $max_number_order=0; $max_number_order_customer=''; ?>
                        @foreach($customer_revenue_statistic as $key => $item)
                        <tr>
                            <th scope="row">{{$stt}}</th>
                            <td>{{$item->LastName}} {{$item->FirstName}}</td>
                            <td>{{$item->number_order}}</td>
                            <td>{{number_format($item->revenue, 0, " ", ".").' ₫'}}</td>
                        </tr>
                        <?php $stt = $stt + 1; $total_revenue += $item->revenue; $total_order +=  $item->number_order;?>
                        <?php 
                        if($max_revenue < $item->revenue)
                        {
                            $max_revenue = $item->revenue;
                            $max_revenue_customer = $item->LastName.' '.$item->FirstName;
                        }

                        if($max_number_order < $item->number_order)
                        {
                            $max_number_order = $item->number_order;
                            $max_number_order_customer = $item->LastName.' '.$item->FirstName;
                        }
                        
                        ?>

                        @endforeach
                        <tr>
                            <td colspan="2"><b>TỔNG CỘNG</b></td>
                            <td>{{$total_order}}</td>
                            <td>{{number_format($total_revenue, 0, " ", ".").' ₫'}}</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">II. Thống kê số lần truy cập của khách hàng</b></p>
                <p>Thống kê số lần truy cập của mỗi khách hàng:</p>
                <table class="table table-bordered" style="text-align:center">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên khách hàng</th>
                        <th scope="col">Số lần truy cập</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach($customer_login_statistic as $key => $item)
                        <tr>
                            <th scope="row">{{$stt}}</th>
                            <td>{{$item->LastName}} {{$item->FirstName}}</td>
                            <td>{{$item->number_access}}</td>
                        </tr>
                        <?php $stt = $stt + 1; ?>
                        @endforeach
                    </tbody>
                </table>
                <p>Biểu đồ thống kê số lần khách hàng truy cập theo ngày:</p>
                <form>
                    @csrf
                    <div id="lineChart" style="max-width:85%"></div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">III. Phân tích thống kê</b></p>
                <p>Từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}}:</p>
                <div style="margin-left:40px">
                    <p>- Tổng số khách hàng truy cập trang web: {{count($customer_login_statistic)}}</p>
                    <p>- Tổng số khách hàng đã mua hàng: {{count($customer_revenue_statistic)}}
                    <p>- Tỉ lệ khách hàng mua hàng trên trang website: {{round((count($customer_revenue_statistic)/count($customer_login_statistic)) * 100, 2)}}%</p>
                    <p>- Khách hàng mang lại doanh thu lớn nhất: {{$max_revenue_customer}}</p>
                    <p>- Khách hàng có số lần mua hàng nhiều nhất: {{$max_number_order_customer}}</p>
                    <p>- Số lượt truy cập trung bình trong ngày: {{$luot_truy_cap_tb}}</p>
                    <p>- Doanh thu trung bình của mỗi khách hàng: {{number_format($total_revenue/count($customer_revenue_statistic), 0, " ", ".").' ₫'}}</p>
                    <p>- Danh sách các khách hàng tiềm năng:</p> 
                    <div style="margin-left:100px">      
                        @foreach($kh_tiem_nang as $item)
                            <p>+ {{$item->LastName}} {{$item->FirstName}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="text-align: right;">
            </div>
            <div class="col-md-4" style="text-align: center;">
                <p style="margin:20px 0px 100px 0px">
                    <b style="font-size: 24px;">Người lập thống kê</b><br>
                    <i>(Kí, đóng dấu và ghi rõ họ tên)</i>
                </p>
                <p>{{Session::get('LastName')}} {{Session::get('FirstName')}}</p>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-12" style="text-align: center;">
                <hr>
                <b>ITGoShop - "Tất cả vì khách hàng"</b>
                <hr>
            </div>
        </div>
    </div>
    <script type= "text/javascript">       
     </script>
    <script>
        $(document).ready(function(){
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
            load_chart();
            setTimeout(function() { window.print();}, 500);
            function load_chart()
            {
                var tu_ngay = $('#tu-ngay').val();
                var den_ngay = $('#den-ngay').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url:"{{url('/load-customer-chart')}}",
                        method: "POST",
                        dataType:"json",
                        data:{ tu_ngay: tu_ngay, den_ngay:den_ngay, _token: _token},
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
        });
        
    </script>
</body>
</html>
