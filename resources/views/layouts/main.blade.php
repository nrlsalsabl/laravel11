<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('admin/css/core/libs.min.css') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/aos/dist/aos.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/hope-ui.min.css?v=2.0.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.min.css?v=2.0.0') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/customstyle.css') }}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/dark.min.css') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/customizer.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/fontawesome/css/all.css') }}">

    <!-- Flatpickr css -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/flatpickr/dist/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/sweetalert2/sweetalert2.css') }}">

    @yield('css') <!-- Placeholder for additional CSS -->


</head>

<body class="  ">
    <!-- loader Start -->
    {{-- <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div> --}}
    <!-- loader END -->

    @include('layouts.sidebar')

    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('layouts.navbar')

            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0 ">
            <div class="py-5"></div>
            @include('sweetalert::alert')
            @yield('content')
        </div>

    </main>
    <br>

    <!-- Wrapper End-->

    <!-- Core Library -->
    @stack('scripts')

    <script src="{{ asset('admin/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('admin/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('admin/js/charts/widgetcharts.js') }}"></script>

    <!-- Mapchart Script -->
    <script src="{{ asset('admin/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('admin/js/charts/dashboard.js') }}"></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('admin/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('admin/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('admin/js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('admin/js/plugins/form-wizard.js') }}"></script>

    <!-- AOS Animation Plugin -->
    <script src="{{ asset('admin/vendor/aos/dist/aos.js') }}"></script>


    <!-- Flatpickr Script -->
    <script src="{{ asset('admin/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flatpickr.js') }}" defer></script>
    <script src="{{ asset('admin/select2/js/select2.js') }}" defer></script>
    <script src="{{ asset('admin/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admin/js/fungsi.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('admin/js/hope-ui.js') }}" defer></script>
    <script src="{{ asset('admin/fontawesome/js/all.js') }}"></script>

    <!-- Flatpickr Script -->
    <script src="{{ asset('admin/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @stack('script')

</body>

</html>
