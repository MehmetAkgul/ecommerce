@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- EDIT SUB SUBCATEGORY ------------------  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Sub-Sub Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.subsubcategory.update')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$subsubcategory->id}}">

                                                <div class="form-group">
                                                    <label for="category_id">Category Select<span
                                                            class="text-danger">*</span></label>
                                                    <select type="text" class="form-control" name="category_id"
                                                            id="category_id">
                                                        @foreach($cats as $val)
                                                            <option value="{{$val->id}}"
                                                                {{$val->id==$subsubcategory->category_id?'selected':''}}>
                                                                {{$val->category_name_en}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subsubcategory_icon')
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

                                                        @foreach($subcategories as $val)
                                                            <option value="{{$val->id}}"
                                                                {{$val->id==$subsubcategory->subcategory_id?'selected':''}}>
                                                                {{$val->subcategory_name_en}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="subsubcategory_name_en">Sub-Sub Category Name English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="subsubcategory_name_en"
                                                           id="subsubcategory_name_en"
                                                           value="{{$subsubcategory->subsubcategory_name_en}}">
                                                    @error('subsubcategory_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="subsubcategory_name_tr">Sub-SubCategory Name Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="subsubcategory_name_tr"
                                                           id="subsubcategory_name_tr"
                                                           value="{{$subsubcategory->subsubcategory_name_tr}}">
                                                    @error('subsubcategory_name_tr')
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
