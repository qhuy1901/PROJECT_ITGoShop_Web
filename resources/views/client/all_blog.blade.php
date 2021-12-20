@extends('client_layout')
@section('title', 'ITGoShop - Hệ thống Máy tính và Phụ kiện')
@section('client_content')
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a>Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a>Tất cả bài đăng</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
<main class="ps-main">
            <div class="ps-blog-grid pt-80 pb-80">
              <div class="ps-container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                      @foreach($all_content as $key => $blog)
                        {{csrf_field()}}
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12  " style="height: 400px; width: 570px">
                          <div class="ps-post">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" ></a><img src="{{URL::to('public/images_upload/blog/'.$blog->Image)}}" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="{{URL::to('/blog-detail/'.$blog->BlogId)}}">{{$blog->Title}}</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5">{{$blog->Author}}</a></span>-<span class="ml-3">{{$blog->DatePost}}</span></p>
                              <p>{{$blog->Summary}}</p><a class="ps-morelink" href="{{URL::to('/blog-detail/'.$blog->BlogId)}}">Đọc tiếp<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                  </div>
                </div>
				{{ $all_content->links() }}
                                <!--<div class="ps-product-action" >
                                  <div class="ps-pagination">
                                    <ul class="pagination">
                                      <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                      <li class="active"><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                  </div>
                                </div>-->
                  
                </div>
            </div>
	
@endsection