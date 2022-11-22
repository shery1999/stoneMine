<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('titles')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('./plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('./plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet') }}">

    <style>
        .error {
            color: red;
            font-style: italic;
            font-weight: bolder;
        }

        body {

            zoom: 70%;
        }

        img {
            vertical-align: middle;
            border-style: none;
            width: 14.4rem;
        }

        .card-title {
            margin-bottom: 1.1rem;
        }

        label {
            margin-bottom: 0.5rem;
            display: flex;
        }

        input[type="radio"],
        input[type="checkbox"] {
            box-sizing: border-box;
            padding: 1rem;
            width: 1rem;
        }

        @media only screen and (max-width: 768px) {
            .nav-header .brand-logo a {
                padding: 1.1rem 0.15rem;
                display: block;
            }
        }

        .nav-header .brand-logo a b img {
            max-width: 3.5625rem;
        }

        @media only screen and (min-width: 768px) {
            .nav-header .brand-logo a {
                padding: 1.5rem 0.15rem !important;
                display: block;
            }

            [data-sidebar-style="mini"] .nav-header .brand-logo a b img {
                margin-top: 0.1rem !important;
            }

            [data-sidebar-style="mini"] .nav-header .brand-logo a {
                padding: 1.2rem 0.25rem;
            }

        }

        .nav-header .brand-logo a {
            padding: 1.1rem 0.15rem !important;
            display: block;
        }
    </style>
    @stack('my-styles')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        {{-- header --}}
        @include('.common.header')

        {{-- navbar.php  --}}
        @include('common.navbar')

        {{-- side barrr --}}
        @include('common.sidebar')

        <div class="content-body">
            {{-- page content goes here --}}
            @yield('content')

        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <script src="{{ asset('plugins/common/common.min.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/settings.js') }}"></script>
        <script src="{{ asset('js/gleek.js') }}"></script>
        <script src="{{ asset('js/styleSwitcher.js') }}"></script>

        <!-- Chartjs -->
        <script src="{{ asset('./plugins/chart.js/Chart.bundle.min.js') }}"></script>
        <!-- Circle progress -->
        <script src="{{ asset('./plugins/circle-progress/circle-progress.min.js') }}"></script>
        <!-- Datamap -->
        <script src="{{ asset('./plugins/d3v3/index.js') }}"></script>
        <script src="{{ asset('./plugins/topojson/topojson.min.js') }}"></script>
        <script src="{{ asset('./plugins/datamaps/datamaps.world.min.js') }}"></script>
        <!-- Morrisjs -->
        <script src="{{ asset('./plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('./plugins/morris/morris.min.js') }}"></script>
        <!-- Pignose Calender -->
        <script src="{{ asset('./plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('./plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
        <!-- ChartistJS -->
        <script src="{{ asset('./plugins/chartist/js/chartist.min.js') }}"></script>
        <script src="{{ asset('./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>



        <script src="{{ asset('./js/dashboard/dashboard-1.js') }}"></script>


        <script src="{{ asset('./plugins/tables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('./plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('./plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>


        @stack('my-scripts')

</body>

</html>
