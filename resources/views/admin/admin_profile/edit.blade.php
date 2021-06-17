@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form enctype="multipart/form-data" method="post" action="{{route('admin.profile.update')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required
                                                           value="{{$adminData->name}}"
                                                           data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required
                                                           value="{{$adminData->email}}"
                                                           data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 row ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Profile Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" id="image" class="form-control"
                                                           required></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="widget-user-image">
                                                    <img class="rounded-circle" id="showImage" style="width: 100px; height: 100px;"
                                                         src="{{!empty($adminData->profile_photo_path) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg')}}"
                                                         alt="User Avatar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 row ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-info">Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

        <!-- /.content -->
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection()
