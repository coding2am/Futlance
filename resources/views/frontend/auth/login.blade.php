@extends('layouts.frontend_template')
@section('title', 'Login Page')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('my_assets/frontend/assets/img/login-banner.png') }}" class="img-fluid"
                                    alt="Doccure Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3><span class="text-muted">Futlance | </span> <span>Login</span></h3>
                                </div>
                                <div>
                                    <span class="text text-success">{!! session()->get('success') !!}</span>
                                </div>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input type="email"
                                            class="form-control floating @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="focus-label">Email</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password"
                                            class="form-control floating @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="focus-label">Password</label>
                                    </div>
                                    <div class="text-right">
                                        <a class="forgot-link" href="#">Forgot Password ?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                        {{ __('Login') }}</button>
                                    <div class="text-center dont-have">Don’t have an account? <a
                                            href="{{ route('user.create') }}">Register</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
