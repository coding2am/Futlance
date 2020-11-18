@extends('layouts.frontend_template')
@section('title', 'Register Page')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Register Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('my_assets/frontend/assets/futlance_design/3.svg') }}" class="img-fluid"
                                    alt="Doccure Register">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3><span class="text-muted">Futlance | </span>User Register <a
                                            href="{{ route('user.owner_register') }}">Are you a Owner?</a>
                                    </h3>
                                </div>

                                <!-- Register Form -->
                                <form action="{{ route('user.store') }}" method="post">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input type="text" name="name" class="form-control floating"
                                            value="{{ old('name') }}">
                                        <label class="focus-label">Name</label>
                                        @error('name')
                                            <span class="text text-danger my-1">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="text" name="phone" class="form-control floating"
                                            value="{{ old('phone') }}">
                                        <label class="focus-label">Mobile Number</label>
                                        @error('phone')
                                            <span class="text text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="email" name="email" class="form-control floating"
                                            value="{{ old('email') }}">
                                        <label class="focus-label">E-mail</label>
                                        @error('email')
                                            <span class="text text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="text" name="address" class="form-control floating"
                                            value="{{ old('address') }}">
                                        <label class="focus-label">Address</label>
                                        @error('address')
                                            <span class="text text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" id="password" name="password" class="form-control floating">
                                        <label class="focus-label">Create Password</label>
                                        @error('password')
                                            <span class="text text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" id="cpassword" name="cpassword"
                                            class="form-control floating">
                                        <label class="focus-label">Confirm Password</label>
                                        <span id="cerror"></span>
                                        <span class="text text-danger">{!! session()->get('error') !!}</span>
                                    </div>
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{ route('user.signin') }}">Already have an
                                            account?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Register Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
@section('script')
    <script>
        //password validate
        $("#password, #cpassword").on("keyup", function() {
            if ($("#password").val() == $("#cpassword").val()) {
                $("#cerror").html("Match").css("color", "green");
            } else
                $("#cerror").html("Not Match").css("color", "red");
        });

    </script>
@endsection
