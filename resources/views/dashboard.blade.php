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
                        <a href="{{route('user.password.edit')}}" class="btn btn-sm btn-block btn-primary">Change Password </a>
                        <a href="{{route('user.logout')}}" class="btn btn-sm btn-block btn-danger">Logout </a>
                    </ul>


                </div>


                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <h3 class="text-center">
                <span class="text-danger">
                    Hi..
                </span>
                        <strong>{{Auth::user()->name}} </strong>
                        Welcome to Ecommerce Online Shop
                    </h3>
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.body-content -->



@endsection()
