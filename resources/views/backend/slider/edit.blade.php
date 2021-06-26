@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- EDIT SLIDER ------------------  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.slider.update')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Slider Title English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="title"
                                                           id="title" value="{{$slider->title}}">
                                                    <input type="hidden" name="id" value="{{$slider->id}}">
                                                    @error('title')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="title_tr">Slider Title Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="title_tr"
                                                           id="title_tr" value="{{$slider->title_tr}}">
                                                    @error('title_tr')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="link">Slider Link<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="link"
                                                           id="link" value="{{$slider->link}}">
                                                    @error('link')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="title_color">Slider Name Color<span
                                                            class="text-danger">*</span></label>
                                                    <input type="color" class="form-control" name="title_color"
                                                           id="title_color" value="{{$slider->title_color}}">
                                                    @error('title_color')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Slider Description English<span
                                                            class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="description"
                                                              id="description">
                                                          {{$slider->description}}
                                                    </textarea>
                                                    @error('description')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label for="description_tr">Slider Description Türkçe<span
                                                                class="text-danger">*</span></label>
                                                        <textarea type="text" class="form-control" name="description_tr"
                                                                  id="description_tr">
                                                             {{$slider->description_tr}}
                                                        </textarea>
                                                        @error('description_tr')
                                                        <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Slider Image<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" name="image" id="image">
                                                         @error('image')
                                                        <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <img src="{{asset($slider->image)}}" width="250" alt="">
                                                        <input type="hidden" value="{{($slider->image)}}"
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


                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
