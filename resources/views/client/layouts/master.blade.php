<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('default/assets/images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('default/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('default/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

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
    <link href="{{ asset('default/vendor/config.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

@include('client.layouts.header')
<body>
<main id="main" class="main">
    @yield('sidebar')

    @yield('content')

    @yield('modal')

    @include('client.layouts.footer')
</main>
<!-- JAVASCRIPT -->
<script src=" {{ asset('default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ asset('default/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src=" {{ asset('default/assets/libs/node-waves/waves.min.js') }}"></script>
<script src=" {{ asset('default/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src=" {{ asset('default/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src=" {{ asset('default/assets/js/plugins.js') }}"></script>

<!-- apexcharts -->
<script src=" {{ asset('default/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->
<script src=" {{ asset('default/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src=" {{ asset('default/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!--Swiper slider js-->
<script src=" {{ asset('default/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- Dashboard init -->
<script src=" {{ asset('default/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

<!-- App js -->
<script src=" {{ asset('default/assets/js/app.js') }}"></script>

<script src=" {{ asset('default/vendor/jquery/jquery.main.js')}}"></script>

@yield('js')
</body>

</html>
