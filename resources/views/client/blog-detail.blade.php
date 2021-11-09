@extends('client_layout')
@section('client_content')		
@foreach($blog_detail  as $key => $blog)
		<!-- Breadcrumbs -->
		
		<!-- End Breadcrumbs -->
		{{csrf_field()}}
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
										<img src="{{URL::to('public/images_upload/blog/'.$blog->Image)}}" alt="#">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title" style="text-align: center;">{{$blog->Title}}</h2>
										<div class="blog-meta">
											<span class="author"><a><i class="fa fa-user"></i>{{$blog->Author}}</a><a ><i class="fa fa-calendar"></i>{{$blog->DatePost}}</a><a ></a></span>
										</div>
										<div class="content">
											<p>{!!$blog->Content!!}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="single-widget recent-post">
								<h3 class="title">Bài viết liên quan</h3>
								<!-- Single Post -->
								@foreach($related_blog as $key => $blog)
								<div class="single-post">
									<div class="image">
										<img style="margin: auto; max-width: 70px; max-height: 70px; width: auto; height: auto; " src="{{URL::to('public/images_upload/blog/'.$blog->Image)}}" alt="#">
									</div>
									<div class="content">
										<h5><a href="#">{{$blog->Title}}</a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>{{$blog->DatePost}}</li>
										</ul>
									</div>
								</div>
								@endforeach
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget side-tags">
								<h3 class="title">Tags</h3>
								<ul class="tag">
									<li><a href="#">business</a></li>
									<li><a href="#">wordpress</a></li>
									<li><a href="#">html</a></li>
									<li><a href="#">multipurpose</a></li>
									<li><a href="#">education</a></li>
									<li><a href="#">template</a></li>
									<li><a href="#">Ecommerce</a></li>
								</ul>
							</div>
							<!--/ End Single Widget -->
								
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</section>
		<!--/ End Blog Single -->
			
@endsection