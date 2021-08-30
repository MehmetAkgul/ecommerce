@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ALL COUPON LİST ------------------                  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Coupon List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name EN</th>
                                        <th>Name TR</th>
                                        <th>Dicount(%)</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th style="min-width: 100px;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $val)
                                        <tr>
                                            <td> {{$val->coupon_name_en}}   </td>
                                            <td> {{$val->coupon_name_tr}}   </td>
                                            <td> {{$val->coupon_discount}}(%) </td>
                                            <td>

                                                @if($val->coupon_validity>= \Illuminate\Support\Carbon::now()->format('Y-m-d'))
                                                    <span class="badge badge-pill badge-success">{{\Illuminate\Support\Carbon::parse($val->coupon_validity)->format('d/m/Y')}}</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">{{\Illuminate\Support\Carbon::parse($val->coupon_validity)->format('d/m/Y')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($val->status===1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td width="%30">
                                                <a href="{{route('backend.coupon.edit',$val->id)}}"
                                                   class="btn btn-info btn-sm " title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('backend.coupon.delete',$val->id)}}"
                                                   class="btn btn-danger btn-sm " id="delete" title="Delete Data"><i
                                                        class="fa fa-trash"></i></a>
                                                @if($val->status===1)
                                                    <a href="{{route('backend.coupon.inactive',$val->id)}}"
                                                       class="btn btn-warning btn-sm   " id="status"
                                                       title="InActive Now"><i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{route('backend.coupon.active',$val->id)}}"
                                                       class="btn btn-success btn-sm   " id="status" title="Active Now"><i
                                                            class="fa fa-arrow-up"></i></a>
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
                {{--                --------------- ALL coupon LİST ------------------                  --}}

                {{--                --------------- ADD NEW coupon  ------------------                  --}}
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.coupon.store')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="coupon_name_en">Coupon Name EN <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="coupon_name_en"
                                                           id="coupon_name_en">
                                                    @error('coupon_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="coupon_name_tr">Coupon Name TR<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="coupon_name_tr"
                                                           id="coupon_name_tr">
                                                    @error('coupon_name_tr')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="coupon_discount">Coupon Discount(%) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="coupon_discount"
                                                           id="coupon_discount">
                                                    @error('coupon_discount')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="coupon_validity">Coupon Validity Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" name="coupon_validity"
                                                           id="coupon_validity" min="{{\Illuminate\Support\Carbon::now()->format('Y-m-d')}}">
                                                    @error('coupon_validity')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-success float-right" type="submit">Save
                                                        </button>
                                                    </div>
                                            </form>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-body -->
                            </div>


                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
            {{--                --------------- ADD NEW coupon  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
