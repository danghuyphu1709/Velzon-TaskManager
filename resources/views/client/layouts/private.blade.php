<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Velzon - TaskManage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('default/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('default/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('default/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('default/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('default/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('default/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <lord-icon class="avatar-xl" src="https://cdn.lordicon.com/etwtznjn.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c"></lord-icon>
                                <h1 class="text-primary mb-4">Error !</h1>
                                <h4 class="text-uppercase">Có lỗi sảy ra 😭</h4>
                                <p class="text-muted mb-4">Xin lỗi, không gian này đang trong trạng thái bảo mật!</p>
                                <a href=" {{ route('home') }}" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Back to home</a>
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
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{ asset('default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('default/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('default/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('default/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('default/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('default/assets/js/plugins.js') }}"></script>

</body>

</html>