@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- EDIT BRAND ------------------  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.brand.update')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="brand_name_en">Brand Name English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="brand_name_en"
                                                           id="brand_name_en" value="{{$brand->brand_name_en}}">
                                                    <input type="hidden" name="id" value="{{$brand->id}}">
                                                    @error('brand_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_name_tr">Brand Name Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="brand_name_tr"
                                                           id="brand_name_tr" value="{{$brand->brand_name_tr}}">
                                                    @error('brand_name_tr')
                                                    <span class=" text-danger">
                                                    <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_image">Brand Image<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" name="brand_image"
                                                           id="brand_image">
                                                    @error('brand_image')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <img src="{{asset($brand->brand_image)}}" width="250" alt="">
                                                    <input type="hidden" value="{{($brand->brand_image)}}"
                                                           name="old_image">
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
            {{--                --------------- ADD NEW BRAND  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
