<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Sign Up | Velzon - Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('default/assets/images/favicon.ico') }}">
    <script src="{{ asset('default/assets/js/layout.js') }}"></script>
    <link href="{{ asset('default/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('default/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('default/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('default/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden m-0">
                        <div class="row justify-content-center g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="{{ route('register') }}" class="d-block">
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
                                        <h5 class="text-primary"> Đăng ký tài khoản </h5>
                                        <p class="text-muted"> Đăng ký tài khoản Velzon miễn phí ngay bây giờ.</p>
                                    </div>
                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                                @if ($errors->has('name'))
                                                    <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>

                                            <div class="mt-4 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                                                @if ($errors->has('email'))
                                                    <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>

                                            <div class="mt-4 mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                                                @if ($errors->has('password'))
                                                    <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>

                                            <div class="mt-4 mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                                                @if ($errors->has('password_confirmation'))
                                                    <div class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</div>
                                                @endif
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <button class="btn btn-success ms-4">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <div class="signin-other-title">
                                                    <h5 class="fs-13 mb-4 title">Đăng ký</h5>
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
                                        <p class="mb-0">Bạn đã đăng ký thành công? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Đăng nhập</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
    <!-- footer -->
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src=" {{ asset('default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ asset('default/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src=" {{ asset('default/assets/libs/node-waves/waves.min.js') }}"></script>
<script src=" {{ asset('default/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src=" {{ asset('default/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src=" {{ asset('default/assets/js/plugins.js') }}"></script>
<script src=" {{ asset('default/assets/js/pages/form-validation.init.js') }}"></script>
<script src=" {{ asset('default/assets/js/pages/password-create.init.js') }}"></script>
</body>
</html>
