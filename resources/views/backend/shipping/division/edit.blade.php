@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- EDIT coupon ------------------  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.coupon.update')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="coupon_name_en">Coupon Name English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="coupon_name_en"
                                                           id="coupon_name_en" value="{{$coupon->coupon_name_en}}">
                                                    <input type="hidden" name="id" value="{{$coupon->id}}">
                                                    @error('coupon_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="coupon_name_tr">Coupon Name Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="coupon_name_tr"
                                                           id="coupon_name_tr" value="{{$coupon->coupon_name_tr}}">
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
                                                           id="coupon_discount" value="{{$coupon->coupon_discount}}">
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
                                                           id="coupon_validity"
                                                           value="{{$coupon->coupon_validity}}"
                                                               min="{{\Illuminate\Support\Carbon::now()->format('Y-m-d')}}">
                                                    @error('coupon_validity')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-success float-right" type="submit">Update
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


                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
