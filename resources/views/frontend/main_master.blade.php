<!DOCTYPE html>


@if(session()->get('language')=='english')
    <html lang="en">
    @else
        <html lang="tr">
        @endif
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
            <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"
                  type="text/css"/>

            <!-- Icons/Glyphs -->
            <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

            <!-- Fonts -->
            <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
            <link
                href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                type="text/javascript"></script>
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
        <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel"
             aria-hidden="true">
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
                                        @if(session()->get('language')=='english') Product Price: @else Ürün Fiyatı
                                        : @endif
                                        <b><span class="text-danger" id="pPrice"></span> </b>
                                        <del id="pDiscountPrice"></del>
                                    </li>
                                    <li class="list-group-item">
                                        @if(session()->get('language')=='english') Product Code: @else Ürün Kodu
                                        : @endif
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
                                        @if(session()->get('language')=='english') Choose Color: @else Renk Seçiniz
                                        : @endif
                                    </label>
                                    <select class="form-control" id="AddtoCartChooseColor"
                                            name="AddtoCartChooseColor"> </select>
                                </div>
                                <div class="form-group" id="sizeArea">
                                    <label for="AddtoCartChooseSize">
                                        @if(session()->get('language')=='english') Choose Size: @else Büyüklük Seçiniz
                                        : @endif
                                    </label>
                                    <select class="form-control" id="AddtoCartChooseSize"
                                            name="AddtoCartChooseSize"> </select>
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
                let color = $('#AddtoCartChooseColor option:selected').text();
                let size = $('#AddtoCartChooseSize option:selected').text();
                console.log("ssize " + size);
                console.log("color " + color);
                let quantity = $('#addtoCartQuantity').val();

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {color: color, size: size, quantity: quantity, product_name: product_name},
                    url: "/cart/data/store/" + id,
                    success: function (data) {

                        minicart();
                        $('#addToCartModal').modal('hide');

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


        <script type="text/javascript">
            function minicart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function (response) {
                        let miniCart = "";
                        $('span[id="cartTotal"]').text(response.cartTotal);
                        $('span[id="cartQty"]').text(response.cartQty);
                        console.log(response.carts);
                        $.each(response.carts, function (key, value) {
                            console.log(value);
                            miniCart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image">
                                                <a href="detail.html"> <img src="/${value.options.image}" alt=""> </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name} </a></h3>
                                            <div class="price">${value.price}*${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <hr>`;
                        });

                        $('#miniCart').html(miniCart)
                    }
                });
            }

            minicart();

            //Sart Mini Cart Remove

            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/mini/cart/product-remove/' + rowId,
                    dataType: 'json',
                    success: function (data) {
                        minicart();

                        //start Message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        console.log(data)

                        Toast.fire({
                            type: data.type,
                            title: data.title,
                            icon: data.type,
                        });
                        // End Message
                    }
                });
            }

            // End Mini Cart Remove


        </script>


        {{--    Start    Add Wishlist Section    --}}

        <script type="text/javascript">


            function addToWishList(product_id) {
                $.ajax({
                    type: 'POST',
                    url: '/add/wishlist/' + product_id,
                    dataType: 'json',
                    success: function (data) {

                        //start Message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000
                        });
                        Toast.fire({
                            title: data.title,
                            icon: data.icon,
                        });

                        // End Message

                    }
                });
            }

        </script>

        {{--    End    Add Wishlist Section    --}}


        {{--    START    WISHLIST AREA --}}
        <script type="text/javascript">

            // START GET WISHLIST PRODUCT
            function loadDataWishlist() {
                $.ajax({
                    type: 'GET',
                    url: '/user/get/wishlist',
                    dataType: 'json',
                    success: function (response) {
                        let rows = "";

                        console.log(response);
                        $.each(response, function (key, value) {
                            console.log(value);
                            rows += `<tr>
                                            <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="image"></td>
                                            <td class="col-md-7">
                                                <div class="product-name">
                                                    <a href="#">

                                                    ${value.product.product_name_en}

                                                    </a>
                                                </div>
                                                <div class="rating">
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star non-rate"></i>
                                                    <span class="review">( 06 Reviews )</span>
                                                </div>
                                                <div class="price">
                                                    ${value.product.discount_price == null
                                ? `${value.product.selling_price}`
                                : `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                            }

                                                </div>
                                            </td>
                                            <td class="col-md-2">
                                                <button data-toggle="modal"
                                                        data-target="#addToCartModal"
                                                        id="${value.product.id}"
                                                        onclick="prodcutView(this.id)"
                                                        class="btn-upper btn btn-primary">
                                                        Add to cart
                                                </button>
                                            </td>
                                            <td class="col-md-1 close-btn">
                                                <button type="submit" class="btn-upper btn btn-danger" id="${value.id}"
                                                        onclick="wishlistRemove(this.id)">
                                                        <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>`;
                        });

                        $('#wishlist').html(rows)
                    }
                });
            }

            loadDataWishlist();
            // END GET WISHLIST PRODUCT

            // START REMOVE WISHLIST PRODUCT

            function wishlistRemove(id) {
                $.ajax({
                    type: 'GET',
                    url: '/user/wishlist/product-remove/' + id,
                    dataType: 'json',
                    success: function (data) {
                        minicart();

                        //start Message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            title: data.title,
                            icon: data.icon,
                        });
                        // End Message
                    }
                });
                loadDataWishlist();
            }

            // END REMOVE WISHLIST PRODUCT

        </script>

        {{--  END WISHLIST AREA --}}

        </body>
        </html>
