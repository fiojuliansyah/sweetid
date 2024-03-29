<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
    @yield('refresh')
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#2196f3">
    <meta name="author" content="Sweettroops" />
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

    @yield('css')

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}logo.png" />

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('') }}mobile/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/css/style.css">
    @yield('sticky')

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;family=Roboto+Slab:wght@100;300;500;600;800&amp;display=swap"
        rel="stylesheet">

    <!-- Animte -->
    <link rel="stylesheet" href="{{ asset('') }}mobile/vendor/wow/css/libs/animate.css">

</head>

<body class="bg-white">

    @yield('navbar')

    @yield('content')
    <!--**********************************
    Scripts
***********************************-->
    <script src="{{ asset('') }}mobile/js/jquery.js"></script>
    <script src="{{ asset('') }}mobile/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}mobile/js/dz.carousel.js"></script><!-- Swiper -->
    <script src="{{ asset('') }}mobile/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
    <script src="{{ asset('') }}mobile/vendor/wow/dist/wow.min.js"></script>
    <script src="{{ asset('') }}mobile/js/settings.js"></script>
    <script src="{{ asset('') }}mobile/js/custom.js"></script>
    @yield('footer')
    @stack('pwa')
</body>
</html>
