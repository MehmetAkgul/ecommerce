@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- EDIT district ------------------  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit District</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.shipping.district.update')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="division_id">Division Name <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="division_id"
                                                            id="division_id">
                                                        @foreach($divisions as $value)
                                                            <option value="{{$value->id}}"
                                                                {{$value->id==$district->division_id ? 'selected': ''}}>
                                                                {{$value->division_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('division_id')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="district_name">District Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="district_name"
                                                           id="district_name" value="{{$district->district_name}}">
                                                    @error('district_name')
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


                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
