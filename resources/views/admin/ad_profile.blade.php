@extends('admin_layout')
@section('admin_content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Profile</h4>
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
								<a href="#">Profile</a>
							</li>
							
						</ul>
					</div>
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<?php
									$message = Session::get('message');
									if($message)
									{
										echo '<label>'.$message.'</label>';
										Session::put('message', null);
									}
								?>
                                @foreach($profile_info as $key => $update_value)
								<form role="form" action="{{URL::to('/ad_profile/'.$update_value->UserId)}}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class= "card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="white-box">
                                                    <div class="user-bg"> 
                                                        <div class="overlay-box">
                                                            <div class="user-content">

                                                                <a href="javascript:void(0)"><img src="{{URL::to('public/images_upload/user/'.$update_value->UserImage)}}" style=" border-radius: 50% " class="thumb-lg img-circle" alt="img"></a>
                                                                
                                                                <h5 class="text-white">{{$update_value->Email}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-xs-12">
                                                <div class="white-box">
                                                    <form class="form-horizontal form-material">
                                                        <div class="form-group">
                                                            <label class="col-md-12">Họ</label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="LastName"  placeholder="Johnathan Doe"
                                                                    class="form-control form-control-line" value="{{$update_value->LastName}}"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">Tên</label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="FirstName" placeholder="Johnathan Doe"
                                                                    class="form-control form-control-line" value="{{$update_value->FirstName}}"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-email" class="col-md-12">Email</label>
                                                            <div class="col-md-12">
                                                                <input type="email" name="Email" placeholder="johnathan@admin.com"
                                                                    class="form-control form-control-line" name="example-email" id="example-email" value="{{$update_value->Email}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">Mật khẩu</label>
                                                            <div class="col-md-12">
                                                                <input type="password" name="Password" value="password" class="form-control form-control-line" value="{{$update_value->Password}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">Số điện thoại</label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="Mobile" placeholder="123 456 7890"
                                                                    class="form-control form-control-line" value="{{$update_value->Mobile}}"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">Intro</label>
                                                            <div class="col-md-12">
                                                                <textarea rows="5" name="Intro" class="form-control form-control-line" >{{$update_value->Intro}}</textarea>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <button class="btn btn-success" name="update_profile">Update Profile</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.container-fluid -->
</div>
@endsection