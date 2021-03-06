@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ADD NEW PRODUCT  ------------------                  --}}
                <div class="col-md-12">
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
                                                  action="{{route('backend.product.store')}}">
                                                @csrf
                                                {{-- ****************************** 0. SIRA  0 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="control">
                                                                <fieldset>
                                                                    <input type="checkbox" id="new" value="1"
                                                                           name="new">
                                                                    <label for="new">New </label>
                                                                </fieldset>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="control">
                                                                <fieldset>
                                                                    <input type="checkbox" id="hot_deals" value="1"
                                                                           name="hot_deals">
                                                                    <label for="hot_deals">Hot Deals </label>
                                                                </fieldset>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="control">
                                                                <fieldset>
                                                                    <input type="checkbox" id="featured" name="featured"
                                                                           value="1">
                                                                    <label for="featured"> Featured </label>
                                                                </fieldset>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="control">
                                                                <fieldset>
                                                                    <input type="checkbox" id="special_offer"
                                                                           name="special_offer" value="1">
                                                                    <label for="special_offer">Special Offer </label>
                                                                </fieldset>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="control">
                                                                <fieldset>
                                                                    <input type="checkbox" id="special_deals"
                                                                           name="special_deals" value="1">
                                                                    <label for="special_deals"> Special Deals </label>
                                                                </fieldset>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                {{-- ****************************** 0. SIRA  0 ROW END************************** --}}
                                                {{-- ****************************** 1. SIRA  1 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="brand_id">Brand Select<span
                                                                    class="text-danger">*</span></label>
                                                            <select type="text" class="form-control" required=""
                                                                    name="brand_id"
                                                                    id="brand_id">

                                                                <option value="" disabled="" selected=""> Se??iniz </option>

                                                                @foreach($brands as $val)
                                                                    <option value="{{$val->id}}">
                                                                        {{$val->brand_name_en}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('brand_id')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="category_id">Category Select<span
                                                                    class="text-danger">*</span></label>
                                                            <select type="text" required="" class="form-control  "
                                                                    name="category_id"
                                                                    id="category_id">
                                                                <option value="" disabled="" selected=""> Se??iniz </option>
                                                            @foreach($cats as $val)
                                                                    <option value="{{$val->id}}">
                                                                        {{$val->category_name_en}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="subcategory_id">Sub Category Select<span
                                                                    class="text-danger">*</span></label>
                                                            <select type="text" required="" class="form-control  "
                                                                    name="subcategory_id"
                                                                    id="subcategory_id">
                                                                <option value="" disabled="" selected="">
                                                                    Plase Category
                                                                </option>
                                                            </select>
                                                            @error('subcategory_id')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- ****************************** 1. SIRA  1 ROW END************************** --}}

                                                {{-- ****************************** 2. SIRA  2 ROW START ************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="subsubcategory_id">Sub-SubCategory Select<span
                                                                    class="text-danger">*</span></label>
                                                            <select type="text" required="" class="form-control"
                                                                    name="subsubcategory_id"
                                                                    id="subsubcategory_id">

                                                                <option value="" disabled="" selected="">
                                                                    Plase Sub Category
                                                                </option>

                                                            </select>
                                                            @error('subsubcategory_id')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="product_name_en">Prodcut Name English<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" required="" class="form-control"
                                                                   name="product_name_en"
                                                                   id="product_name_en">
                                                            @error('product_name_en')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="product_name_tr">Prodcut Name T??rk??e<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" required="" class="form-control"
                                                                   name="product_name_tr"
                                                                   id="product_name_tr">
                                                            @error('product_name_tr')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- ****************************** 2. SIRA  2 ROW END ************************** --}}
                                                <hr>
                                                {{-- ****************************** 3. SIRA  3 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="product_code">Prodcut Code<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" required="" class="form-control"
                                                                       name="product_code"
                                                                       id="product_code">
                                                                @error('product_code')
                                                                <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="product_qty">Prodcut Quantity<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" required="" class="form-control"
                                                                       name="product_qty"
                                                                       id="product_qty">
                                                                @error('product_qty')
                                                                <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="selling_price">Prodcut Selling Price<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" required="" name="selling_price"
                                                                       id="selling_price" class="form-control"
                                                                       placeholder="Selling Price"/>
                                                                @error('selling_price')
                                                                <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="discount_price">Prodcut Discount Price<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="discount_price"
                                                                   id="discount_price"
                                                                   class="form-control" placeholder="Discount Price"/>
                                                            @error('discount_price')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="card">
                                                                <img src=""
                                                                     class="card-img-top" style="width: 150px;"
                                                                     id="mainThumbnail">
                                                                <div class="card-body">
                                                                    <p class="card-text">
                                                                    <div class="form-group">
                                                                        <label for="product_thumbnail"
                                                                               class="form-control-label">
                                                                            <span class="text-danger">* </span>
                                                                            Product Thumbnail
                                                                        </label>
                                                                        <input type="file" class="form-control"
                                                                               name="product_thumbnail"
                                                                               onChange="mainThumbnailUrl(this)">

                                                                    </div>

                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- ****************************** 3. SIRA  3 ROW  END************************** --}}
                                                <hr>
                                                {{-- ****************************** 4. SIRA  4 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="multi_img">Prodcut Multi Image<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="file" name="multi_img[]" multiple=""
                                                                   required=""
                                                                   id="multi_img" class="form-control"/>
                                                            @error('multi_img')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                            <div class="row" id="preview_multi_img">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                {{-- ****************************** 4. SIRA  4 ROW  END************************** --}}

                                                <hr>
                                                {{-- ****************************** 5. SIRA  5 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-3">
                                                        <label for="product_tags_en">Prodcut Tags English <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" required="" name="product_tags_en"
                                                               id="product_tags_en"
                                                               value="Lorem,Ipsum,Amet"
                                                               data-role="tagsinput" placeholder="add tags"/>
                                                        @error('product_tags_en')
                                                        <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="product_tags_tr">Prodcut Tags T??rk??e<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" required="" name="product_tags_tr"
                                                               id="product_tags_tr"
                                                               value="Lorem,Ipsum,Amet"
                                                               data-role="tagsinput" placeholder="add tags"/>
                                                        @error('product_tags_tr')
                                                        <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="product_size_en">Prodcut Size English<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" required="" name="product_size_en"
                                                                   id="product_size_en"
                                                                   value="Small,Medium,Large"
                                                                   data-role="tagsinput" placeholder="add tags"/>
                                                            @error('product_size_en')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="product_size_tr">Prodcut Size T??rk??e<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" required="" name="product_size_tr"
                                                                   id="product_size_tr"
                                                                   value="Dar,Orta,Geni??"
                                                                   data-role="tagsinput" placeholder="add tags"/>
                                                            @error('product_size_tr')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                {{-- ****************************** 5. SIRA  5 ROW  END************************** --}}

                                                {{-- ****************************** 6. SIRA  6 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-6">
                                                        <label for="product_color_en">Prodcut Color English<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" required="" name="product_color_en"
                                                               id="product_color_en"
                                                               value="Yellow,Black,Rose,Dark Blue"
                                                               data-role="tagsinput" placeholder="add tags"/>
                                                        @error('product_color_en')
                                                        <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="product_color_tr">Prodcut Color T??rk??e<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" required="" name="product_color_tr"
                                                                   id="product_color_tr"
                                                                   value="Sar??,Siyah,G??l Rengi,Koyu Siyah"
                                                                   data-role="tagsinput" placeholder="add tags"/>
                                                            @error('product_color_tr')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                {{-- ****************************** 6. SIRA  6 ROW  END************************** --}}


                                                {{-- ****************************** 7. SIRA  7 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-6">
                                                        <label for="short_description_en">Short Description
                                                            English<span
                                                                class="text-danger">*</span></label>
                                                        <textarea type="text" required="" name="short_description_en"
                                                                  id="short_description_en" rows="4"
                                                                  class="form-control"> </textarea>
                                                        @error('short_description_en')
                                                        <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="short_description_tr">Short Description
                                                                T??rk??e<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text" required=""
                                                                      name="short_description_tr"
                                                                      id="short_description_tr" rows="4"
                                                                      class="form-control"> </textarea>
                                                            @error('short_description_tr')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                {{-- ****************************** 7. SIRA  7 ROW  END************************** --}}

                                                {{-- ****************************** 8. SIRA  8 ROW START************************** --}}
                                                <div class="row  ">
                                                    <div class="col-md-6">
                                                        <label for="short_description_en">Long Description
                                                            English<span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="long_description_en" required=""
                                                                  id="long_description_en" rows="10">
                                                        Long Description English
                                                        </textarea>
                                                        @error('long_description_en')
                                                        <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="short_description_tr">Long Description
                                                                T??rk??e<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="long_description_tr" required=""
                                                                      id="long_description_tr" rows="10">
                                                            Long Description T??rk??e
                                                            </textarea>
                                                            @error('long_description_tr')
                                                            <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                {{-- ****************************** 7. SIRA  7 ROW  END************************** --}}


                                                <div class="form-group">
                                                    <button class="btn btn-rounded btn-info float-right"
                                                            type="submit">
                                                        Save Product
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
    <script src="{{asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
    <script src="{{asset('backend/js/pages/editor.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                let category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{url('/category/subcategory/ajax')}}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subsubcategory_id"]').html('');
                            let d = $('select[name="subcategory_id"]').empty();
                            $('select[name="subcategory_id"]').append('<option value="">Se??iniz</option>');
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


            $('select[name="subcategory_id"]').on('change', function () {
                let subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{url('/category/subsubcategory/ajax')}}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            let d = $('select[name="subsubcategory_id"]').empty();
                            $('select[name="subsubcategory_id"]').append('<option value="">Se??iniz</option>');

                            $.each(data, function (key, value) {
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>


    <script type="text/javascript">
        function mainThumbnailUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThumbnail').attr('src', e.target.result).width(150)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    preview_multi_img
    <script type="text/javascript">
        $(document).ready(function () {
            $('#multi_img').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supporter
                {
                    let data = $(this)[0].files;//this file data
                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file
                            let fRead = new FileReader();
                            fRead.onload = (function (file) {//trigger function on successful read
                                return function (e) {
                                    let img = $('<img/>').addClass('thumb mr-2').attr('src', e.target.result).width(80).height(80); //create image element
                                    $('#preview_multi_img').append(img);//append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file);//url representing the file's data
                        }
                    });
                } else {
                    alert("your Browser Does'nt support File API!");
                }
            });
        });
    </script>

@endsection()

