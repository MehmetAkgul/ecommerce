@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ALL SLIDER LİST ------------------                  --}}
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
                                        <th>Image</th>
                                        <th>Title En</th>
                                        <th>Title Tr</th>
                                        <th>Status</th>
                                        <th style="min-width: 100px;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $val)
                                        <tr>
                                            <td><img src="{{asset($val->image)}}" width="80px" alt=""></td>

                                            <td>
                                                @if($val->title===null)
                                                    <span class="badge badge-pill badge-danger">No Title En</span>
                                                @else
                                                    <span  style="color:{{$val->title_color}} ">{{$val->title}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($val->title_tr===null)
                                                    <span class="badge badge-pill badge-danger">No Title Tr</span>
                                                @else
                                                    <span  style="color:{{$val->title_color}} ">{{$val->title_tr}}</span>
                                                @endif
                                            </td>


                                            <td>
                                                @if($val->status===1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-warning">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('backend.slider.edit',$val->id)}}"
                                                   class="btn btn-info btn-sm " title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('backend.slider.delete',$val->id)}}"
                                                   class="btn btn-danger btn-sm " id="delete" title="Delete Data"><i
                                                        class="fa fa-trash"></i></a>
                                                @if($val->status===1)
                                                    <a href="{{route('backend.slider.inactive',$val->id)}}"
                                                       class="btn btn-warning btn-sm   " id="status" title="InActive Now"><i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{route('backend.slider.active',$val->id)}}"
                                                       class="btn btn-success btn-sm   " id="status" title="Active Now"><i
                                                            class="fa fa-arrow-up"></i></a>
                                                @endif
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
                {{--                --------------- ALL SLIDER LİST ------------------                  --}}

                {{--                --------------- ADD NEW SLIDER  ------------------                  --}}
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.slider.store')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Slider Name English<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="title"
                                                           id="title">
                                                    @error('title')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="title_tr">Slider Name Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="title_tr"
                                                           id="title_tr">
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
                                                           id="link">
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
                                                           id="title_color" value="#FFFFFF">
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
                                                              id="description"></textarea>
                                                    @error('description')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                <div class="form-group">
                                                    <label for="description_tr">Slider Description Türkçe<span
                                                            class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control" name="description_tr"
                                                              id="description_tr"></textarea>
                                                    @error('description_tr')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Slider Image<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" name="image"
                                                           id="image">
                                                    @error('image')
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
            {{--                --------------- ADD NEW SLIDER  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
