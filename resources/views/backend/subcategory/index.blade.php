@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ALL SUBCATEGORY LIST ------------------                  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Categories List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Sub Category En</th>
                                        <th>Sub Category Tr</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subcategories as $val)
                                        <tr>
                                            <td>{{$val['category']['category_name_en']}} </td>
                                            <td>{{$val->subcategory_name_en}}</td>
                                            <td>{{$val->subcategory_name_tr}}</td>
                                            <td>
                                                <a href="{{route('backend.subcategory.edit',$val->id)}}"
                                                   class="btn btn-info" title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('backend.subcategory.delete',$val->id)}}"
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

                {{--                --------------- ADD NEW SUBCATEGORY  ------------------                  --}}
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.subcategory.store')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="category_id">Category Select<span
                                                            class="text-danger">*</span></label>
                                                    <select type="text" class="form-control  " name="category_id"
                                                            id="category_id">
                                                        @foreach($cats as $val)
                                                            <option value="{{$val->id}}">
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
                                                           id="subcategory_name_en">
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
                                                           id="subcategory_name_tr">
                                                    @error('subcategory_name_tr')
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
            {{--                --------------- ADD NEW SUBCATEGORY  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
