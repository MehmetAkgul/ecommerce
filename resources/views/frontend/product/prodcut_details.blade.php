@extends('frontend.main_master')

@section('title')
    Home Easy Online Shop -
    @if(session()->get('language')=='english')
        {{$product->product_name_en}}
    @else
        {{$product->product_name_tr}}
    @endif
@endsection

@section('page-level-css')
    <link href="{{asset('frontend/assets/css/lightbox.css')}}" rel="stylesheet">
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li>
                        @if(session()->get('language')=='english')
                            <a href="#">  {{$product->category_name_en}}</a>
                        @else
                            <a href="#">{{$product->category_name_en}}</a>
                        @endif
                        </li>
                    <li class='active'>
                        @if(session()->get('language')=='english')
                            {{$product->product_name_en}}
                        @else
                            {{$product->product_name_tr}}
                        @endif
                    </li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                        </div>


                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('frontend.common.hotdeals')
                        <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                            <h3 class="section-title">Newsletters</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <p>Sign Up for Our Newsletter!</p>
                                <form>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Subscribe to our newsletter">
                                    </div>
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                            <div id="advertisement" class="advertisement">
                                <div class="item">
                                    <div class="avatar"><img
                                            src="{{asset('frontend/assets/images/testimonials/member1.png')}}"
                                            alt="Image">
                                    </div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">John Doe <span>Abc Company</span></div>
                                    <!-- /.container-fluid -->
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img
                                            src="{{asset('frontend/assets/images/testimonials/member3.png')}}"
                                            alt="Image">
                                    </div>
                                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span></div>
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img
                                            src="{{asset('frontend/assets/images/testimonials/member2.png')}}"
                                            alt="Image">
                                    </div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span></div>
                                    <!-- /.container-fluid -->
                                </div><!-- /.item -->

                            </div><!-- /.owl-carousel -->
                        </div>

                        <!-- ============================================== Testimonials: END ============================================== -->


                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>{{--product details--}}
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        @foreach($multiImages as $img)
                                            <div class="single-product-gallery-item" id="slide{{($img->id)}}">
                                                <a data-lightbox="image-{{asset($img->id)}}" data-title="Gallery"
                                                   href="{{asset($img->photo_name)}}">
                                                    <img class="img-responsive" alt=""
                                                         src="{{asset('frontend/assets/images/blank.gif')}}"
                                                         data-echo="{{asset($img->photo_name)}}"/>
                                                </a>
                                            </div><!-- /.single-product-gallery-item -->
                                        @endforeach
                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            @foreach($multiImages as $img)

                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                       data-slide="{{asset($img->id)}}" href="#slide{{($img->id)}}">
                                                        <img class="img-responsive" width="85" alt=""
                                                             src="{{asset('frontend/assets/images/blank.gif')}}"
                                                             data-echo="{{asset($img->photo_name)}}"/>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->


                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="pName">
                                        @if(session()->get('language')=='english')
                                            {{$product->product_name_en}}
                                        @else
                                            {{$product->product_name_tr}}
                                        @endif
                                    </h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-3 ">
                                                <div class="stock-box">
                                                    <span class="label">

                                                     @if(session()->get('language')=='english') Availability : @else
                                                            Stok Durumu : @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 ">
                                                <div class="stock-box">
                                                    <span class="value">
                                                        @if($product->product_qty>0)
                                                            @if(session()->get('language')=='english') In Stock @else
                                                                Stokta @endif
                                                        @else
                                                            @if(session()->get('language')=='english') Out Stock @else
                                                                Stokta Yok @endif
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if(session()->get('language')=='english') {{$product->short_description_en}} @else
                                            {{$product->short_description_tr}} @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if($product->discounted_price==null)
                                                        <span class="price">{{$product->selling_price}} TL</span>
                                                    @else
                                                        <span class="price">{{$product->discounted_price}} TL</span>
                                                        <span class="price-strike">{{$product->selling_price}} TL</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->


                                    {{--                                    /////// Product Size And Product Color     ///////////////--}}

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title control-label">
                                                    @if(session()->get('language')=='english')
                                                        Choose Color
                                                    @else
                                                        Renk Se??iniz
                                                    @endif
                                                    <span>*</span></label>
                                                <select class="form-control unicase-form-control selectpicker" id="AddtoCartChooseColor">
                                                    @if(session()->get('language')=='english')
                                                        <option selected="">--Choose Color--</option>
                                                    @else
                                                        <option selected="">--Renk Se??iniz--</option>
                                                    @endif
                                                    @if(session()->get('language')=='english')
                                                        @foreach($color_en as $color)
                                                            <option value="{{$color}}">{{$color}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($color_tr as $color)
                                                            <option value="{{$color}}">{{$color}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                @if($product->product_size_en==null)

                                                @else

                                                <label class="info-title control-label" id="AddtoCartChooseSize">
                                                    @if(session()->get('language')=='english')
                                                        Choose Size
                                                    @else
                                                        Boyut Se??iniz
                                                    @endif
                                                    <span>*</span></label>
                                                <select class="form-control unicase-form-control selectpicker">
                                                    @if(session()->get('language')=='english')
                                                        <option selected="">--Choose Size--</option>
                                                    @else
                                                        <option selected="">--Boyut Se??iniz--</option>
                                                    @endif
                                                    @if(session()->get('language')=='english')
                                                        @foreach($size_en as $size)
                                                            <option value="{{$size}}">{{$size}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($size_tr as $size)
                                                            <option value="{{$size}}">{{$size}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">
                                                       @if(session()->get('language')=='english')
                                                        Qty :
                                                    @else
                                                        Adet :
                                                    @endif

                                                </span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" id="addtoCartQuantity" min="1" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" id="product_id" value="{{$product->id}}" min="1">


                                            <div class="col-sm-7">
                                                <button type="submit" onclick="addToCart()" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i>
                                                    @if(session()->get('language')=='english')
                                                        ADD TO CART
                                                    @else
                                                        SEPETE EKLE
                                                    @endif
                                                </button>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->


                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">
                                            @if(session()->get('language')=='english')
                                                DESCRIPTION
                                            @else
                                                ??R??N A??IKLAMASI
                                            @endif
                                        </a></li>
                                    <li><a data-toggle="tab" href="#review">
                                            @if(session()->get('language')=='english')
                                                REVIEW
                                            @else
                                                ??R??N YORUMLARI
                                            @endif

                                        </a></li>
                                    <li><a data-toggle="tab" href="#tags">
                                            @if(session()->get('language')=='english')
                                                TAGS
                                            @else
                                                ??R??N  ET??KETLER??
                                            @endif

                                        </a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            @if(session()->get('language')=='english')
                                                {!!$product->long_description_tr!!}
                                            @else
                                                {!!$product->long_description_tr!!}
                                            @endif
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span
                                                                class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span>
                                                        </div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit.Aliquam suscipit."
                                                        </div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->


                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                           value="5"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                               id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                               id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review"
                                                                                  id="exampleInputReview" rows="4"
                                                                                  placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW
                                                                </button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag"
                                                               class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS
                                                    </button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language')=='english')
                                Related products
                            @else
                                ??L????K??L?? ??R??NLER
                            @endif
                        </h3>
                        <div
                            class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($relatedProduct as $value)

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
                                            </div><!-- /.image -->
                                            <div class="tag hot"><span>sale</span></div>
                                        </div><!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                @if(session()->get('language')=='english')
                                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                                        {{$value->product_name_en}}
                                                    </a>
                                                    </a>
                                                @else
                                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
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
                                            </div><!-- /.product-price -->
                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="tooltip"
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
                                                        <a data-toggle="tooltip" class="add-to-cart"
                                                           href="detail.html"
                                                           @if(session()->get('language')=='english')
                                                           title="Wishlist"
                                                           @else
                                                           title="Be??ediklerim"
                                                            @endif
                                                        >
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>
                                                    <li class="lnk">
                                                        <a data-toggle="tooltip" class="add-to-cart"
                                                           href="detail.html"
                                                           @if(session()->get('language')=='english')
                                                           title="Compare"
                                                           @else
                                                           title="Kar????lat??rma Listeme Ekle"
                                                            @endif>
                                                            <i class="fa fa-signal"
                                                               aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @endforeach

                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->


            <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- == = BRANDS CAROUSEL : END = -->    </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection()
