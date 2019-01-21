@extends ('base_layout')

@push('google_analytic')
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

@push('facebook_seo')
    <!-- ZONE SEO FACEBOOK -->
    <meta property="fb:app_id" content="526252497733390" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $currentUrl }}" />
    <meta property="og:title" content="{{ $commission->title }}" />
    <meta property="og:image"
          content="{{ asset('storage/' . $commission->cover_path) }}">
    <meta property="og:description"
          content="Demande de commission, réalisée par {{ $commission->user->public_pseudonym }} et qui s'intitule {{ $commission->title }}" />
@endpush

@push('stylesheets')
    <style>
        #player{
            width: 750px;
            height:500px;
        }
        .share_facebook{
            margin-top: 25px;
            background: #3B5998;
            border-radius: 0;
            color: #fff;
            border-width: 1px;
            border-style: solid;
            border-color: #263961;
        }
    </style>
@endpush

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/cosplay-school-bg.png') }}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white">Les commissions</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active text-gray-silver">Les commissions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Tutorials details -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-pull-right">
                    <div class="single-service">
                        <img src="{{ asset('storage/' . $commission->cover_path ) }}" />
                    </div>
                    <button class="button share_facebook" data-url="{{ $currentUrl }}">
                        Partager sur facebook
                    </button>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sidebar sidebar-left mt-sm-30 ml-40">
                        <div class="widget">
                            <h4 class="widget-title line-bottom">Informations</h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix"> <span> Créée par :</span>
                                        <div class="value pull-right"> {{ $commission->user->public_pseudonym }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Créée le :</span>
                                        <div class="value pull-right"> {{ date('d/m/Y', strtotime($commission->created_at)) }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Nombre de vues : </span>
                                        <div class="value pull-right"> {{ $commission->nb_views }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Nombre de j'aime : </span>
                                        <div class="value pull-right"> {{ $commission->nb_likes }} </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget">
                            <a href="{{ route('commission_report', $commission) }}" class="btn btn-danger">
                                Signaler la demande de commission
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
