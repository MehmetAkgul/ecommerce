@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();

//dd($prefix);
 //dd($route);
//
//
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('admin.dashboard')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Easy</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route=='admin.dashboard')?'active':''}}">
                <a href="{{route('admin.dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{($prefix=='/brand')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu ">
                    <li class="{{($route=='backend.brand.index')?'active':''}}">
                        <a href="{{route('backend.brand.index')}}"><i class="ti-more"></i>All Brands</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{($prefix=='/category')?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='backend.category.index')?'active':''}}">
                        <a href="{{route('backend.category.index')}}"><i class="ti-more"></i>All Category</a>
                    </li>
                    <li class="{{($route=='backend.subcategory.index')?'active':''}}">
                        <a href="{{route('backend.subcategory.index')}}"><i class="ti-more"></i>All SubCategory</a>
                    </li>
                    <li class="{{($route=='backend.subsubcategory.index')?'active':''}}">
                        <a href="{{route('backend.subsubcategory.index')}}"><i class="ti-more"></i>All Sub - SubCategory</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{($prefix=='/product')?'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='backend.product.create')?'active':''}}">
                        <a href="{{route('backend.product.create')}}"><i class="ti-more"></i>Add New Product</a>
                    </li>
                    <li class="{{($route=='backend.product.index')?'active':''}}">
                        <a href="{{route('backend.product.index')}}"><i class="ti-more"></i>Manage Product</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/slider')?'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='backend.slider.index')?'active':''}}">
                        <a href="{{route('backend.slider.index')}}"><i class="ti-more"></i>All Slider</a>
                    </li>

                </ul>
            </li>

            <li class="treeview {{($prefix=='/coupons')?'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i>  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='backend.coupon.index')?'active':''}}">
                        <a href="{{route('backend.coupon.index')}}"><i class="ti-more"></i>All Coupons</a>
                    </li>

                </ul>
            </li>

            <li class="treeview {{($prefix=='/shipping')?'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i>  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='backend.shipping.division.index')?'active':''}}">
                        <a href="{{route('backend.shipping.division.index')}}"><i class="ti-more"></i>Shipping Division</a>
                    </li>
                    <li class="{{($route=='backend.shipping.district.index')?'active':''}}">
                        <a href="{{route('backend.shipping.district.index')}}"><i class="ti-more"></i>Shipping District</a>
                    </li>

                </ul>
            </li>


            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
           aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>


