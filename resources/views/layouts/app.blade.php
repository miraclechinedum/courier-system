<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- loader-->
    <link href="{{ asset('build/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('build/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('build/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/icons.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Include Select2 CSS -->
    <link href="{{ asset('build/assets/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/select2.min.css') }}" rel="stylesheet" />

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    <link href="{{ asset('build/assets/css/select2.min.css') }}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('build/assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/header-colors.css') }}" rel="stylesheet" />

    <title>Courier</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">

        <!-- Include Sidebar -->
        @include('layouts.sidebar')

        <!-- Include header -->
        @include('layouts.navigation')

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- Page content -->
            @yield('content')
        </div>
        <!--end page content wrapper-->

        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">Copyright © 2023. All right reserved.</div>
        </footer>
        <!--end footer-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->
    </div>
    <!--end wrapper-->

    <!-- JS Files-->
    <script src="build/assets/js/jquery.min.js"></script>
    <script src="build/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="build/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="build/assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="build/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="build/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="build/assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
    <script src="build/assets/plugins/chartjs/chart.min.js"></script>
    <script src="build/assets/js/index.js"></script>

    <script src="build/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="build/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="build/assets/js/table-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/plugins/select2/js/select2-custom.js"></script>

    <!-- Main JS-->
    <script src="build/assets/js/main.js"></script>

    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    @include('sweetalert::alert')

</body>

</html>