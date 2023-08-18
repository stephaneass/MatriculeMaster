<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 16:37:56 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Dashboard | Matricule Master</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Matricule Master University School Education" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

    <!-- jsvectormap css -->
    <link href="{{asset('admin/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{asset('admin/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{asset('admin/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('admin/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    
    @livewireStyles
    @stack('styles')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('partials._navbar')

        @include('partials._sidebar')
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('partials.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('admin/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('admin/js/plugins.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Vector map-->
    <script src="{{asset('admin/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
    <script src="{{asset('admin/libs/jsvectormap/maps/world-merc.js')}}"></script>

    <!--Swiper slider js-->
    <script src="{{asset('admin/libs/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Dashboard init -->
    <script src="{{asset('admin/js/pages/dashboard-ecommerce.init.js')}}"></script>
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    @livewireScripts
    <!-- App js -->
    <script src="{{asset('admin/js/app.js')}}"></script>
    @stack('scripts')
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 16:39:49 GMT -->
</html>