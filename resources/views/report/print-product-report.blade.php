<?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê doanh thu sản phẩm từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}}</title>
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
                <b style="font-size: 26px;">THỐNG KÊ VÀ PHÂN TÍCH DOANH THU SẢN PHẨM</b><br>
                <i>(Từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}})</i>
            </div>
            <div class="col-md-12" style="text-align: right;">
                <p style="margin:30px 0px">Thời gian thống kê: {{date('H:i d-m-Y')}}</p>
                <!-- <p>Người bán hàng: Lê Thị Hồng Cúc</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">I. Số liệu thống kê</b></p>
                <input type="hidden" id="tu-ngay" value="{{$tu_ngay}}">
                <input type="hidden" id="den-ngay" value="{{$den_ngay}}">
                <table class="table table-bordered" style="text-align:center">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col" style="max-width:250px;">Tên sản phẩm</th>
                        <th scope="col">Giá bán</th>
                        <th scope="col">Giá vốn</th>
                        <th scope="col">Đã bán</th>
                        <th scope="col">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $stt = 1; $total_number_solded = 0; $total_profit = 0;
                        $first_product = $top_product->first();
                         $min_product_name = $first_product->ProductName;  $max_product_name  = '';
                         $min_product_revenue = $first_product->number_solded * ($first_product->Price - $first_product->Cost);  $max_product_revenue  = 0; 
                        ?>
                        @foreach($top_product as $key => $item)
                        <tr>
                            <th scope="row">{{$stt}}</th>
                            <td style="max-width:250px;">{{$item->ProductName}}</td>
                            <td>{{number_format($item->Price, 0, " ", ".").' ₫'}}</td>
                            <td>{{number_format($item->Cost, 0, " ", ".").' ₫'}}</td>
                            <td>{{$item->number_solded}}</td>
                            <td>{{number_format($item->number_solded * ($item->Price - $item->Cost), 0, " ", ".").' ₫'}}</td>
                        </tr>
                        <?php $stt = $stt + 1; $total_number_solded += $item->number_solded; $total_profit += $item->number_solded * ($item->Price - $item->Cost);?>
                        <?php 
                            if($max_product_revenue < $item->number_solded * ($item->Price - $item->Cost))
                            {
                                $max_product_revenue = $item->number_solded * ($item->Price - $item->Cost);
                                $max_product_name = $item->ProductName;
                            }
                            if($min_product_revenue > $item->number_solded * ($item->Price - $item->Cost))
                            {
                                $min_product_revenue = $item->number_solded * ($item->Price - $item->Cost);
                                $min_product_name = $item->ProductName;
                            }
                        ?>
                        @endforeach
                        <tr>
                            <td colspan="4"><b>TỔNG CỘNG</b></td>
                            <td>{{$total_number_solded}}</td>
                            <td>{{number_format($total_profit, 0, " ", ".").' ₫'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">II. Biểu đồ thống kê tỉ lệ doanh thu của top 5 sản phẩm bán chạy</b></p>
                <form>
                    @csrf
                    <div id="bieuDo" style="max-width:85%"></div>
                </form>
                <?php $color_list = array('#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56', '#761C41', '#768B74');?>
                <small>Chú thích: <br>
                    <?php $i =0; $tong_doanh_thu_top_5 = 0;?>
                    @foreach($top5_product as $item)
                    <div style="display:inline-block;background-color:{{$color_list[$i]}}; height:10px; width:10px;margin-left: 20px;"></div> {{$item->ProductName}} ({{round(($item->number_solded * ($item->Price - $item->Cost)/$total_profit) * 100, 2)}}%) <br>
                    <?php $i += 1; $tong_doanh_thu_top_5 += $item->number_solded * ($item->Price - $item->Cost) ?>
                    @endforeach
                    <div style="display:inline-block;background-color:{{$color_list[$i]}}; height:10px; width:10px;margin-left: 20px;"></div> Các sản phẩm khác ({{round((($total_profit - $tong_doanh_thu_top_5)/$total_profit) * 100, 2)}}%)<br>
                </small> 
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">III. Danh sách các sản phẩm không bán được từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}}</b></p>
                <table class="table table-bordered" style="text-align:center">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col" style="max-width:250px;">Tên sản phẩm</th>
                        <th scope="col">Giá bán</th>
                        <th scope="col">Giá vốn</th>
                        <th scope="col">Đã bán</th>
                        <th scope="col">Còn lại</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1;?>
                        @foreach($sp_ko_ban_dc as $key => $item)
                        <tr>
                            <th scope="row">{{$stt}}</th>
                            <td style="max-width:250px;">{{$item->ProductName}}</td>
                            <td>{{number_format($item->Price, 0, " ", ".").' ₫'}}</td>
                            <td>{{number_format($item->Cost, 0, " ", ".").' ₫'}}</td>
                            <td>{{$item->Sold}}</td>
                            <td>{{$item->Quantity}}</td>
                        </tr>
                        <?php $stt = $stt + 1;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">IV. Phân tích thống kê </b></p>
                <p>Từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}}:</p>
                <div style="margin-left:40px">
                    <p>- Tổng số sản phẩm đã bán: {{$total_number_solded}} sản phẩm</p>
                    <p>- Có {{count($sp_ko_ban_dc)}} sản phẩm không được bán trong thời gian này.
                    <p>- Sản phẩm mang lại doanh thu lớn nhất: {{$max_product_name}} với doanh thu là {{number_format($max_product_revenue, 0, " ", ".").' ₫'}} (chiếm tỉ lệ {{round(($max_product_revenue/ $total_profit) * 100, 2)}}% tổng doanh thu)</p>
                    <p>- Sản phẩm mang lại doanh thu nhỏ nhất: {{$min_product_name}} với doanh thu là {{number_format($min_product_revenue, 0, " ", ".").' ₫'}} (chỉ chiếm tỉ lệ {{round(($min_product_revenue/ $total_profit) * 100, 4)}}% tổng doanh thu)</p>
                    <p>- Doanh thu trung bình của tất cả sản phẩm: {{number_format($total_profit/ count($top_product), 0, " ", ".").' ₫'}}</p>       
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
            var pie_chart = new Morris.Donut({
			element: 'bieuDo',
			resize: true,
			colors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56', '#761C41', '#768B74'],
			data: [
				{ label: 'no data', value: 20 },
                ],
            });
            load_pie_chart();
            setTimeout(function() { window.print();}, 700);
            function load_pie_chart()
            {
                var tu_ngay = $('#tu-ngay').val();
                var den_ngay = $('#den-ngay').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url:"{{url('/load-product-chart')}}",
                        method: "POST",
                        dataType:"json",
                        data:{  tu_ngay: tu_ngay, den_ngay: den_ngay, _token: _token},
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
        });
        
    </script>
</body>
</html>