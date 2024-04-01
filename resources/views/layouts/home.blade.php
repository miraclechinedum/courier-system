<!DOCTYPE html>
<html lang="en">

<head>
    <title>GO Home-1</title>
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

    <!--[if lt IE 9]>
            <script src="assets/plugins/iesupport/html5shiv.js"></script>
            <script src="assets/plugins/iesupport/respond.js"></script>
        <![endif]-->
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

    <!-- Popup: Login -->
    <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>

            <div class="modal-content">
                <div class="login-wrap text-center">
                    <h2 class="title-3"> sign in </h2>
                    <p> Sign in to <strong> GO </strong> for getting all details </p>

                    <div class="login-form clrbg-before">
                        <form class="login">
                            <div class="form-group"><input type="text" placeholder="Email address" class="form-control"></div>
                            <div class="form-group"><input type="password" placeholder="Password" class="form-control"></div>
                            <div class="form-group">
                                <button class="btn-1 " type="submit"> Sign in now </button>
                            </div>
                        </form>
                        <a href="#" class="gray-clr"> Forgot Passoword? </a>
                    </div>
                </div>
                <div class="create-accnt">
                    <a href="#" class="white-clr"> Don’t have an account? </a>
                    <h2 class="title-2"> <a href="#" class="green-clr under-line">Create a free account</a> </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Popup: Login -->

    <!-- Search Popup -->
    <div class="search-popup">
        <div>
            <div class="popup-box-inner">
                <form>
                    <input class="search-query" type="text" placeholder="Search and hit enter" />
                </form>
            </div>
        </div>
        <a href="javascript:void(0)" class="close-search"><i class="fa fa-close"></i></a>
    </div>
    <!-- / Search Popup -->

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

<!-- Mirrored from jthemes.net/themes/f-html/GO-Courier/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 03:25:35 GMT -->

</html>