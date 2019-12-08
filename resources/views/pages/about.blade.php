@extends('layout.layout_without_search_bar')

@section('content')
    <!--section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Comment ça marche ?</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>Pas de chichis, pas de blabla, l'utilisation de la plateforme est vraiment simple !</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class="icon-bg box-shadow icon-service text-purple about">
                                    <img src="{{ asset('themes/frontend/images/png/about/employees.png') }}" alt="img">
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Inscription</h4>
                                    <p class="text-muted mb-0">L'inscription ne dure que 2 min top chrono</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class=" icon-bg box-shadow icon-service text-purple about">
                                    <img src="{{ asset('themes/frontend/images/png/about/megaphone.png') }}" alt="img">
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Partagez votre contenu</h4>
                                    <p class="text-muted mb-0">Mettez en ligne vos cours ou tutoriels</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-sm-0 mb-4">
                            <div class="service-card text-center">
                                <div class="icon-bg box-shadow icon-service text-purple about">
                                    <img src="{{ asset('themes/frontend/images/png/about/pencil.png') }}" alt="img">
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Inscrivez-vous</h4>
                                    <p class="text-muted mb-0">Inscrivez-vous à certains cours ou tutoriels de votre choix</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="">
                            <div class="service-card text-center">
                                <div class="icon-bg box-shadow icon-service text-purple about">
                                    <img src="{{ asset('themes/frontend/images/png/about/coins.png') }}" alt="img">
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Générez des revenus</h4>
                                    <p class="text-muted mb-0">Les auteurs de contenu peuvent générer un revenu :)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->

    <!--Section-->
    <section>
        <div class="cover-image about-widget sptb bg-background-color" data-image-src="../assets/images/banners/banner4.jpg">
            <div class="content-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h2 class="mb-2 font-weight-400">Améliorez vos compétences en costumes et accessoires...</h2>
                        <p>L'inscription est rapide, seulement 2 min et gratuite ! Rejoignez notre communauté !</p>
                        <div class="mt-5">
                            <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Inscrivez-vous !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->

    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>@lang("Pourquoi choisir la Cosplay Academy ?")</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>Nous sommes la seule plateforme d'apprentissage en ligne dans le domaine de la costumade</p>
            </div>
            <div class="row ">
                <div class="col-md-6 col-lg-4 features">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-success mb-3">
                                    <i class="fa fa-bullhorn  text-white"></i>
                                </div>
                                <h3 class="font-weight-semibold">Soyez alertes</h3>
                                <p>Recevez des notifications de participation ou de sortie des nouveaux contenus</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-primary mb-3">
                                    <i class="fa fa-heart  text-white"></i>
                                </div>
                                <h3 class="font-weight-semibold">Montrez votre intérêt</h3>
                                <p>Mettez les cours et tutoriels en favoris et indiquez votre intérêt</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-secondary mb-3">
                                    <i class="fa fa-bookmark  text-white"></i>
                                </div>
                                <h3 class="font-weight-semibold">Realtime Project Work</h3>
                                <p>our being able to do what we like best, every pleasure is to be welcomed and every pain.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card mb-lg-0">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-warning mb-3">
                                    <i class="fa fa-line-chart   text-white"></i>
                                </div>
                                <h3 class="font-weight-semibold">Augmentez vos revenus</h3>
                                <p>Grâce à la Cosplay Academy vous allez pouvoir générer un revenu supplémentaire</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card mb-lg-0 mb-md-0">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-danger mb-3">
                                    <i class="fa fa-handshake-o   text-white"></i>
                                </div>
                                <h3 class="font-weight-semibold">Facile d'utilisation</h3>
                                <p>La plateforme a été conçue d'une manière accessible et simple d'utilisation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card mb-0">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-info mb-3">
                                    <i class="fa fa-phone  text-white"></i>
                                </div>
                                <h3 class="font-weight-semibold">24/7 Support</h3>
                                <p>Nous sommes là pour répondre à vos questions, en tous temps</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->

    <!--Section-->
    <section>
        <div class="about-1 cover-image sptb bg-background-color" data-image-src="../assets/images/banners/banner5.jpg">
            <div class="content-text mb-0 text-white info">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-status md-mb-0">
                                <div class="counter-icon">
                                    <i class="typcn typcn-mortar-board"></i>
                                </div>
                                <h5>@lang("Cours")</h5>
                                <h2 class="counter mb-0">{{ $courseCount }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-status status-1 md-mb-0">
                                <div class="counter-icon text-warning">
                                    <i class="typcn typcn-mortar-board"></i>
                                </div>
                                <h5>@lang("Tutoriels")</h5>
                                <h2 class="counter mb-0">{{ $tutorialCount }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-status status md-mb-0">
                                <div class="counter-icon text-primary">
                                    <i class="typcn typcn-group-outline"></i>
                                </div>
                                <h5>@lang("Membres")</h5>
                                <h2 class="counter mb-0">{{ $members }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>@lang("Professeurs")</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>@lang("Nos artistes sont parmi les plus talentueux dans leur domaine")</p>
            </div>
            <div class="row">
                @if($featuredUsers)
                    @foreach($featuredUsers as $user)
                        <div class="col-xl-4 col-md-12">
                            <div class="card mb-xl-0">
                                <div class="card-body">
                                    <div class="team-section text-center">
                                        <div class="team-img">
                                            <img src="{{ asset('storage/' . $user->avatar) }}" class="img-thumbnail rounded-circle alt=" alt="img">
                                        </div>
                                        <h3 class="font-weight-bold dark-grey-text mt-4">{{ $user->name }}</h3>
                                        <h6 class="font-weight-bold blue-text ">{{ $user->country->name }}</h6>
                                        <p class="font-weight-normal dark-grey-text">
                                            <i class="fa fa-quote-left pr-2"></i>{{ $user->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--/section-->
@endsection
