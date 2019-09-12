@extends('layout.base_layout')

@section('facebook_seo')
    <meta property="og:url" content="https://www.cosplayschool.ca"/>
    <meta property="og:title" content="Plateforme d'entraide francophone de cosplay" />
    <meta property="og:description"
          content="Rejoignez la nouvelle plateforme d'entraide francophone de cosplay.">
    <meta property="og:image" content="{{ asset('images/cs-default-sharing-image.png') }}">
@endsection

@push('stylesheets')
    <style>
        .margin-bot-20px{
            margin-bottom: 20px;
        }
    </style>

    <!-- Revolution Slider 5.x CSS settings -->
    <link href="{{ asset('css/revolution-slider/settings.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/revolution-slider/layers.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/revolution-slider/navigation.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('seo')
    <meta name="keywords"
          content="Cosplay School, Cosplay, cosplay, school, ecole, loisir, apprentissage, videos, tutoriels, cours, ateliers, workshops, courses">
    <meta name="description"
          content="Grâce à la Cosplay School, l'apprentissage du Cosplay n'aura jamais été aussi simple ! Rejoignez-nous !"/>
@endsection

@push('google_analytic')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118215472-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118215472-1');
    </script>
@endpush

@section('content')
    <!-- Section: home -->
    <section id="home">
        <div class="container-fluid p-0">
            <!-- Slider Revolution Start -->
            <div class="rev_slider_wrapper">
                <div class="rev_slider" data-version="5.0">
                    <ul>
                        <!-- SLIDE 1 -->
                        <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default"
                            data-easein="default" data-easeout="default" data-masterspeed="default"
                            data-thumb="{{ asset('images/cosplay-school-bg.png') }}" data-rotate="0" data-saveperformance="off"
                            data-title="Slide 1" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('images/cosplay-school-bg.png') }}" alt="" data-bgposition="center 10%"
                                 data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg"
                                 data-bgparallax="10" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway"
                                 id="rs-1-layer-1"

                                 data-x="['left']"
                                 data-hoffset="['30']"
                                 data-y="['middle']"
                                 data-voffset="['-110']"
                                 data-fontsize="['100']"
                                 data-lineheight="['110']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;s:500"
                                 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap; font-weight:700;">@lang('Publiez vos tutoriels')
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-left-theme-color-2-6px pl-20 pr-20"
                                 id="rs-1-layer-2"

                                 data-x="['left']"
                                 data-hoffset="['35']"
                                 data-y="['middle']"
                                 data-voffset="['-25']"
                                 data-fontsize="['35']"
                                 data-lineheight="['54']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;s:500"
                                 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap; font-weight:600;">@lang("Comment ça marche ?")
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme text-white"
                                 id="rs-2-layer-3"

                                 data-x="['left']"
                                 data-hoffset="['35']"
                                 data-y="['middle']"
                                 data-voffset="['35']"
                                 data-fontsize="['16']"
                                 data-lineheight="['28']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;s:500"
                                 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1400"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">@lang("Venez partager vos connaissances")
                            </div>

                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption tp-resizeme"
                                 id="rs-1-layer-4"

                                 data-x="['left']"
                                 data-hoffset="['35']"
                                 data-y="['middle']"
                                 data-voffset="['100']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1400"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a
                                    class="btn btn-colored btn-lg btn-flat btn-theme-colored border-left-theme-color-2-6px pl-20 pr-20"
                                    href="#">@lang("Voir plus")</a>
                            </div>
                        </li>
                        <li data-index="rs-2" data-transition="slidingoverlayhorizontal" data-slotamount="default"
                            data-easein="default" data-easeout="default" data-masterspeed="default"
                            data-thumb="{{ asset('images/slider-profs.jpg') }}" data-rotate="0" data-saveperformance="off"
                            data-title="Slide 2" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('images/slider-profs.jpg') }}" alt="" data-bgposition="center 10%"
                                 data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg"
                                 data-bgparallax="10" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway"
                                 id="rs-2-layer-1"

                                 data-x="['left']"
                                 data-hoffset="['30']"
                                 data-y="['middle']"
                                 data-voffset="['-110']"
                                 data-fontsize="['100']"
                                 data-lineheight="['110']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;s:500"
                                 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap; font-weight:700;">@lang('Les auteurs')
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-left-theme-color-2-6px pl-20 pr-20"
                                 id="rs-2-layer-2"

                                 data-x="['left']"
                                 data-hoffset="['35']"
                                 data-y="['middle']"
                                 data-voffset="['-25']"
                                 data-fontsize="['35']"
                                 data-lineheight="['54']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;s:500"
                                 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap; font-weight:600;">@lang("Découvrez les auteurs de nos tutoriels")
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme text-white"
                                 id="rs-2-layer-3"

                                 data-x="['left']"
                                 data-hoffset="['35']"
                                 data-y="['middle']"
                                 data-voffset="['35']"
                                 data-fontsize="['16']"
                                 data-lineheight="['28']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;s:500"
                                 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1400"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">@lang("")
                            </div>

                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption tp-resizeme"
                                 id="rs-2-layer-4"

                                 data-x="['left']"
                                 data-hoffset="['35']"
                                 data-y="['middle']"
                                 data-voffset="['100']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1400"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a
                                    class="btn btn-colored btn-lg btn-flat btn-theme-colored border-left-theme-color-2-6px pl-20 pr-20"
                                    href="{{ route('teachers') }}">@lang("Voir plus")</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end .rev_slider -->
            </div>
            <!-- end .rev_slider_wrapper -->
        </div>
    </section>


    <!-- Section: Courses -->
    <section class="">
        <div class="container">
            <div class="section-title mb-10">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="text-uppercase font-28 line-bottom mt-0 line-height-1">Tutoriels <span
                                class="text-theme-color-2 font-weight-400">à la une</span></h2>
                        <h4 class="pb-20">Les derniers tutoriels publiés</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($promotedTutorials as $tutorial)
                    <div class="col-sm-6 col-md-3">
                        <div class="service-block bg-white">
                            <div class="thumb">
                                <img src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}" alt="" class="img-fullwidth">
                                <div class="campaign-overlay"></div>
                            </div>
                            <div class="campaign-details clearfix p-15 pt-10 pb-10">
                                <h4 class="font-weight-700 mt-0">
                                    <a href="{{ route('tutorial_show', $tutorial->slug) }}">
                                        {{ str_limit($tutorial->title, $limit = 17, $end = '...') }}
                                    </a>
                                </h4>
                                <div class="campaign-bottom border-top clearfix mt-20">
                                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                                        <li class="text-theme-color-2 pr-0 mr-5">
                                            @lang(($tutorial->category) ? $tutorial->category->name : '-')
                                        </li>
                                    </ul>
                                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10"
                                       href="{{ route('tutorial_show', $tutorial->slug) }}">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Courses -->
    <section class="">
        <div class="container">
            <div class="section-title mb-10">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="text-uppercase font-28 line-bottom mt-0 line-height-1">Tutoriels <span
                                class="text-theme-color-2 font-weight-400">les plus populaires</span></h2>
                        <h4 class="pb-20">Les tutoriels les plus vus</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($famousTutorials as $tutorial)
                    <div class="col-sm-6 col-md-3">
                        <div class="service-block bg-white">
                            <div class="thumb">
                                <img src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}" alt="" class="img-fullwidth">
                                <div class="campaign-overlay"></div>
                            </div>
                            <div class="campaign-details clearfix p-15 pt-10 pb-10">
                                <h4 class="font-weight-700 mt-0">
                                    <a href="{{ route('tutorial_show', $tutorial->slug) }}">
                                        {{ str_limit($tutorial->title, $limit = 17, $end = '...') }}
                                    </a>
                                </h4>
                                <div class="campaign-bottom border-top clearfix mt-20">
                                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                                        <li class="text-theme-color-2 pr-0 mr-5">
                                            @lang(($tutorial->category) ? $tutorial->category->name : '-')
                                        </li>
                                    </ul>
                                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10"
                                       href="{{ route('tutorial_show', $tutorial->slug) }}">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: team -->
    <section>
        <div class="container">
            <div class="section-title mb-10">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">@lang('Ils') <span
                                    class="text-theme-color-2 font-weight-400">@lang('publient des tutoriels')</span></h2>
                        <h4 class="pb-20">@lang("Retrouvez l'ensemble des cosplayeurs qui publient des tutoriels sur la Cosplay School")</h4>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row multi-row-clearfix">
                    @foreach($users as $user)
                    <div class="col-sm-6 col-md-3 sm-text-center mb-sm-30 margin-bot-20px">
                        <div class="team maxwidth400">
                            <div class="thumb">
                                @if($user->profile_picture)
                                    <img class="img-fullwidth" src="{{ asset('storage/' . $user->profile_picture) }}" alt="">
                                @else
                                    <img class="img-fullwidth" src="{{ asset('images/default-thumbnails.png') }}" alt="">
                                @endif
                            </div>
                            <div class="content border-1px border-bottom-theme-color-2-2px p-15 bg-light clearfix">
                                <h4 class="name text-theme-color-2 mt-0" data-toggle="tooltip" title="{{ $user->public_pseudonym }}">
                                    {{ str_limit($user->public_pseudonym, $limit = 12, $end = '...') }}
                                    <small>@lang('Professeur')</small>
                                </h4>
                                <p class="mb-20"></p>
                                <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                                <a class="btn btn-theme-colored btn-sm pull-right flip"
                                   href="{{ route('community_show_member', $user->id) }}">@lang('Voir plus')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/cosplay-school-bg.png') }}"
             data-parallax-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-smile mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $memberCount }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $memberCount }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Nos membres</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-note2 mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $tutorialCount }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $tutorialCount }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Nos tutoriels</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 mb-md-0">
                    <div class="funfact text-center">
                        <i class="pe-7s-look mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $tutorialNbViews }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $tutorialNbViews }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Nombre de visites des tutos</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('javascripts')

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>

    <script>
        $(document).ready(function(e) {
            $(".rev_slider").revolution({
                sliderType: "standard",
                sliderLayout: "auto",
                dottedOverlay: "none",
                delay: 5000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "zeus",
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 600,
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        }
                    },
                    bullets: {
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 600,
                        style: "metis",
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        direction: "horizontal",
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 30,
                        space: 5,
                        tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">Cosplay School</span>'
                    }
                },
                responsiveLevels: [1240, 1024, 778],
                visibilityLevels: [1240, 1024, 778],
                gridwidth: [1170, 1024, 778, 480],
                gridheight: [650, 768, 960, 720],
                lazyType: "none",
                parallax: {
                    origo: "slidercenter",
                    speed: 1000,
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                    type: "scroll"
                },
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "0",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        });
    </script>
@endpush
