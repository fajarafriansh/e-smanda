<!doctype html>
<html class="no-js" lang="zxx" style="margin-right: 17px; overflow: hidden;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') &middot; e-Smanda</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css' ) }}">
    {{-- <link rel="stylesheet" href="{{ asset ('css/owl.carousel.min.css' ) }}"> --}}
    <link rel="stylesheet" href="{{ asset ('css/magnific-popup.css' ) }}">
    <link rel="stylesheet" href="{{ asset ('css/passtrength.css' ) }}">
    {{-- <link rel="stylesheet" href="{{ asset ('css/font-awesome.min.css' ) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset ('css/themify-icons.css' ) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset ('css/nice-select.css' ) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset ('css/flaticon.css' ) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset ('css/gijgo.css' ) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset ('css/animate.css' ) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset ('css/slicknav.css' ) }}"> --}}
    <link rel="stylesheet" href="{{ asset ('css/style.css' ) }}">
    <link rel="stylesheet" href="{{ asset ('css/custom.css' ) }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <div class="mfp-bg mfp-ready"></div>
    @yield('content')
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
                            <img src="{{ asset ('img/banner/edu_ilastration.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_info">
                            <h3>Learn your <br>
                                Favorite Course <br>
                                From Online</h3>
                            <a href="#" class="boxed_btn">Browse Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS here -->
    {{-- <script src="js/vendor/modernizr-3.5.0.min.js"></script> --}}
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    {{-- <script src="js/owl.carousel.min.js"></script> --}}
    {{-- <script src="js/isotope.pkgd.min.js"></script> --}}
    <script src="../js/ajax-form.js"></script>
    {{-- <script src="js/waypoints.min.js"></script> --}}
    {{-- <script src="js/jquery.counterup.min.js"></script> --}}
    {{-- <script src="js/imagesloaded.pkgd.min.js"></script> --}}
    {{-- <script src="js/scrollIt.js"></script> --}}
    {{-- <script src="js/jquery.scrollUp.min.js"></script> --}}
    {{-- <script src="js/wow.min.js"></script> --}}
    {{-- <script src="js/nice-select.min.js"></script> --}}
    {{-- <script src="js/jquery.slicknav.min.js"></script> --}}
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/jquery.passtrength.min.js"></script>
    <script src="../js/plugins.js"></script>
    {{-- <script src="js/gijgo.min.js"></script> --}}

    <script src="../js/main.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>