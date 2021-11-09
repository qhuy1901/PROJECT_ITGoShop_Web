@extends('client_layout')
@section('client_content')
<main class="ps-main">
      <div class="breadcrumbs">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="bread-inner">
                <ul class="bread-list">
                  <li><a href="product-detail.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                  <li class="active"><a href="#">Laptop</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="blog-single section">
        
                  <div class="col-lg-7 col-12">
                    <div class="main-sidebar" style="margin-top: 5px; margin-bottom: 40px; margin-left:17px; padding: 10px 40px; border: 1px solid #000">
                      <div class="info">
                        <!-- Single Widget -->
                        <div class="blog-detail">
                            <h2 class="blog-title">Lenovo</h2>
                            <p>
                              Lenovo đặc biệt thành công với dòng laptop doanh nhân cao cấp ThinkPad lâu đời và mở rộng các dòng sản phẩm mới mang tính sáng tạo IdeaPad, Legion dành cho gaming và ThinkBook nhắm tới đối tượng học sinh, sinh viên.
                            </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-10">
                    <div class="main-sidebar"style="margin-top: 5px; margin-bottom: 40px; padding: 10px 40px; margin-right:17px; border: 1px solid #000">
                      <!-- Single Widget -->
                      
                        <div class="img-detail w-1/2">
                          <img src="https://lumen.thinkpro.vn/backend/uploads/brand/cover/2020/7/20/lenovo.jpg">
                       
                      </div>
                    </div>
                  
          </div>
      </section> 
      <div class="ps-products-wrap pb-80">
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-product__columns">
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-20">
                                      <div class="ps-shoe__thumbnail">
                                        <div class="ps-badge"><span>New</span></div>
                                        <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="fa fa-heart-o" style="font-size: 15px"></i></a><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                                            <del>£220</del> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail">
                                        <div class="ps-badge"><span>New</span></div>
                                        <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                        <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                                            <del>£220</del> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail">
                                        <div class="ps-badge"><span>New</span></div>
                                        <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                        <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                                            <del>£220</del> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ps-product__column">
                                    <div class="ps-shoe mb-30">
                                      <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{url('./public/client/Images/shoe/6.jpg')}}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                      </div>
                                      <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                          <div class="ps-shoe__variant normal"><img src="{{url('./public/client/Images/shoe/2.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/3.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/4.jpg')}}" alt=""><img src="{{url('./public/client/Images/shoe/5.jpg')}}" alt=""></div>
                                          <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                          </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                          <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="ps-product-action">
                                  <div class="ps-pagination">
                                    <ul class="pagination">
                                      <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                      <li class="active"><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="ps-sidebar" data-mh="product-listing">
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h2 style="font-weight: bold;">Thương hiệu nhánh</h2>
                                  </div>
                                  <div class="ps-widget__content">
                                    <ul class="ps-list--checked">
                                      <li class="current"><a href="product-listing.html">Life(521)</a></li>
                                      <li><a href="product-listing.html">Running(76)</a></li>
                                      <li><a href="product-listing.html">Baseball(21)</a></li>
                                      <li><a href="product-listing.html">Football(105)</a></li>
                                      <li><a href="product-listing.html">Soccer(108)</a></li>
                                      <li><a href="product-listing.html">Trainning & game(47)</a></li>
                                      <li><a href="product-listing.html">More</a></li>
                                    </ul>
                                  </div>
                                </aside>
                                
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h2 style="font-weight: bold;">CPU</h2>
                                  </div>
                                  <div class="ps-widget__content">
                                    <ul class="ps-list--checked">
                                      <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                                      <li><a href="product-listing.html">Adidas(76)</a></li>
                                      <li><a href="product-listing.html">Baseball(69)</a></li>
                                      <li><a href="product-listing.html">Gucci(36)</a></li>
                                      <li><a href="product-listing.html">Dior(108)</a></li>
                                      <li><a href="product-listing.html">B&G(108)</a></li>
                                      <li><a href="product-listing.html">Louis Vuiton(47)</a></li>
                                    </ul>
                                  </div>
                                </aside>
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h3>RAM</h3>
                                  </div>
                                  <div class="ps-widget__content">
                                    <ul class="ps-list--checked">
                                      <li class="current"><a href="product-listing.html">Narrow</a></li>
                                      <li><a href="product-listing.html">Regular</a></li>
                                      <li><a href="product-listing.html">Wide</a></li>
                                      <li><a href="product-listing.html">Extra Wide</a></li>
                                    </ul>
                                  </div>
                                </aside>
                                <aside class="ps-widget--sidebar ps-widget--category">
                                  <div class="ps-widget__header">
                                    <h3>Ổ cứng</h3>
                                  </div>
                                  <div class="ps-widget__content">
                                    <ul class="ps-list--checked">
                                      <li class="current"><a href="product-listing.html">Narrow</a></li>
                                      <li><a href="product-listing.html">Regular</a></li>
                                      <li><a href="product-listing.html">Wide</a></li>
                                      <li><a href="product-listing.html">Extra Wide</a></li>
                                    </ul>
                                  </div>
                                </aside>
                              </div>
                            </div>
                          </div> 

@endsection