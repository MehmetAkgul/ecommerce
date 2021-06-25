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
                                        <th>Product Name English</th>
                                        <th>Product Name Türkçe</th>
                                          <th>Quantity</th>
                                        <th>Selling Price</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $val)
                                        <tr>
                                            <td><img src="{{asset($val->product_thumbnail)}}" alt="" width="60"></td>
                                            <td>{{$val->product_name_en}}</td>
                                            <td>{{$val->product_name_tr}}</td>
                                             <td>{{$val->product_qty}}</td>
                                            <td>{{$val->selling_price}}</td>
                                            <td>
                                                <a href="{{url('/product/edit/'.$val->category_id."/".$val->id)}}"
                                                   class="btn btn-info" title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('backend.product.delete',$val->id)}}"
                                                   class="btn btn-danger" id="delete" title="Delete Data"><i
                                                        class="fa fa-trash"></i></a>
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
            {{--                --------------- ALL SUBCATEGORY LİST ------------------                  --}}


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
            console.log("merhaba dünya");

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

