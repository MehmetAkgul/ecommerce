@php


    $tags_en= \App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_tr= \App\Models\Product::groupBy('product_tags_tr')->select('product_tags_tr')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">
        @if(session()->get('language')=='english') Product tags @else ÜRÜN ETİKETLERİ @endif
    </h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language')=='english')
                @foreach($tags_en as $value)
                    <a class="item"
                       title="{{str_replace(',',' ',$value->product_tags_en)}}"
                       href="{{url('product/tag/'.$value->product_tags_en.'/en')}}">
                        {{str_replace(',',' ',$value->product_tags_en)}}
                    </a>
                @endforeach
            @else
                @foreach($tags_tr as $value)
                    <a class="item"
                       title="{{str_replace(',',' ',$value->product_tags_tr)}}"
                       href="{{url('product/tag/'.$value->product_tags_tr.'/tr')}}">
                        {{str_replace(',',' ',$value->product_tags_tr)}}
                    </a>
                @endforeach
            @endif

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
