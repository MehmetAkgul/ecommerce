@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {{--                --------------- ALL Division LİST ------------------                  --}}
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Division List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name </th>

                                        <th style="min-width: 100px;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($divisions as $val)
                                        <tr>
                                            <td> {{$val->division_name}}   </td>

                                            <td>
                                                <a href="{{route('backend.shipping.division.edit',$val->id)}}"
                                                   class="btn btn-info btn-sm " title="Edit Data"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('backend.shipping.division.delete',$val->id)}}"
                                                   class="btn btn-danger btn-sm " id="delete" title="Delete Data"><i
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
                {{--                --------------- ALL division LİST ------------------                  --}}

                {{--                --------------- ADD NEW division  ------------------                  --}}
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Division</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST"
                                                  enctype="multipart/form-data"
                                                  action="{{route('backend.shipping.division.store')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="division_name">Division Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="division_name"
                                                           id="division_name">
                                                    @error('division_name')
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
            {{--                --------------- ADD NEW division  ------------------                  --}}

            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection()
