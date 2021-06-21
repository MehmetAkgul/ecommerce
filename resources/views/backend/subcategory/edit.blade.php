@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- EDIT SUBCATEGORY ------------------  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Sub Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.subcategory.update')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$subcategory->id}}">
                                                <div class="form-group">
                                                    <label for="category_id">Category Select<span
                                                            class="text-danger">*</span></label>
                                                    <select type="text" class="form-control" name="category_id"
                                                            id="category_id">
                                                        @foreach($cats as $val)
                                                            <option value="{{$val->id}}"
                                                                {{$val->id==$subcategory->category_id?'selected':''}}>
                                                                {{$val->category_name_en}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_icon')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="subcategory_name_en">Category Name English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="subcategory_name_en"
                                                           id="subcategory_name_en"
                                                           value="{{$subcategory->subcategory_name_en}}">
                                                    @error('subcategory_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="subcategory_name_tr">Category Name Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="subcategory_name_tr"
                                                           id="subcategory_name_tr"
                                                           value="{{$subcategory->subcategory_name_tr}}">
                                                    @error('subcategory_name_tr')
                                                    <span class=" text-danger">
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
            {{--                --------------- ADD NEW SUB CATEGORY  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
