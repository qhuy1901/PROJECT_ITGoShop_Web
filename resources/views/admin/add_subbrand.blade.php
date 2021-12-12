@extends('admin_layout')
@section('title', 'Thêm thương hiệu nhánh - ITGoShop')
@section('admin_content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
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
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Thêm thương hiệu nhánh</div>
                        </div>
                        <form role="form" action="/BrandManagement/SaveSubBrand" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Mã thương hiệu nhánh</label>
                                            <input type="text" name="SubBrandId" class="form-control" id="email2" placeholder="Nhập mã thương hiệu nhánh">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Tên thương hiệu nhánh</label>
                                            <input type="text" name="SubBrandName" class="form-control" id="email2" placeholder="Nhập tên thương hiệu nhánh">
                                            
                                        </div>

                                        <div class="col-6 col-lg-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Thuộc Thương hiệu: </label>
                                                <select class="form-control" name="BrandId" id="exampleFormControlSelect1">
                                                    @foreach($brand_list as $key => $brand)
                                                    <option value="{{$brand->BrandId}}">ID: {{$brand->BrandId}} - {{$brand->BrandName}} (Mã Danh Mục: {{$brand->CategoryId}} )</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6">
												<div class="form-group">
                                                    <label class="form-label d-block">Hiển thị</label>
                                                    <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="Status" value="1" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="Status" value="0" class="selectgroup-input">
                                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye-slash"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="add_brand" class="btn btn-success">Thêm thương hiệu sản phẩm</button>
                                <button class="btn btn-danger">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
