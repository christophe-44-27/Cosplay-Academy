<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content=" Eudica - Online Education & Learning Courses HTML CSS Responsive Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="academy training course css template, classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, marketplace html template premium, learning management system jquery html, clean online course teaching directory template, online learning course management system, online course website template css html, premium lms training web template, training course responsive website"/>

    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

    <!-- Title -->
    <title> Eudica - Online Education & Learning Courses HTML CSS Responsive Template</title>

    <!-- Bootstrap css -->
    <link href="{{ asset('themes/frontend/plugins/bootstrap-4.3.1/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Style css -->
    <link href="{{ asset('themes/frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('themes/frontend/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- Font-awesome  css -->
    <link href="{{ asset('themes/frontend/css/icons.css') }}" rel="stylesheet" />

    <!--Horizontal Menu css-->
    <link href="{{ asset('themes/frontend/plugins/horizontal-menu/horizontal-menu.css') }}" rel="stylesheet" />

    <!--Select2 css -->
    <link href="{{ asset('themes/frontend/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Cookie css -->
    <link href="{{ asset('themes/frontend/plugins/cookie/cookie.css') }}" rel="stylesheet">

    <!-- Owl Theme css-->
    <link href="{{ asset('themes/frontend/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{ asset('themes/frontend/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!-- Pscroll bar css-->
    <link href="{{ asset('themes/frontend/plugins/pscrollbar/pscrollbar.css') }}" rel="stylesheet" />

    <!-- Switcher css -->
    <link  href="{{ asset('themes/frontend/switcher/css/switcher.css') }}" rel="stylesheet" id="switcher-css" type="text/css" media="all"/>
    <!-- Color Skin css -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('themes/frontend/color-skins/color6.css') }}" />
    @notify_css
    @stack('stylesheets')

</head>
<body>
<!--Section-->
<div class="banner-1 cover-image  bg-background2" data-image-src="../assets/images/banners/banner1.jpg">
    <div class="header-main">
        <!--Topbar-->
        @include('frontend.elements.top_bar')
        <!--/Topbar-->

        <!--Header-->
        @include('frontend.elements.header')
        <!--/Header-->

        <!-- Mobile Header -->
        <div class="horizontal-header clearfix ">
            <div class="container">
                <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                <span class="smllogo"><img src="{{ asset('themes/frontend/images/brand/logo1.png') }}" width="120" alt="img"/></span>
                <span class="smllogo-white"><img src="{{ asset('themes/frontend/images/brand/logo.png') }}" width="120" alt="img"/></span>
                <a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>
            </div>
        </div>
        <!-- /Mobile Header -->

        <!--Horizontal-main -->
        @include('frontend.elements.horizontal_main')
        <!--/Horizontal-main -->
    </div>
</div><!--/Section-->

@yield('content')

<!--Footer Section-->
@include('frontend.elements.footer')
<!--/Footer Section-->

<!-- Back to top -->
<a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>

<!-- JQuery js-->
<script src="{{ asset('themes/frontend/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap js -->
<script src="{{ asset('themes/frontend/plugins/bootstrap-4.3.1/js/popper.min.js') }}"></script>
<script src="{{ asset('themes/frontend/plugins/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>

<!--JQuery Sparkline js-->
<script src="{{ asset('themes/frontend/js/jquery.sparkline.min.js') }}"></script>

<!-- Circle Progress js-->
<script src="{{ asset('themes/frontend/js/circle-progress.min.js') }}"></script>

<!-- Star Rating js-->
<script src="{{ asset('themes/frontend/plugins/rating/jquery.rating-stars.min.js') }}"></script>

<!--Owl Carousel js -->
<script src="{{ asset('themes/frontend/plugins/owl-carousel/owl.carousel.js') }}"></script>

<!--Horizontal Menu js-->
<script src="{{ asset('themes/frontend/plugins/horizontal-menu/horizontal-menu.js') }}"></script>

<!-- Custom scroll bar js-->
<script src="{{ asset('themes/frontend/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Scripts js-->
<script src="{{ asset('themes/frontend/js/owl-carousel.js') }}"></script>

<!-- Custom js-->
<script src="{{ asset('themes/frontend/js/custom.js') }}"></script>
@notify_js
@notify_render
@stack('javascripts')

</body>
</html>
