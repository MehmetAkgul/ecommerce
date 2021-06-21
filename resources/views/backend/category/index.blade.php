@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ALL CATEGORY LİST ------------------                  --}}
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
                                        <th>Icon</th>
                                        <th>Category En</th>
                                        <th>Category Tr</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $val)
                                        <tr>
                                            <td><i class="{{($val->category_icon)}}"></i></td>
                                            <td>{{$val->category_name_en}}</td>
                                            <td>{{$val->category_name_tr}}</td>
                                            <td>
                                                <a href="{{route('backend.category.edit',$val->id)}}"
                                                   class="btn btn-info" title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('backend.category.delete',$val->id)}}"
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
                {{--                --------------- ALL CATEGORY LİST ------------------                  --}}

                {{--                --------------- ADD NEW CATEGORY  ------------------                  --}}
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
                                                  action="{{route('backend.category.store')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="category_name_en">Category Name English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="category_name_en"
                                                           id="category_name_en">
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
                                                           id="category_name_tr">
                                                    @error('category_name_tr')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_icon">Category Icon<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="category_icon"
                                                           id="category_icon">
                                                    @error('category_icon')
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
            {{--                --------------- ADD NEW CATEGORY  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
