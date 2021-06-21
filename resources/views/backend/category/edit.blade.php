@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- EDIT CATEGORY ------------------  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.category.update')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="category_name_en">Category Name English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="category_name_en"
                                                           id="category_name_en" value="{{$category->category_name_en}}">
                                                    <input type="hidden" name="id" value="{{$category->id}}">
                                                    @error('category_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_name_tr">Category Name Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="category_name_tr"
                                                           id="category_name_tr" value="{{$category->category_name_tr}}">
                                                    @error('category_name_tr')
                                                    <span class=" text-danger">
                                                    <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_icon">Category Icon<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="category_icon"
                                                           value="{{$category->category_icon}}" id="category_icon">
                                                    @error('category_icon')
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
            {{--                --------------- ADD NEW BRAND  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
