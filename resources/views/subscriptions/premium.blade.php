@extends('base_layout')

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
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/grafikart.css') }}" />
@endpush
@section('content')
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h2 class="text-white mt-10">Abonnement premium</h2>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="#">Accueil</a></li>
                            <li class="active text-gray-silver">Abonnement premium</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="header-pricing">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <div class="container-price">
                <div class="title">
                    Devenir premium
                </div>
                <p>
                    Devenir premium sur Cosplay School, c'est <strong>soutenir</strong> la création des contenues faits par
                    la Cosplay School et le développement du site internet tout en accédant des fonctionnalités exclusives.
                    (Comme le téléchargement des sources de code de nos cours, ou bien encore l'heure d'impression à 1$ au lieu d'1.5$).
                </p>
            </div>
        </div>
        <div class="container-price pt">
            <div class="row">
                <div class="col-s-12 col-m-8">
                    <div class="row pricing">
                        <div class="col-s-12 col-m-4 col-l-4">
                            <div class="pricing-col">
                                <header class="price">
                                    0<em>$ </em><sup>A vie</sup>
                                </header>
                                <ul class="nobull">
                                    <li>
                                        Visionner les tutoriels
                                    </li>
                                    <li>
                                        Ajouter des photos / albums
                                    </li>
                                    <li>
                                        Visionner les tutoriels
                                    </li>
                                    <li>
                                        Impression 3D (1.5$ / heure)
                                    </li>
                                    <li>
                                        <strong>Télécharger les sources des tutoriels</strong>
                                    </li>
                                </ul>
                                <footer>
                                    <a href="#" disabled="true">Vous l'avez déjà</a>
                                </footer>
                            </div>
                        </div>
                        <div class="col-s-12 col-m-4 col-l-4">
                            <div class="pricing-col">
                                <header class="price">
                                    2.5<em>$ +tx</em><sup>1 Mois</sup>
                                </header>
                                <ul class="nobull">
                                    <li>
                                        Visionner les tutoriels
                                    </li>
                                    <li>
                                        Ajouter des photos / albums
                                    </li>
                                    <li>
                                        Visionner les tutoriels
                                    </li>
                                    <li>
                                        Impression 3D <strong>(1.5$ / heure)</strong>
                                    </li>
                                    <li>
                                        <strong>Télécharger les sources des tutoriels</strong>
                                    </li>
                                </ul>
                                <footer>
                                    <a href="{{ route('subscription_checkout_monthly') }}">Choisir cette formule</a>
                                </footer>
                            </div>
                        </div>
                        <div class="col-s-12 col-m-4 col-l-4">
                            <div class="pricing-col">
                                <header class="price">
                                    25<em>$ +tx</em><sup>12 Mois</sup>
                                </header>
                                <ul class="nobull">
                                    <li>
                                        Visionner les tutoriels
                                    </li>
                                    <li>
                                        Ajouter des photos / albums
                                    </li>
                                    <li>
                                        Visionner les tutoriels
                                    </li>
                                    <li>
                                        Impression 3D <strong>(1$ / heure)</strong>
                                    </li>
                                    <li>
                                        <strong>Télécharger les sources des tutoriels</strong>
                                    </li>
                                </ul>
                                <footer>
                                    <a href="{{ route('subscription_checkout_yearly') }}">Choisir cette formule</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-s-12 col-m-4 formatted">
                    <h2 style="margin-top:0; padding-top:0;">
                        Pourquoi cette offre ?
                    </h2>
                    <p>
                        Notre but à travers cosplayschool.ca est de partager nos connaissances avec le plus grand nombre, c'est pourquoi
                        nous rendons tout le contenu gratuit et public.
                    </p>
                    <p>
                        Malgré tout, le développement du site internet, les présences sur les événements, l'impression 3D,
                        nécessite du temps et de l'argent.
                        Du coup proposer des options payantes, comme le téléchargement des sources, des modèles 3D, l'impression 3D permettent d'amortir une partie du temps passé et de continuer
                        à faire vivre le site.
                    </p>
                    <h2>
                        Je veux faire un don
                    </h2>
                    <p>
                        Si vous souhaitez soutenir le site, autrement qu'en souscrivant à une offre premium, vous pouvez aussi faire un don
                    </p>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="margin-bottom: .5rem">
                        <input name="cmd" type="hidden" value="_s-xclick">
                        <input name="hosted_button_id" type="hidden" value="VRH8WVM7RTD52">
                        <button class="btn"><i class="icon icon-paypal"></i> Faire un don via paypal</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="images/bg/bg2.jpg" data-parallax-ratio="0.7" style="background-image: url({{asset('images/bg/bg2.jpg')}}); background-position: 50% 398px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-smile mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $studentCount }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $studentCount }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Nos membres</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-note2 mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="1000" data-value="{{ $tutorialCount }}"
                            class="animate-number text-white mt-0 font-38 font-weight-500">{{ $tutorialCount }}</h2>
                        <h5 class="text-white text-uppercase mb-0">Nos tutoriels</h5>
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
@endsection
