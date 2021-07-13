@php


    $tags_en= \App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
@endphp


<div class="sidebar-widget wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">


        <div class="item">
            <div class="avatar">
                <img src="{{asset('frontend/assets/images/testimonials/member1.png')}}" alt="Image">
            </div>
            <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus
                port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em>
            </div>
            <div class="clients_author">John Doe <span>Abc Company</span></div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.item -->


    </div>
    <!-- /.owl-carousel -->
</div>
