@extends('frontend.main_master')
@section('title')
    @if(session()->get('language')=='english') Home Easy Online Shop @else Kolay Online Alışverişin Ana Sayfası @endif
@endsection
@section('content')

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                @include('frontend.common.vertical_menu')
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <!-- ============================================== HOT DEALS ============================================== -->
                    <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">
                            @if(session()->get('language')=='english') hot deals @else SICAK FIRSATLAR @endif
                        </h3>
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                            @foreach($hot_deals as $value)
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image">
                                                @if(session()->get('language')=='english')
                                                    <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                        <img
                                                            src="{{asset($value->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @else
                                                    <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                        <img
                                                            src="{{asset($value->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @endif

                                            </div>
                                            <!-- /.image -->
                                            <div class="sale-offer-tag">
                                                @if(session()->get('language')=='english')
                                                    <span>49%<br> off</span>
                                                @else
                                                    <span>%49<br> İNDİRİM</span>
                                                @endif

                                            </div>
                                            <div class="timing-wrapper">
                                                <div class="box-wrapper">
                                                    <div class="date box">
                                                        <span class="key">120</span>
                                                        <span class="value">
        @if(session()->get('language')=='english') DAYS @else GÜN @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="hour box">
                                                        <span class="key">20</span>
                                                        <span class="value">
@if(session()->get('language')=='english') HRS @else SAAT @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="minutes box">
                                                        <span class="key">36</span>
                                                        <span class="value">
@if(session()->get('language')=='english') MINS @else DAKİKA @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper hidden-md">
                                                    <div class="seconds box">
                                                        <span class="key">60</span>
                                                        <span class="value">
