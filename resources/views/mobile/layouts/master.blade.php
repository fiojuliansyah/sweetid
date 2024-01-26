<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#2196f3">
    <meta name="author" content="DexignZone" />
    <meta name="keywords" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="SweetTroops - Baking Studio Apps" />
    <meta property="og:title" content="SweetTroops - Baking Studio Apps" />
    <meta property="og:description" content="SweetTroops - Baking Studio Apps" />
    <meta property="og:image" content="#" />
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}logo.png" />

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- PWA Version -->
    <link rel="manifest" href="manifest.json">

    <!-- Stylesheets -->
    <link rel="stylesheet"
        href="{{ asset('') }}mobile/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="{{ asset('') }}mobile/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;family=Roboto+Slab:wght@100;300;500;600;800&amp;display=swap"
        rel="stylesheet">

</head>

<body class="bg-white">
    <div class="page-wraper">

        <!-- Header -->
        @yield('header')
        <!-- Header End -->

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader end-->

        <!-- Sidebar -->
        @yield('sidebar')
        <!-- Sidebar End -->

        <!-- Banner -->
        @yield('content')
        <!-- Page Content End-->

        <!-- Menubar -->
        {{-- @include('mobile.layouts.part.menubar') --}}
        <!-- Menubar -->

        <!-- Theme Color Settings -->
        @yield('section')
        <!-- PWA Offcanvas End -->

    </div>
    <!--**********************************
    Scripts
***********************************-->
    <script src="{{ asset('') }}mobile/js/jquery.js"></script>
    <script src="{{ asset('') }}mobile/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}mobile/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
    <script src="{{ asset('') }}mobile/js/dz.carousel.js"></script><!-- Swiper -->
    <script src="{{ asset('') }}mobile/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script><!-- Swiper -->
    <script src="{{ asset('') }}mobile/js/settings.js"></script>
    <script src="{{ asset('') }}mobile/js/custom.js"></script>
    <script src="index.js" defer></script>
    <script>
        $(".stepper").TouchSpin();
    </script>
    @stack('pwa')
</body>

<!-- Mirrored from SweetTroops.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Apr 2023 02:51:27 GMT -->

</html>
