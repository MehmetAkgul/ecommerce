<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>
        @if(session()->get('language')=='english') CATEGORIES @else KATEGORİLER @endif
    </div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            {{-- GET CATEGORY TABLO DATA--}}
            @php
                $categories=\App\Models\Category::orderBy('category_name_en')->get();
            @endphp
            {{-- GET CATEGORY TABLO DATA--}}
            @foreach($categories as $cat)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon {{$cat->category_icon}}" aria-hidden="true"></i>
                        @if(session()->get('language')=='english')
                            {{$cat->category_name_en}}
                        @else
                            {{$cat->category_name_tr}}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategories=\App\Models\SubCategory::where('category_id',$cat->id)->orderBy('subcategory_name_en')->get();
                                @endphp
                                @foreach($subcategories as $subcat)
                                    @php
                                        $subsubcategories=\App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en')->get();
                                    @endphp
                                    <div class="col-sm-12 col-md-3">
                                        <h2 class="title">
                                            @if(session()->get('language')=='english')
                                                <a href="{{url('subcategory/product/en/'.$subcat->id."/".$subcat->subcategory_slug_en)}}">
                                                    {{$subcat->subcategory_name_en}}
                                                </a>
                                            @else
                                                <a href="{{url('subcategory/product/tr/'.$subcat->id."/".$subcat->subcategory_slug_tr)}}">
                                                    {{$subcat->subcategory_name_tr}}
                                                </a>
                                            @endif
                                        </h2>
                                        <ul class="links list-unstyled">
                                            @foreach($subsubcategories as $subsubcat)
                                                <li>
                                                    @if(session()->get('language')=='english')
                                                        <a href="{{url('sububcategory/product/en/'.$subsubcat->id."/".$subsubcat->subsubcategory_slug_en)}}">
                                                            {{$subsubcat->subsubcategory_name_en}}
                                                        </a>
                                                    @else
                                                        <a href="{{url('subsubcategory/product/tr/'.$subsubcat->id."/".$subsubcat->subsubcategory_slug_tr)}}">
                                                            {{$subsubcat->subsubcategory_name_tr}}
                                                        </a>
                                                    @endif
                                                 </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endforeach
                                <div class="dropdown-banner-holder">
                                    <a href="#">
                                        <img alt="" src="{{asset('frontend/assets/images/banners/banner-side.png')}}">
                                    </a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
            @endforeach
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
