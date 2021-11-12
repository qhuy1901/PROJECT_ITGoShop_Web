@extends('client_layout')
@section('client_content')
    <main class="ps-main">
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">
                    <div class="item"><img src="./public/client/Images/shoe-detail/1.jpg" alt=""></div>
                    <div class="item"><img src="./public/client/Images/shoe-detail/2.jpg" alt=""></div>
                    <div class="item"><img src="./public/client/Images/shoe-detail/3.jpg" alt=""></div>
                    <div class="item"><img src="./public/client/Images/shoe-detail/3.jpg" alt=""></div>
                    <div class="item"><img src="./public/client/Images/shoe-detail/3.jpg" alt=""></div>
                  </div>
                </div>
                <div class="ps-product__image">
                  <div class="item"><img class="zoom" src="./public/client/Images/shoe-detail/1.jpg" alt="" data-zoom-image="./public/client/Images/shoe-detail/1.jpg"></div>
                  <div class="item"><img class="zoom" src="./public/client/Images/shoe-detail/2.jpg" alt="" data-zoom-image="./public/client/Images/shoe-detail/2.jpg"></div>
                  <div class="item"><img class="zoom" src="./public/client/Images/shoe-detail/3.jpg" alt="" data-zoom-image="./public/client/Images/shoe-detail/3.jpg"></div>
                </div>
              </div>
              <div class="ps-product__thumbnail--mobile">
                <div class="ps-product__main-img"><img src="./public/client/Images/shoe-detail/1.jpg" alt=""></div>
                <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="./public/client/Images/shoe-detail/1.jpg" alt=""><img src="./public/client/Images/shoe-detail/2.jpg" alt=""><img src="./public/client/Images/shoe-detail/3.jpg" alt=""></div>
              </div>
              <div class="ps-product__info">
                <div class="ps-product__rating">
                  <select class="ps-rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select><a href="#">(Read all 8 reviews)</a>
                </div>
                <h1>Air strong  training</h1>
                
                <h3 class="ps-product__price">£ 115 <del>£ 330</del></h3>
                <div class="ps-product__block ps-product__quickview">
                  <h4>QUICK REVIEW</h4>
                  <p>The Nike Free RN 2017 Men's Running Sky weighs less than previous versions and features an updated knit material…</p>
                </div>
                <div class="ps-product__shopping"><a class="ps-btn mb-10" href="cart.html">Add to cart<i class="ps-icon-next"></i></a>
                  <div class="ps-product__actions"><a class="mr-10" href="whishlist.html"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="ps-product__content mt-50">
                <ul class="tab-list" role="tablist">
                  <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
                  <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                </ul>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
      
@endsection