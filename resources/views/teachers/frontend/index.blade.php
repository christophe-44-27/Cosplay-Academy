@extends ('base_layout')
@push('stylesheets')
    <style>
        .icon-active-social-network{
            background-color: #00d7b3 !important;
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
                        <h2 class="title text-white">Les auteurs de tutoriel</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active text-gray-silver">Les auteurs de tutoriel</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Team -->
    <section id="team">
        <div class="container">
            <div class="row mtli-row-clearfix">
            @if ($teachers)
                @foreach($teachers as $teacher)
                <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-30 mb-sm-30">
                    <div class="team-members maxwidth400">
                        <div class="team-thumb">
                            @if ($teacher->profile_picture)
                                <img class="img-fullwidth" alt="" src="{{ asset('storage/' . $teacher->profile_picture) }}">
                            @else
                                <img class="img-fullwidth" alt="" src="{{ asset('images/thumbnail-tutorial-empty.png') }}">
                            @endif
                        </div>
                        <div class="team-bottom-part border-bottom-theme-color-2-2px bg-lighter border-1px text-center p-10 pt-20 pb-10">
                            <h4 class="text-uppercase font-raleway font-weight-600 m-0">
                                <a class="text-theme-color-2" href="{{ route('teacher_profile', $teacher->id) }}" data-toggle="tooltip" title="{{ $teacher->public_pseudonym }}">
                                    {{ str_limit($teacher->public_pseudonym, $limit = 15, $end = '...') }}
                                </a>
                            </h4>
                            <h5 class="text-theme-color">
                                @if($teacher->address)
                                    {{ $teacher->address->country->name }}
                                @else
                                    &nbsp;
                                @endif
                            </h5>
                            <ul class="styled-icons icon-sm icon-dark icon-theme-colored">
                                @if ($teacher->facebook_page)
                                    <li>
                                        <a href="{{ $teacher->facebook_page }}" class="icon-active-social-network">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($teacher->twitter_page)
                                    <li>
                                        <a href="{{ $teacher->twitter_page }}" class="icon-active-social-network">
                                            <i class="fa fa-twitter-square"></i>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter-square"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($teacher->youtube_page)
                                    <li>
                                        <a href="{{ $teacher->youtube_page }}" class="icon-active-social-network">
                                            <i class="fa fa-youtube-square"></i>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-youtube-square"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($teacher->website)
                                    <li>
                                        <a href="{{ $teacher->website }}" class="icon-active-social-network">
                                            <i class="fa fa-globe"></i>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-globe"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($teacher->instagram_page)
                                    <li>
                                        <a href="{{ $teacher->instagram_page }}" class="icon-active-social-network">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="alert alert-info">Aucun professeur n'est disponible sur la Cosplay School</div>
            @endif
            </div>
        </div>
    </section>

    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/cosplay-school-bg.png') }}"
             data-parallax-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-smile mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $studentCount }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $studentCount }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Nos étudiants</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-note2 mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $tutorialCount }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $tutorialCount }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Nos cours</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-users mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $teacherCount }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $teacherCount }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Les auteurs</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
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

    <!-- Section: Why Choose Us -->
    <section class="">
        <div class="container pt-40">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-7">
                        <div class="pr-40">
                            <h3 class="text-uppercase text-theme-colored title line-bottom">Nos <span class="text-theme-color-2 font-weight-400">avantages</span></h3>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-scissors text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Ateliers</h5>
                                            <p class="text-gray">Augmentez vos revenus grâce à nos ateliers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-diamond text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Récompenses</h5>
                                            <p class="text-gray">Recevez des récompenses pour vos tutoriels</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-graph2 text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Visibilité</h5>
                                            <p class="text-gray">Augmentez votre visibilité grâce aux nombreuses visites du site !</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-clock text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">événements</h5>
                                            <p class="text-gray">Prenez part aux événements de la Cosplay School</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-world text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">International</h5>
                                            <p class="text-gray">Rapprochez vous de vos fans internationaux !</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-light text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Révolution</h5>
                                            <p class="text-gray">Prenez part à la révolution de l'apprentissage du Cosplay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h3 class="line-bottom">Pourquoi publier <span class="text-theme-color-2">sur notre site ?</span></h3>
                        <p class="mb-20">
                            La Cosplay School c'est LA plateforme francophone de référence dans le partage
                            des tutoriels de cosplay.
                        </p>
                        <div id="accordion1" class="panel-group accordion">
                            <div class="panel">
                                <div class="panel-title">
                                    <a class="active" data-parent="#accordion1" data-toggle="collapse" href="#accordion11" aria-expanded="true">
                                        <span class="open-sub"></span> Partager ses connaissances
                                    </a>
                                </div>
                                <div id="accordion11" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>
                                            Vous avez envie de partager vos connaissances, mais vous n'avez pas envie
                                            d'avoir à gérer un site internet ? Parfait, nous le faisons pour vous !
                                            Déposez vos tutoriels, organisez vos ateliers, on s'occupent du reste :).
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title">
                                    <a data-parent="#accordion1" data-toggle="collapse" href="#accordion12" class="" aria-expanded="true">
                                        <span class="open-sub"></span>
                                        Les récompenses
                                    </a>
                                </div>
                                <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>
                                            Les récompenses vous permettent de recevoir des contreparties
                                            allant de 20$ à 100$ (+ du matériel gratuit). Ces récompenses sont
                                            accessibles grâce à des palliers de publications de tutoriels.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title">
                                    <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="" aria-expanded="true">
                                        <span class="open-sub"></span>
                                        La visibilité
                                    </a>
                                </div>
                                <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>
                                            En partageant vos tutoriels sur notre site, vous touchez plus de 1 000
                                            personnes par mois. Et ce chiffre ne cesse d'augmenter ! De plus, nous vous
                                            donnons l'occasion de nous accompagner lors des Comic-con afin de présenter
                                            vos oeuvres sur nos tables.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