@if(session()->get('language')=='english') SEC @else SANİYE @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.hot-deal-wrapper -->

                                        <div class="product-info text-left m-t-20">
                                            <h3 class="name">
                                                @if(session()->get('language')=='english')
                                                    <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                        {{$value->product_name_en}}
                                                    </a>
                                                @else
                                                    <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                        {{$value->product_name_tr}}
                                                    </a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                @if($value->discount_price!=null || $value->discount_price!=0 )
                                                    <span class="price">
                                                                  {{$value->discount_price}}
                                                                </span>
                                                    <span class="price-before-discount">
                                                                    {{$value->selling_price}}
                                                                </span>
                                                @else
                                                    <span class="price">
                                                                  {{$value->selling_price}}
                                                                </span>
                                                @endif
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <div class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">
                                                        @if(session()->get('language')=='english')
                                                            Add to cart
                                                        @else
                                                            Sepete ekle
                                                        @endif
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- /.sidebar-widget -->
                    </div>
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== SPECIAL OFFER ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language')=='english') Special Offer @else  ÖZEL TEKLİFLER @endif
                        </h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div
                                class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @foreach($special_offer as $value)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($value->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($value->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                                <!-- /.image -->
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            {{$value->product_name_en}}
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            {{$value->product_name_tr}}
                                                                        </a>
                                                                    @endif
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"><span
                                                                        class="price"> $450.99 </span></div>
                                                                <!-- /.product-price -->
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                @include('frontend.common.prodcut_tags')
                <!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language')=='english') Special Deals @else ÖZEL FIRSATLAR @endif
                        </h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div
                                class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                                <div class="item">
                                    <div class="products special-product">
                                        @foreach($special_deals as $value)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($value->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($value->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                                <!-- /.image -->
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            {{$value->product_name_en}}
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            {{$value->product_name_tr}}
                                                                        </a>
                                                                    @endif
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"><span
                                                                        class="price"> $450.99 </span></div>
                                                                <!-- /.product-price -->
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">
                            @if(session()->get('language')=='english') Newsletters @else BÜLTEN @endif
                        </h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            @if(session()->get('language')=='english')
                                <p>Sign Up for Our Newsletter!</p>
                            @else
                                <p>Bültenimize Kaydolun!</p>
                            @endif
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">
                                        @if(session()->get('language')=='english')Email address @else Mail
                                        Adresisiniz @endif
                                    </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           @if(session()->get('language')=='english')
                                           placeholder="Subscribe to our newsletter"
                                           @else
                                           placeholder="Haber bültenimize abone ol"
                                        @endif
                                    >
                                </div>
                                <button class="btn btn-primary">
                                    @if(session()->get('language')=='english')Subscribe @else Abone ol @endif
                                </button>
                            </form>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>

                    <!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                @include('frontend.common.testimonials')
                <!-- ============================================== Testimonials: END ============================================== -->

                    <div class="home-banner">
                        <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                    </div>
                </div>

                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            {{--************************************ SLIDER START ******************************************--}}
                            @foreach($sliders as $value)
                                <div class="item" style="background-image:
                                    url({{asset($value->image)}})">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">
                                            <div class="slider-header fadeInDown-1">Top Brands</div>
                                            <div class="big-text fadeInDown-1"
                                                 style="color: {{$value->title_color}}"> {{$value->title}}</div>
                                            <div class="excerpt fadeInDown-2 hidden-xs">
                                                <span>{{$value->description}}</span>
                                            </div>
                                            <div class="button-holder fadeInDown-3">
                                                <a href="{{$value->link}}"
                                                   class="btn-lg btn btn-uppercase btn-primary shop-now-button">
                                                    Shop Now
                                                </a>
                                            </div>
                                        </div>

                                        <!-- /.caption -->
                                    </div>

                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.item -->
                            @endforeach
                            {{--************************************* SLIDER END ***********************************--}}
                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">
                                @if(session()->get('language')=='english')
                                    New Products
                                @else
                                    Yeni Ürünler
                                @endif
                            </h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

                                <li class="active">
                                    <a data-transition-type="backSlide" href="#all" data-toggle="tab">
                                        @if(session()->get('language')=='english')
                                            ALL
                                        @else
                                            TÜMÜ
                                        @endif
                                    </a>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a data-transition-type="backSlide" href="#category{{$category->id}}"
                                           data-toggle="tab">
                                            @if(session()->get('language')=='english')
                                                {{$category->category_name_en}}
                                            @else
                                                {{$category->category_name_tr}}
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                                {{--  <li><a data-transition-type="backSlide" href="#smartphone"
                                         data-toggle="tab">Clothing</a>
                                  </li>
                                  <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a>
                                  </li>
                                  <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li>--}}


                            </ul>
                            <!-- /.nav-tabs -->
                        </div>

                        <div class="tab-content outer-top-xs">

                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                         data-item="4">
                                        @foreach($products as $value)
                                            @if($value->new==1)
                                                <div class="item item-carousel">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($value->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($value->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                                <!-- /.image -->
                                                                <div class="tag new">
                                                                <span>  @if(session()->get('language')=='english')
                                                                        New @else  YENİ  @endif
                                                                </span>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-image -->

                                                            <div class="product-info text-left">
                                                                <h3 class="name">

                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            {{$value->product_name_en}}
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                                            {{$value->product_name_tr}}
                                                                        </a>
                                                                    @endif

                                                                </h3>
                                                                <div class="rating rateit-small">

                                                                </div>
                                                                <div class="description">
                                                                    @if(session()->get('language')=='english')
                                                                        {{$value->short_description_en}}
                                                                    @else
                                                                        {{$value->short_description_tr}}
                                                                    @endif
                                                                </div>
                                                                <div class="product-price">
                                                                    @if($value->discount_price!=null || $value->discount_price!=0 )
                                                                        <span class="price">
                                                                  {{$value->discount_price}}
                                                                </span>
                                                                        <span class="price-before-discount">
                                                                    {{$value->selling_price}}
                                                                </span>
                                                                    @else
                                                                        <span class="price">
                                                                  {{$value->selling_price}}
                                                                </span>
                                                                    @endif
                                                                </div>
                                                                <!-- /.product-price -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button data-toggle="modal"
                                                                                    data-target="#addToCartModal"
                                                                                    id="{{$value->id}}"
                                                                                    onclick="prodcutView(this.id)"
                                                                                    class="btn btn-primary icon"
                                                                                    type="button"
                                                                                    @if(session()->get('language')=='english')
                                                                                    title="Add Cart"
                                                                                    @else
                                                                                    title="Sepete ekle"
                                                                                @endif >
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn"
                                                                                    type="button">
                                                                                @if(session()->get('language')=='english')
                                                                                    Add to cart
                                                                                @else
                                                                                    Sepete ekle
                                                                                @endif
                                                                            </button>
                                                                        </li>


                                                                        <button
                                                                            id="{{$value->id}}"
                                                                            onclick="addProductToWishlist(this.id)"
                                                                            class="btn btn-primary icon"
                                                                            type="button"
                                                                            @if(session()->get('language')=='english')
                                                                            title="Wishlist"
                                                                            @else
                                                                            title="Beğediklerim"
                                                                            @endif >
                                                                            <i class=" fa fa-heart"></i>
                                                                        </button>


                                                                        <li class="lnk">



                                                                            <a data-toggle="tooltip" class="add-to-cart"
                                                                               href="detail.html"
                                                                               @if(session()->get('language')=='english')
                                                                               title="Compare"
                                                                               @else
                                                                               title="Karşılatırma Listeme Ekle"
                                                                                @endif>
                                                                                <i class="fa fa-signal"
                                                                                   aria-hidden="true"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->
                                                        </div>
                                                        <!-- /.product -->
                                                    </div>
                                                    <!-- /.products -->
                                                </div>
                                                <!-- /.item -->
                                            @endif
                                        @endforeach  {{--PRODUCT FOREACH END--}}
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->
                            @foreach($categories as $category2)
                                <div class="tab-pane " id="category{{$category2->id}}">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                             data-item="4">
                                            @php
                                                $catwiseProducts = \App\Models\Product::where('category_id', $category2->id)->where('new', 1)->get();
                                            @endphp
                                            {{--PRODUCT FORELSE --}}
                                            @forelse($catwiseProducts as $product)
                                                <div class="item item-carousel">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($product->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                                            <img
                                                                                src="{{asset($product->product_thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                                <!-- /.image -->
                                                                <div class="tag new">
                                                                <span>
                                                                   @if(session()->get('language')=='english') New @else
                                                                        YENİ  @endif
                                                                </span>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-image -->

                                                            <div class="product-info text-left">
                                                                <h3 class="name">
                                                                    @if(session()->get('language')=='english')
                                                                        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                                            {{$product->product_name_en}}
                                                                        </a>
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                                            {{$product->product_name_tr}}
                                                                        </a>
                                                                        </a>
                                                                    @endif
                                                                </h3>
                                                                <div class="rating rateit-small">

                                                                </div>
                                                                <div class="description">
                                                                    @if(session()->get('language')=='english')
                                                                        {{$product->short_description_en}}
                                                                    @else
                                                                        {{$product->short_description_tr}}
                                                                    @endif
                                                                </div>
                                                                <div class="product-price">
                                                                    @if($product->discount_price!=null || $product->discount_price!=0 )
                                                                        <span class="price">
                                                                  {{$product->discount_price}}
                                                                </span>
                                                                        <span class="price-before-discount">
                                                                    {{$product->selling_price}}
                                                                </span>
                                                                    @else
                                                                        <span class="price">
                                                                  {{$product->selling_price}}
                                                                </span>
                                                                    @endif
                                                                </div>
                                                                <!-- /.product-price -->
                                                            </div>
                                                            <!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button data-toggle="modal"
                                                                                    data-target="#addToCartModal"
                                                                                    id="{{$value->id}}"
                                                                                    onclick="prodcutView(this.id)"
                                                                                    class="btn btn-primary icon"
                                                                                    type="button"
                                                                                    @if(session()->get('language')=='english')
                                                                                    title="Add Cart"
                                                                                    @else
                                                                                    title="Sepete ekle"
                                                                                @endif >
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn"
                                                                                    type="button">
                                                                                @if(session()->get('language')=='english')
                                                                                    Add to cart
                                                                                @else
                                                                                    Sepete ekle
                                                                                @endif
                                                                            </button>
                                                                        </li>
                                                                        <li class="lnk wishlist">
                                                                            <a data-toggle="tooltip"
                                                                               class="add-to-cart"
                                                                               href="detail.html"
                                                                               @if(session()->get('language')=='english')
                                                                               title="Wishlist"
                                                                               @else
                                                                               title="Beğediklerim"
                                                                                @endif
                                                                            >
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="lnk">
                                                                            <a data-toggle="tooltip"
                                                                               class="add-to-cart"
                                                                               href="detail.html"
                                                                               @if(session()->get('language')=='english')
                                                                               title="Compare"
                                                                               @else
                                                                               title="Karşılatırma Listeme Ekle"
                                                                                @endif>
                                                                                <i class="fa fa-signal"
                                                                                   aria-hidden="true"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->
                                                        </div>
                                                        <!-- /.product -->
                                                    </div>
                                                    <!-- /.products -->
                                                </div>
                                                <!-- /.item -->
                                            @empty
                                                <h5>Mo Product Found</h5>
                                            @endforelse
                                            {{--PRODUCT FORELSE END--}}
                                        </div>
                                        <!-- /.home-owl-carousel -->
                                    </div>
                                    <!-- /.product-slider -->
                                </div>
                                <!-- /.tab-pane -->
                            @endforeach

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive"
                                             src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}"
                                             alt=""></div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"><img class="img-responsive"
                                                            src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}"
                                                            alt=""></div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language')=='english')
                                Featured products
                            @else
                                Özel Ürünler
                            @endif
                        </h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @foreach($featured as $value)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    @if(session()->get('language')=='english')
                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                            <img
                                                                src="{{asset($value->product_thumbnail)}}"
                                                                alt="">
                                                        </a>
                                                        </a>
                                                    @else
                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                            <img
                                                                src="{{asset($value->product_thumbnail)}}"
                                                                alt="">
                                                        </a>
                                                        </a>
                                                    @endif

                                                </div>
                                                <!-- /.image -->

                                                <div class="tag hot"><span>

                                                       @if(session()->get('language')=='english')
                                                            hot
                                                        @else
                                                            özel
                                                        @endif
                                                </span></div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name">
                                                    @if(session()->get('language')=='english')
                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                            {{$value->product_name_en}}
                                                        </a>
                                                        </a>
                                                    @else
                                                        <a href="{{url('product/details/'.$value->id.'/'.$value->product_slug_en)}}">
                                                            {{$value->product_name_tr}}
                                                        </a>
                                                        </a>
                                                    @endif
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description">
                                                    @if(session()->get('language')=='english')
                                                        {{$value->short_description_en}}
                                                    @else
                                                        {{$value->short_description_tr}}
                                                    @endif
                                                </div>

                                                <div class="product-price">
                                                    @if($value->discount_price!=null || $value->discount_price!=0 )
                                                        <span class="price">
                                                                  {{$value->discount_price}}
                                                                </span>
                                                        <span class="price-before-discount">
                                                                    {{$value->selling_price}}
                                                                </span>
                                                    @else
                                                        <span class="price">
                                                                  {{$value->selling_price}}
                                                                </span>
                                                    @endif
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->

                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button data-toggle="modal"
                                                                    data-target="#addToCartModal"
                                                                    id="{{$value->id}}"
                                                                    onclick="prodcutView(this.id)"
                                                                    class="btn btn-primary icon"
                                                                    type="button"
                                                                    @if(session()->get('language')=='english')
                                                                    title="Add Cart"
                                                                    @else
                                                                    title="Sepete ekle"
                                                                @endif >
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn"
                                                                    type="button">
                                                                @if(session()->get('language')=='english')
                                                                    Add to cart
                                                                @else
                                                                    Sepete ekle
                                                                @endif
                                                            </button>
                                                        </li>


                                                            <button
                                                                    id="{{$value->id}}"
                                                                    onclick="addProductToWishlist(this.id)"
                                                                    class="btn btn-primary icon"
                                                                    type="button"
                                                                    @if(session()->get('language')=='english')
                                                                    title="Wishlist"
                                                                    @else
                                                                    title="Beğediklerim"
                                                                @endif >
                                                                <i class=" fa fa-heart"></i>
                                                            </button>


                                                        <li class="lnk">



                                                            <a data-toggle="tooltip" class="add-to-cart"
                                                               href="detail.html"
                                                               @if(session()->get('language')=='english')
                                                               title="Compare"
                                                               @else
                                                               title="Karşılatırma Listeme Ekle"
                                                                @endif>
                                                                <i class="fa fa-signal"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                        </div>
                                        <!-- /.product -->

                                    </div>
                                    <!-- /.products -->
                                </div>
                                <!-- /.item -->
                            @endforeach
                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"><img class="img-responsive"
                                                            src="{{asset('frontend/assets/images/banners/home-banner.jpg')}}"
                                                            alt=""></div>
                                    <div class="strip strip-text">
                                        <div class="strip-inner">
                                            <h2 class="text-right">New Mens Fashion<br>
                                                <span class="shopping-needs">Save up to 40% off</span></h2>
                                        </div>
                                    </div>
                                    <div class="new-label">
                                        <div class="text">NEW</div>
                                    </div>
                                    <!-- /.new-label -->
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->
                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== BEST SELLER ============================================== -->

                    <div class="best-deal wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">Best seller</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p20.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p21.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p22.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p23.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p24.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p25.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p26.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('frontend/assets/images/products/p27.jpg')}}"
                                                                        alt=""> </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== BEST SELLER : END ============================================== -->

                    <!-- ============================================== BLOG SLIDER ============================================== -->
                    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                        <h3 class="section-title">latest form blog</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"><a href="blog.html"><img
                                                        src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}"
                                                        alt=""></a></div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                                    laudantium</a>
                                            </h3>
                                            <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut
                                                labore et
                                                dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"><a href="blog.html"><img
                                                        src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}"
                                                        alt=""></a></div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a>
                                            </h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut
                                                labore et
                                                dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"><a href="blog.html"><img
                                                        src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}"
                                                        alt=""></a></div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a>
                                            </h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem
                                                accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"><a href="blog.html"><img
                                                        src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}"
                                                        alt=""></a></div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a>
                                            </h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem
                                                accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"><a href="blog.html"><img
                                                        src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}"
                                                        alt=""></a></div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a>
                                            </h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem
                                                accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                        <!-- /.blog-slider-container -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section wow fadeInUp new-arriavls">
                        <h3 class="section-title">New Arrivals</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"><a href="detail.html"><img
                                                        src="{{asset('frontend/assets/images/products/p19.jpg')}}"
                                                        alt=""></a></div>
                                            <!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"><span class="price"> $450.99 </span> <span
                                                    class="price-before-discount">$ 800</span></div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button data-toggle="modal" data-target="#addToCartModal"
                                                                class="btn btn-primary cart-btn" type="button">
                                                            Add to cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>
                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"><a href="detail.html"><img
                                                        src="{{asset('frontend/assets/images/products/p28.jpg')}}"
                                                        alt=""></a></div>
                                            <!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"><span class="price"> $450.99 </span> <span
                                                    class="price-before-discount">$ 800</span></div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"><i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add
                                                            to
                                                            cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist"><a class="add-to-cart"
                                                                                href="detail.html"
                                                                                title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a></li>
                                                    <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"><a href="detail.html"><img
                                                        src="{{asset('frontend/assets/images/products/p30.jpg')}}"
                                                        alt=""></a></div>
                                            <!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"><span class="price"> $450.99 </span> <span
                                                    class="price-before-discount">$ 800</span></div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"><i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            Add to cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>
                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"><a href="detail.html"><img
                                                        src="{{asset('frontend/assets/images/products/p1.jpg')}}"
                                                        alt=""></a></div>
                                            <!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"><span class="price"> $450.99 </span> <span
                                                    class="price-before-discount">$ 800</span></div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"><i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add
                                                            to
                                                            cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist"><a class="add-to-cart"
                                                                                href="detail.html"
                                                                                title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a></li>
                                                    <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"><a href="detail.html"><img
                                                        src="{{asset('frontend/assets/images/products/p2.jpg')}}"
                                                        alt=""></a></div>
                                            <!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"><span class="price"> $450.99 </span> <span
                                                    class="price-before-discount">$ 800</span></div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"><i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add
                                                            to
                                                            cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist"><a class="add-to-cart"
                                                                                href="detail.html"
                                                                                title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a></li>
                                                    <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"><a href="detail.html"><img
                                                        src="{{asset('frontend/assets/images/products/p3.jpg')}}"
                                                        alt=""></a></div>
                                            <!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"><span class="price"> $450.99 </span> <span
                                                    class="price-before-discount">$ 800</span></div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"><i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add
                                                            to
                                                            cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist"><a class="add-to-cart"
                                                                                href="detail.html"
                                                                                title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a></li>
                                                    <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->
                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
@endsection()
