@extends('frontend.main_master')

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-12 col-sm-12 sign-in">
                        <h4 class="">Forgot Password (Reset Password)</h4>
                        <p class="alert-success alert ">Please set your new password.</p>

                        <form class="register-form outer-top-xs" role="form" method="POST"
                              action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" value="{{ $request->email}}" class="form-control unicase-form-control text-input"
                                       id="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Password <span>*</span></label>
                                <input type="password"  autofocus name="password_confirmation" class="form-control unicase-form-control text-input"
                                       id="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Confirm Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                       id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>


                            <a href="{{route('login')}}" class="forgot-password pull-right">Login / Register</a>

                        </form>


                    </div>
                    <!-- Sign-in -->

                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->



@endsection()

