@extends ('base_layout')
@push('stylesheets')
    <style>
        .icon-active-social-network{
            background-color: #00d7b3 !important;
        }
        .thumb > img{
            border-radius: 50%;
        }
    </style>
@endpush

@section('seo')
    <meta name="keywords"
          content="tutorial, tutoriel, apprendre, {{  $teacher->public_pseudonym }}">
    <meta name="description"
          content="Découvrez le profil de {{ $teacher->public_pseudonym }} et parcourez ses tutoriels mis en ligne sur la Cosplay School !"/>
@endsection

@section('facebook_seo')
    <!-- ZONE SEO FACEBOOK -->
    <meta property="og:url" content="{{ $currentUrl }}" />
    <meta property="og:title" content="{{ $teacher->public_pseudonym }} est présent sur la Cosplay School !" />
    <meta property="og:image"
          content="{{ asset('storage/' . $teacher->profile_picture ) }}">
    <meta property="og:description"
          content="Découvrez le profil de {{ $teacher->public_pseudonym }} et parcourez ses tutoriels mis en ligne sur la Cosplay School !" />
@endsection

@push('google_analytics')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118215472-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-118215472-1');
    </script>
@endpush

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/cosplay-school-bg.png') }}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white">{{ $teacher->public_pseudonym}}</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li><a href="{{ route('teachers') }}">Les auteurs</a></li>
                            <li class="active text-gray-silver">{{ $teacher->public_pseudonym}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: Experts Details -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumb">
                            @if($teacher->profile_picture)
                                <img src="{{ asset('storage/' . $teacher->profile_picture ) }}" alt="">
                            @else
                                <img src="{{ asset('images/profile-picture-unknown.png') }}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="name font-24 mt-0 mb-0">{{ $teacher->public_pseudonym}}</h4>
                        <h5 class="mt-5 text-theme-color-2">
                            Professeur
                        </h5>
                        {!! $teacher->description !!}
                        <ul class="styled-icons icon-dark icon-theme-colored icon-sm mt-15 mb-0">
                            @if($teacher->facebook_page)
                            <li>
                                <a href="{{ $teacher->facebook_page }}" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            @endif

                            @if($teacher->twitter_page)
                                <li>
                                    <a href="{{ $teacher->twitter_page }}" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            @endif

                            @if($teacher->youtube_page)
                                <li>
                                    <a href="{{ $teacher->youtube_page }}" target="_blank">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                            @endif

                            @if($teacher->instagram_page)
                                <li>
                                    <a href="{{ $teacher->instagram_page }}" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            @endif

                            @if($teacher->website)
                                <li>
                                    <a href="{{ $teacher->website }}" target="_blank">
                                        <i class="fa fa-globe"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-md-4">
                        <h4 class="line-bottom">A propos de moi:</h4>
                        <div class="volunteer-address">
                            <ul>
                                <li>
                                    <div class="bg-light media border-bottom p-15 mb-20">
                                        <div class="media-left">
                                            <i class="pe-7s-pen text-theme-colored font-24 mt-5"></i>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-0">Compétences:</h5>
                                            <p>
                                                @if($teacher->categories)
                                                    @foreach($teacher->categories as $category)
                                                        {{ $category->name }}
                                                    @endforeach
                                                @else
                                                    <div class="alert alert-info">
                                                        {{ $teacher->public_pseudonym }} n'a pas encore renseigné ses
                                                        compétences.
                                                    </div>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="bg-light media border-bottom p-15 mb-20">
                                        <div class="media-left">
                                            <i class="fa fa-map-marker text-theme-colored font-24 mt-5"></i>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-0">Lieu de résidence:</h5>
                                            <p>
                                                @if($teacher->address)
                                                    {{ $teacher->address->country->name }}
                                                @else
                                                    &nbsp;
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="clearfix">
                            <h4 class="line-bottom">Mes derniers tutoriels:</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="row multi-row-clearfix">
                                @if($teacherTutorials)
                                    @foreach($teacherTutorials as $teacherTutorial)
                                        <div class="products related">
                                            <div class="col-sm-6 col-md-3 col-lg-3 mb-sm-30">
                                                <div class="product">
                                                <span class="tag-sale">{{ $teacherTutorial->tutorialCategory->name }}</span>
                                                <div class="product-thumb">
                                                    <a href="{{ route('tutorial_show', $teacherTutorial->slug)}}">
                                                        @if($teacherTutorial->thumbnail_picture)
                                                            <img alt="" src="{{ asset('storage/' . $teacherTutorial->thumbnail_picture) }}" class="img-responsive img-fullwidth">
                                                        @else
                                                            <img alt="" src="{{ asset('images/thumbnail-tutorial-empty.png') }}" class="img-responsive img-fullwidth">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-details text-center">
                                                    <a href="{{ route('tutorial_show', $teacherTutorial->slug)}}">
                                                        <h5 class="product-title">
                                                            {{ $teacherTutorial->title }}
                                                        </h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-info">
                                        Ce professeur n'a pas encore créé de tutoriels.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
