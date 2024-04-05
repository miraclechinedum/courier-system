<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rapidroute Services</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css') }}" />
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') }}" />
    <!-- Fonts Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/plugins/font-elegant/elegant.css') }}" />
    <!-- OwlCarousel2 Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/plugins/owl.carousel.2/assets/owl.carousel.css') }}" />

    <!-- Animate Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/animate.css') }}" />

    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/theme.css') }}" />
</head>


<body id="home">
    <!-- Preloader -->
    <div id="preloader">
        <div class="small1">
            <div class="small ball smallball1"></div>
            <div class="small ball smallball2"></div>
            <div class="small ball smallball3"></div>
            <div class="small ball smallball4"></div>
        </div>

        <div class="small2">
            <div class="small ball smallball5"></div>
            <div class="small ball smallball6"></div>
            <div class="small ball smallball7"></div>
            <div class="small ball smallball8"></div>
        </div>

        <div class="bigcon">
            <div class="big ball"></div>
        </div>
    </div>
    <!-- /.Preloader -->

    <!-- Main Wrapper -->
    <main class="wrapper">

        <!-- Include Navbar -->
        @include('layouts.home-nav')

        <!-- Content Wrapper -->
        <article>

            @yield('content')

        </article>
        <!-- /.Content Wrapper -->

        <!-- Footer -->
        @include('layouts.home-footer')


    </main>
    <!-- / Main Wrapper -->

    <!-- Top -->
    <!-- <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div> -->

    <!-- Whatsapp -->
    <div class="whatsapp-icon transition">
        <!-- WhatsApp Icon -->
        <a href="https://api.whatsapp.com/send?phone=+17377073339" class="whatsapp-link" target="_blank">
            <img src="{{ asset('build/assets/images/icons/whatsapp.png') }}" alt="WhatsApp Icon" class="whatsapp-icon">
        </a>
    </div>

    <!-- Main Jquery JS -->
    <script src="{{ asset('build/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('build/assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap Select JS -->
    <script src="{{ asset('build/assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <!-- OwlCarousel2 Slider JS -->
    <script src="{{ asset('build/assets/plugins/owl.carousel.2/owl.carousel.min.js') }}" type="text/javascript"></script>
    <!-- Sticky Header -->
    <script src="{{ asset('build/assets/js/jquery.sticky.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('build/assets/plugins/WOW-master/dist/wow.min.js') }}" type="text/javascript"></script>
    <!-- Data binder -->
    <script src="{{ asset('build/assets/plugins/data.binder.js/data.binder.js') }}" type="text/javascript"></script>

    <!-- Slider JS -->


    <!-- Theme JS -->
    <script src="{{ asset('build/assets/js/theme.js') }}" type="text/javascript"></script>

</body>

</html>