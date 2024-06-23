
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Sign In | Velzon - Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href=" {{ asset('default/assets/images/favicon.ico') }}">

    <script src=" {{ asset('default/assets/js/layout.js') }}"></script>
    <link href=" {{ asset('default/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('default/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('default/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('default/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="{{ route('login') }}" class="d-block">
                                                <img src="{{ asset('default/assets/images/logo-light.png') }}" alt="" height="18">
                                            </a>
                                        </div>
                                        <div class="mt-auto">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">Chào mừng bạn !</h5>
                                        <p class="text-muted">Velzon ứng dụng quản lý công việc.</p>
                                    </div>
                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required autofocus autocomplete="username" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    @if (Route::has('password.request'))
                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                            {{ __('Forgot your password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                                <label class="form-label" for="password-input">Password</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" class="form-control pe-5 password-input" id="password" name="password" placeholder="Enter password" required autocomplete="current-password">
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                                <label class="form-check-label" for="remember_me">Remember me</label>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">Sign In</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <div class="signin-other-title">
                                                    <h5 class="fs-13 mb-4 title">Đăng nhập</h5>
                                                </div>
                                                <div>
{{--                                                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>--}}
                                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
{{--                                                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>--}}
{{--                                                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>--}}
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Bạn đã có tài khoản chưa? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Đăng ký</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('default/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('default/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('default/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('default/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('default/assets/js/plugins.js') }}"></script>
<script src="{{ asset('default/assets/js/pages/password-addon.init.js') }}"></script>
</body>
</html>
