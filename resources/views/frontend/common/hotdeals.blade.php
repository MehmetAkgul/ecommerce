@php
    $hot_deals = \App\Models\Product:: where('hot_deals', 1)->orderBy('product_name_en', 'ASC')->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
    <h3 class="section-title">

        @if(session()->get('language')=='english')
            hot deals
        @else
            Fırsat Ürünleri
        @endif

    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
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
                        <div class="sale-offer-tag"><span>35%<br>off</span></div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box">
                                    <span class="key">120</span>
                                    <span class="value">Days</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="hour box">
                                    <span class="key">20</span>
                                    <span class="value">HRS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="minutes box">
                                    <span class="key">36</span>
                                    <span class="value">MINS</span>
                                </div>
                            </div>

                            <div class="box-wrapper hidden-md">
                                <div class="seconds box">
                                    <span class="key">60</span>
                                    <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
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

                        <div class="product-price">
                            @if($value->discount_price!=null || $value->discount_price!=0 )
                                <span class="price"> {{$value->discount_price}} </span>
                                <span class="price-before-discount"> {{$value->selling_price}} </span>
                            @else
                                <span class="price"> {{$value->selling_price}} </span>
                            @endif

                        </div><!-- /.product-price -->

                    </div><!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">

                            <div class="add-cart-button btn-group">
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
                            </div>

                        </div><!-- /.action -->
                    </div><!-- /.cart -->
                </div>
            </div>
        @endforeach


    </div><!-- /.sidebar-widget -->
</div>
