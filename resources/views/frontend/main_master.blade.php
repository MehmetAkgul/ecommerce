<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">
    @yield('page-level-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css"/>

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/echo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/lightbox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/scripts.js')}}" type="text/javascript"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>
<!--  Start Add to Cart Product Modal -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong id="pName"></strong></h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="..." id="pImage" class="card-img-top" width="180" alt="...">

                        </div>
                    </div>{{--end col-md-4--}}
                    <div class="col-md-4">

                        <ul class="list-group">
                            <li class="list-group-item">
                                @if(session()->get('language')=='english') Product Price: @else Ürün Fiyatı : @endif
                                <b><span class="text-danger" id="pPrice"></span> </b>
                                <del id="pDiscountPrice"></del>
                            </li>
                            <li class="list-group-item">
                                @if(session()->get('language')=='english') Product Code: @else Ürün Kodu : @endif
                                <b id="pCode"></b>
                            </li>
                            <li class="list-group-item">
                                @if(session()->get('language')=='english') Category: @else Kategory : @endif
                                <b id="pCategory"></b>
                            </li>
                            <li class="list-group-item">
                                @if(session()->get('language')=='english') Brand: @else Kategory : @endif
                                <b id="pBrand"></b>
                            </li>
                            <li class="list-group-item">
                                @if(session()->get('language')=='english') Stock : @else Stok : @endif

                                <span class="badge badge-pill badge-success"
                                      style="background-color: green; color: white;"
                                      id="aviable">
                                </span>
                                <span class="badge badge-pill badge-danger"
                                      style="background-color: #721c24; color: white;"
                                      id="stockout">
                               </span>
                            </li>
                        </ul>
                    </div>{{--end col-md-4--}}
                    <div class="col-md-4">
                        <div class="form-group" id="colorArea">
                            <label for="AddtoCartChooseColor">
                                @if(session()->get('language')=='english') Choose Color: @else Renk Seçiniz : @endif
                            </label>
                            <select class="form-control" id="AddtoCartChooseColor"
                                    name="AddtoCartChooseColor"> </select>
                        </div>
                        <div class="form-group" id="sizeArea">
                            <label for="AddtoCartChooseSize">
                                @if(session()->get('language')=='english') Choose Size: @else Büyüklük Seçiniz : @endif
                            </label>
                            <select class="form-control" id="AddtoCartChooseSize" name="AddtoCartChooseSize"> </select>
                        </div>
                        <div class="form-group">
                            <label for="AddtoCartQuantity">
                                @if(session()->get('language')=='english') Choose Quantity: @else Miktar Seçiniz
                                : @endif
                            </label>
                            <input type="number" min="1" value="1" class="form-control" id="addtoCartQuantity">
                        </div>


                    </div>{{--end col-md-4--}}
                    <div class="form-group float-right">

                    </div>
                </div> {{--end row--}}
            </div>
            <div class="modal-footer">
                <input type="hidden" id="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">
                    @if(session()->get('language')=='english') Close @else Kapat @endif

                </button>
                <button class="btn btn-primary cart-btn" type="button" onclick="addToCart()">
                    @if(session()->get('language')=='english') Add To Cart @else Sepete Ekle @endif
                    <i class="fa fa-shopping-cart"></i>
                </button>

            </div>
        </div>
    </div>
</div>

<!-- End  Add to Cart Product Modal -->
<script type="text/javascript">

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    //start product view with model
    function prodcutView(id) {
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + id,
            dataType: 'json',
            success: function (data) {

                @if(session()->get('language')=='english')
                $('#pName').text(data.product.product_name_en);
                $('#pCategory').text(data.product.category.category_name_en);
                $('#pBrand').text(data.product.brand.brand_name_en);
                //color
                $('select[name="AddtoCartChooseColor"]').empty();
                $.each(data.color_en, function (key, value) {
                    $('select[name="AddtoCartChooseColor"]').append('<option value="' + value + '">' + value + ' </option>'
                    )
                    if (data.color_en == "") {
                        $('#colorArea').hide();
                    } else {
                        $('#colorArea').show();
                    }
                });
                //size
                $('select[name="AddtoCartChooseSize"]').empty();
                $.each(data.size_en, function (key, value) {
                    $('select[name="AddtoCartChooseSize"]').append('<option value="' + value + '">' + value + ' </option>'
                    )
                    if (data.size_en == "") {
                        $('#sizeArea').hide();
                    } else {
                        $('#colorArea').show();
                    }

                });
                @else
                $('#pName').text(data.product.product_name_tr);
                $('#pCategory').text(data.product.category.category_name_tr);
                $('#pBrand').text(data.product.brand.brand_name_tr);
                //color
                $('select[name="AddtoCartChooseColor"]').empty();
                $.each(data.color_tr, function (key, value) {
                    $('select[name="AddtoCartChooseColor"]').append('<option value="' + value + '">' + value + ' </option>'
                    )
                    if (data.color_tr == "") {
                        $('#colorArea').hide();
                    } else {
                        $('#colorArea').show();
                    }

                });
                //size
                $('select[name="AddtoCartChooseSize"]').empty();
                $.each(data.size_tr, function (key, value) {
                    $('select[name="AddtoCartChooseSize"]').append('<option value="' + value + '">' + value + ' </option>'
                    )
                    if (data.size_tr == "") {
                        $('#sizeArea').hide();
                    } else {
                        $('#colorArea').show();
                    }
                });
                @endif

                $('#pImage').attr('src', '/' + data.product.product_thumbnail);
                $('#pCode').text(data.product.product_code);
                $('#product_id').val(data.product.id);
                $('#addtoCartQuantity').val(1);
                //PRODUCT PRICE
                if (data.product.discount_price == null || data.product.discount_price == 0) {
                    $('#pPrice').text('');
                    $('#pDiscountPrice').text('');
                    $('#pPrice').text(data.product.selling_price);
                } else {
                    $('#pPrice').text(data.product.discount_price);
                    $('#pDiscountPrice').text(data.product.selling_price);
                }
                //PRODUCT PRICE
                $('#stockout').hide();
                $('#aviable').hide();
                //PRODUCT STOCK
                if (data.product.product_qty > 0) {
                    @if(session()->get('language')=='english')
                    $('#aviable').show();
                    $('#aviable').text('Aviable');
                    @else
                    $('#aviable').show();
                    $('#aviable').text('Stokta');
                    @endif
                } else {
                    @if(session()->get('language')=='english')
                    $('#stockout').show();
                    $('#stockout').text('Stockout');
                    @else
                    $('#stockout').show();
                    $('#stockout').text('Tükendi');
                    @endif
                }
                //PRODUCT STOCK
            }
        })
    }

    // end product view with modal

    //Start Add To Cart Product
    function addToCart() {
        let product_name = $('#pName').text();
        let id = $('#product_id').val();
        let color = $('#AddtoCartChooseColor option :selected').text();
        let size = $('#AddtoCartChooseSize option :selected').text();
        let quantity = $('#addtoCartQuantity').val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {color: color, size: size, quantity: quantity, product_name: product_name},
            url: "/cart/data/store/s" + id,
            success: function (data) {
                $('#addToCartModal').modal('hide');
                //  console.log(data);

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',

                    showConfirmButton: false,
                    timer: 3000
                });
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                //End´Message
            },
            error: function (data) {
                // Start Message
                $('#addToCartModal').modal('hide');
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 3000
                });

                    Toast.fire({
                        icon: 'error',
                        title: 'Sistem hatası oluştu Lütfen Daha Sonra Deneyin',
                    });

                //End´Message
            }
        })
    }

    //End Add To Cart Product

</script>
</body>
</html>
