@extends('frontend.main_master')

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-description item">  @if(session()->get('language')=='english')
                                            Image  @else Resim @endif </th>
                                    <th class="cart-product-name item"> @if(session()->get('language')=='english')
                                            Name  @else İsim @endif </th>
                                    <th class="cart-edit item">@if(session()->get('language')=='english') Color  @else
                                            Renk @endif </th>
                                    <th class="cart-edit item">@if(session()->get('language')=='english') Size  @else
                                            Ölçü @endif </th>
                                    <th class="cart-qty item">@if(session()->get('language')=='english') Quantity  @else
                                            Adet @endif </th>
                                    <th class="cart-sub-total item">@if(session()->get('language')=='english')
                                            Subtotal  @else Ara Toplam @endif </th>
                                    <th class="cart-total last-item">@if(session()->get('language')=='english')
                                            GrandTotal  @else Toplam @endif </th>
                                    <th class="cart-romove item">@if(session()->get('language')=='english')Remove  @else
                                            Sil @endif </th>

                                </tr>
                                </thead><!-- /thead -->
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
							<span class="">
								<a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
							</span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                                </tfoot>
                                <tbody id="mycart">


                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                        <table class="table" id="notappliedCouponField">
                            <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">
                                         @if(session()->get('language')=='english')
                                            Discount Code @else İndirim Kodu @endif
                                        </span>
                                    <p>
                                        @if(session()->get('language')=='english')
                                            Enter your coupon code if you have one.. @else Varsa kupon kudunuzu
                                        giriniz.. @endif</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input"
                                               @if(session()->get('language')=='english')
                                               placeholder="You Coupon.." @else  placeholder="Kuponunuzu Giriniz"
                                               @endif
                                               id="coupon_name">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary"
                                                onclick="applyCoupon()">
                                            @if(session()->get('language')=='english')
                                                APPLY COUPON @else KUPONU UYGULA @endif
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->


                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead id="couponCalculateField">

                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <button type="submit" class="btn btn-primary checkout-btn">
                                            @if(session()->get('language')=='english')
                                                PROCCED TO CHEKOUT @else ÖDEME YAPMAK İÇİN DEVAM ET @endif
                                        </button>

                                        <span class="">
                                            @if(session()->get('language')=='english')
                                                Checkout with multiples address! @else Çoklu adres ile ödeme
                                            için.. @endif
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->


                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
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
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->


@endsection()
