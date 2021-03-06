@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ALL SUBCATEGORY LIST ------------------                  --}}
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Product List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Selling Price</th>
                                        <th>Discont Price</th>
                                        <th>Status</th>
                                        <th  >Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $val)
                                        <tr>
                                            <td><img src="{{asset($val->product_thumbnail)}}" alt="" width="60"></td>
                                            <td>{{$val->product_name_en}}</td>
                                            <td>{{$val->product_qty}}</td>
                                            <td>{{$val->selling_price}}</td>
                                            <td>
                                                @if($val->discount_price===null||$val->discount_price==0)
                                                    <span class="badge badge-pill badge-info">No Discount</span>
                                                @else
                                                @php
                                                   $amount=$val->selling_price-$val->discount_price;
                                                    $discount=($amount/$val->selling_price)*100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">  %{{round($discount,2)}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($val->status===1)
                                                    <span class="badge badge-pill badge-primary-light">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-warning">InActive</span>
                                                @endif
                                                @if($val->new===1) <span class="badge badge-pill badge-success">New</span>?? @endif
                                                @if($val->hot_deals===1)  <span class="badge badge-pill badge-danger">Hot Deals</span>  @endif
                                                @if($val->featured===1) <span class="badge badge-pill badge-primary">Featured</span>  @endif
                                                @if($val->special_offer===1)  <span class="badge badge-pill badge-warning">Special Offer</span>  @endif
                                                @if($val->special_deals===1)  <span class="badge badge-pill badge-light">Special Deals</span>  @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('backend.product.edit',$val->id)}}"
                                                   class="btn btn-primary btn-sm  " title="Product Details Data"><i
                                                        class="fa fa-eye"></i></a> <br>
                                                <a href="{{route('backend.product.edit',$val->id)}}"
                                                   class="btn btn-info btn-sm  " title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a><br>
                                                <a href="{{route('backend.product.delete',$val->id)}}"
                                                   class="btn btn-danger btn-sm   " id="delete" title="Delete Data"><i
                                                        class="fa fa-trash"></i></a><br>

                                                @if($val->status===1)
                                                    <a href="{{route('backend.product.inactive',$val->id)}}"
                                                       class="btn btn-warning btn-sm   " id="status" title="InActive Now"><i
                                                            class="fa fa-arrow-down"></i></a><br>
                                                @else
                                                    <a href="{{route('backend.product.active',$val->id)}}"
                                                       class="btn btn-success btn-sm   " id="status" title="Active Now"><i
                                                            class="fa fa-arrow-up"></i></a><br>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
            {{--                --------------- ALL SUBCATEGORY L??ST ------------------                  --}}


            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
@section('page-level-script')
    <script type="text/javascript">

        $(document).ready(function () {
            console.log("merhaba d??nya");

            $('select[name="category_id"]').on('change', function () {
                let category_id = $(this).val();
                console.log(category_id);
                if (category_id) {
                    $.ajax({
                        url: "{{url('/category/subsubcategory/ajax')}}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            let d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection()

