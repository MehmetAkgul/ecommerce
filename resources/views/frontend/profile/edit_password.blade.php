@extends('frontend.main_master')

@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 ">
                    <br>
                    <img
                        src="{{ $user->profile_photo_path? asset($user->profile_photo_path) :url('upload/no_image.jpg')   }}"
                        alt="{{ Auth::user()->name }}" style="border-radius: 50%" height="100%" width="100%"
                        class="rounded-full h-20 w-20 object-cover">
                    <br>
                    <br>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-sm btn-block btn-primary">Home </a>
                        <a href="{{route('user.profile')}}" class="btn btn-sm btn-block btn-primary">Profile </a>
                        <a href="{{route('user.password.edit')}}" class="btn btn-sm btn-block btn-primary">Change
                            Password </a>
                        <a href="{{route('user.logout')}}" class="btn btn-sm btn-block btn-danger">Logout </a>
                    </ul>


                </div>


                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <h3 class="text-center">
                        <strong> CHANGE PASSWORD </strong>

                    </h3>
                    <div class="card border border-primary">

                        <div class="card-body">
                            <form class="register-form outer-top-xs" role="form" method="POST"
                                  enctype="multipart/form-data"
                                  action="{{route('user.password.update')}}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Current Password </label>
                                    <input type="password" name="current_password"
                                           class="form-control unicase-form-control text-input"
                                    >
                                    @error('current_password')
                                    <div class="alert-danger alert" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title">New Password </label>
                                    <input type="password" name="password"
                                           class="form-control unicase-form-control text-input">
                                    @error('password')
                                    <div class="alert-danger alert" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Confirm Password </label>
                                    <input type="password" name="password_confirmation"
                                           class="form-control unicase-form-control text-input">
                                    @error('password_confirmation')
                                    <div class="alert-danger alert" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn-upper btn btn-danger float-right">Update
                                </button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.body-content -->



@endsection()
