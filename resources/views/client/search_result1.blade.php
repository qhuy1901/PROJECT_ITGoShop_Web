@extends('client_layout')
@section('client_content')
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a>Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a>Kết quả tìm kiếm</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
<main class="ps-main">
        <div class="ps-blog-grid pt-80 ">
            <div class="ps-container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                      @foreach($search_blog as $key => $blog)
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
            </div>
        </div>
	<!-- Start Shop Services Area -->
	
    
        <!-- Modal end -->
@endsection