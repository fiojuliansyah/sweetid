<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from SweetTroops.dexignzone.com/xhtml/onboading.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Apr 2023 02:51:41 GMT -->

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

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}mobile/images/favicon.png" />

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('') }}mobile/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/css/style.css">

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
    <script>
        new WOW().init();

        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 50, // distance to the element when triggering the animation (default is 0)
            mobile: false // trigger animations on mobile devices (true is default)
        });
        wow.init();
    </script>
</body>

<!-- Mirrored from SweetTroops.dexignzone.com/xhtml/onboading.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Apr 2023 02:51:44 GMT -->

</html>
