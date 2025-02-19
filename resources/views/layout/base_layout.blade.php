<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title> Cosplay Academy - @lang("Plateforme d'apprentissage du cosplay")</title>

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

    @notify_css
    <!-- Color Skin css -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('themes/frontend/color-skins/color6.css') }}" />

</head>
<body>
<!--Section-->
<div class="banner-1 cover-image  bg-background2" data-image-src="{{ asset('themes/frontend/images/banners/banner-cosplay.jpg') }}">
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
            </div>
        </div>
        <!-- /Mobile Header -->

        <!--Horizontal-main -->
        @include('frontend.elements.horizontal_main')
        <!--/Horizontal-main -->
    </div>
    <!--Section-->
    <section>
        <div class="sptb-2 sptb-tab">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white mb-7">
                        <h1 class="mb-1">@lang("Améliorez vos compétences en cosplay")</h1>
                        <p>@lang("Parcourez les cours et formations disponibles pour améliorer vos compétences dans plusieurs domaines !")</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
                            <div class="search-background bg-transparent">
                                {!! Form::open(['method' => 'get', 'url' => route('search_courses_homepage')]) !!}
                                <div class="form row no-gutters ">
                                    <div class="form-group  col-xl-6 col-lg-6 col-md-12 mb-0 bg-white ">
                                        {!! Form::text('keywords', null, ['class' => 'form-control input-lg br-tr-md-0 br-br-md-0', 'placeholder' => \Illuminate\Support\Facades\Lang::get("Rechercher un cours....")])!!}
                                    </div>
                                    <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                        {!! Form::select('category_id', [\Illuminate\Support\Facades\Lang::get("Catégories") => $listCategories], null, ['class' => 'form-control select2-show-search  border-bottom-0']) !!}
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary br-tl-md-0 br-bl-md-0">@lang("Rechercher")</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->
</div><!--/Section-->

<div id="app">
    @yield('content')

    <!--Footer Section-->
    @include('frontend.elements.footer')
    <!--/Footer Section-->

    <!-- Back to top -->
    <a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>
</div>


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
<script src="{{ asset('js/app.js') }}"></script>

@notify_js
@notify_render

@stack('javascripts')

</body>
</html>
