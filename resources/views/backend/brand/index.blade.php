@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ALL BRAND LİST ------------------                  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Tr</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $val)
                                        <tr>
                                            <td>{{$val->brand_name_en}}</td>
                                            <td>{{$val->brand_name_tr}}</td>
                                            <td><img src="{{asset($val->brand_image)}}" width="40px" alt=""></td>
                                            <td>
                                                <a href="" class="btn btn-info">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
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
                {{--                --------------- ALL BRAND LİST ------------------                  --}}

                {{--                --------------- ADD NEW BRAND  ------------------                  --}}
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('admin.brand.store')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="brand_name_en">Brand Name English<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="brand_name_en"id="brand_name_en">
                                                    @error('brand_name_en')
                                                    <div class="alert-danger alert">
                                                        <strong>{{$message}}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_name_tr">Brand Name Türkçe<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="brand_name_tr" id="brand_name_tr">
                                                    @error('brand_name_tr')
                                                    <div class="alert-danger alert">
                                                        <strong>{{$message}}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_image">Brand Image<span class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" name="brand_image" id="brand_image">
                                                    @error('brand_image')
                                                    <div class="alert-danger alert">
                                                        <strong>{{$message}}</strong>
                                                    </div>
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
            {{--                --------------- ADD NEW BRAND  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
