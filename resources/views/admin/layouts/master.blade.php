<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template">
    <meta property="og:title" content="Dompet : Payment Admin Template">
    <meta property="og:description" content="Dompet : Payment Admin Template">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>@yield('title')</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('/') }}admin/images/favicon.png">
    @yield('css')
    <link href="{{ asset('/') }}admin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}admin/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}admin/vendor/nouislider/nouislider.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Style css -->
    <link href="{{ asset('/') }}admin/css/style.css" rel="stylesheet">
    @livewireStyles

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">S</span>
            <span style="--i:2">W</span>
            <span style="--i:3">E</span>
            <span style="--i:4">E</span>
            <span style="--i:5">T</span>
            <span style="--i:6">T</span>
            <span style="--i:7">R</span>
            <span style="--i:8">O</span>
            <span style="--i:9">O</span>
            <span style="--i:10">P</span>
            <span style="--i:11">S</span>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <svg class="logo-abbr" width="800px" height="800px" viewBox="0 0 32 32" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <path class="svg-title-path"
                        d="M25.5 9c-0.295 0-0.58 0.037-0.857 0.097-0.123-1.821-1.624-3.264-3.476-3.264-0.415 0-0.808 0.085-1.177 0.218-1.15-1.828-3.172-3.051-5.49-3.051-3.522 0-6.373 2.807-6.48 6.303-0.469-0.193-0.981-0.303-1.52-0.303-2.209 0-4 1.791-4 4 0 2.152 1.703 3.894 3.833 3.982l1.604-1.604 1.622 1.622h0.758l1.621-1.622 1.621 1.622h0.758l1.621-1.622 1.621 1.622h0.758l1.621-1.622 1.621 1.622h0.758l1.621-1.622 1.616 1.616c2.183-0.029 3.946-1.803 3.946-3.994 0-2.209-1.791-4-4-4zM24 16.566l-1.434 1.434h-1.258l-1.371-1.371-1.371 1.371h-1.258l-1.371-1.371-1.371 1.371h-1.258l-1.371-1.371-1.371 1.371h-1.257l-1.371-1.371-1.372 1.371h-0.066l2.65 11h13.625l2.725-11h-0.066l-1.434-1.434zM11.5 28l-2.083-9h1l2.083 9h-1zM13.5 28l-1.062-9h1l1.062 9h-1zM16.5 28h-1v-9h1v9zM17.5 28l1.062-9h1l-1.062 9h-1zM20.5 28h-1l2.062-9h1l-2.062 9z">
                    </path>
                </svg>
                <svg class="brand-title" height="30" width="200">
                    <text x="0" y="30">SWEET</text>
                </svg>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.layouts.part.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.layouts.part.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">

            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://sweettroops.com/"
                        target="_blank">SweetTroops Baking Studio</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->




    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    @livewireScripts
    <script src="{{ asset('/') }}admin/vendor/global/global.min.js"></script>
    <script src="v{{ asset('/') }}admin/endor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('/') }}admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('/') }}admin/vendor/apexchart/apexchart.js"></script>
    <script src="{{ asset('/') }}admin/vendor/nouislider/nouislider.min.js"></script>
    <script src="{{ asset('/') }}admin/vendor/wnumb/wNumb.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('/') }}admin/js/dashboard/dashboard-1.js"></script>

    <script src="{{ asset('/') }}admin/js/custom.min.js"></script>
    <script src="{{ asset('/') }}admin/js/dlabnav-init.js"></script>
    <script src="{{ asset('/') }}admin/js/demo.js"></script>
    <script src="{{ asset('/') }}admin/js/styleSwitcher.js"></script>
    @yield('footer')
    <script src="{{ asset('/') }}admin/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('/') }}admin/js/plugins-init/sweetalert.init.js"></script>

</body>

</html>
