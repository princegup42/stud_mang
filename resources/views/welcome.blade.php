<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    @include('incld.header')

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 p-5">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs text-center justify-content-center" id="custom-tabs-three-tab"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                    href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                    aria-selected="true">Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-three-profile" role="tab"
                                    aria-controls="custom-tabs-three-profile" aria-selected="false">Professional</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                                aria-labelledby="custom-tabs-three-home-tab">
                                <div class="justify-content-center ">
                                    <div class="login-logo text-center">
                                        <p class="text-center"><b>Student </b>Login</p>
                                    </div>
                                    <!-- /.login-logo -->
                                    <div class="card">
                                        <div class="card-body login-card-body">
                                            <p class="login-box-msg">Sign in to start your session</p>

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus placeholder="Email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="Password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" name="remember" id="remember"
                                                                {{ old('remember') ? 'checked' : '' }}>
                                                            <label for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-4">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </form>

                                            <div class="social-auth-links text-center mb-3">
                                                <p>- OR -</p>
                                                <a href="#" class="btn btn-block btn-primary">
                                                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                                                </a>
                                                <a href="#" class="btn btn-block btn-danger">
                                                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                                                </a>
                                            </div>
                                            <!-- /.social-auth-links -->

                                            @if (Route::has('password.request'))
                                            <p class="mb-1">
                                                <a href="{{ route('password.request') }}">I forgot my password</a>
                                            </p>
                                            @endif
                                            <p class="mb-0">
                                                <a href="{{ route('register') }}" class="text-center">Register a new
                                                    membership</a>
                                            </p>
                                        </div>
                                        <!-- /.login-card-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="justify-content-center ">
                                    <div class="login-logo text-center">
                                        <p class="text-center"><b>Professional </b>Login</p>
                                    </div>
                                    <!-- /.login-logo -->
                                    <div class="card">
                                        <div class="card-body login-card-body">
                                            <p class="login-box-msg">Sign in to start your session</p>

                                            <form method="POST" action="{{ route('pro.login') }}">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus placeholder="Email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="Password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" name="remember" id="remember"
                                                                {{ old('remember') ? 'checked' : '' }}>
                                                            <label for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-4">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </form>

                                            <div class="social-auth-links text-center mb-3">
                                                <p>- OR -</p>
                                                <a href="#" class="btn btn-block btn-primary">
                                                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                                                </a>
                                                <a href="#" class="btn btn-block btn-danger">
                                                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                                                </a>
                                            </div>
                                            <!-- /.social-auth-links -->

                                            @if (Route::has('password.request'))
                                            <p class="mb-1">
                                                <a href="{{ route('password.request') }}">I forgot my password</a>
                                            </p>
                                            @endif
                                            <p class="mb-0">
                                                <a href="{{ route('pro.register') }}" class="text-center">Register a new
                                                    membership</a>
                                            </p>
                                        </div>
                                        <!-- /.login-card-body -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    @include('incld.footer')
</body>

</html>
