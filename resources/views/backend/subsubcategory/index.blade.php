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
                                        <th>SubCategory</th>
                                        <th>Sub-Sub Category En</th>
                                        <th>Sub-Sub Category Tr</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subsubcategories as $val)
                                        <tr>
                                            <td>{{$val['category']['category_name_en']}} </td>
                                            <td>{{$val['subcategory']['subcategory_name_en']}} </td>
                                            <td>{{$val->subsubcategory_name_en}}</td>
                                            <td>{{$val->subsubcategory_name_tr}}</td>
                                            <td>
                                                <a href="{{url('/category/sub/sub/edit/'.$val->category_id."/".$val->id)}}"
                                                   class="btn btn-info" title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('backend.subsubcategory.delete',$val->id)}}"
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
                                                  action="{{route('backend.subsubcategory.store')}}">
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
                                                    <label for="subcategory_id">Sub Category Select<span
                                                            class="text-danger">*</span></label>
                                                    <select type="text" class="form-control  " name="subcategory_id"
                                                            id="subcategory_id">

                                                        <option value="" selected="" disabled> Select SubCategory
                                                        </option>

                                                    </select>
                                                    @error('subcategory_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="subsubcategory_name_en">Sub-Sub Category Name
                                                        English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="subsubcategory_name_en"
                                                           id="subcategory_name_en">
                                                    @error('subsubcategory_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="subsubcategory_name_tr">Sub-Sub Category Name
                                                        Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="subsubcategory_name_tr"
                                                           id="subsubcategory_name_tr">
                                                    @error('subsubcategory_name_tr')
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
@section('page-level-script')
    <script type="text/javascript">
        $(document).ready(function () {
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

