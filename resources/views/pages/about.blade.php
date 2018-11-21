@extends ('base_layout')
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
    <style>
        h5.about{
            font-size: 20px;
            color: #00d7b3;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h3 class="text-white mt-10">La Cosplay School</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active">La Cosplay School</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img class="pull-left mr-15 thumbnail" src="{{ asset('images/kyokos-art.png') }}" alt="">
                    <h5 class="about">Notre mission</h5>
                    <p>
                        Le cosplay est un hobby de plus en plus populaire au Canada, aux Etats-Unis, en Europe et
                        partout dans le Monde. De nombreuses personnes ont pu découvrir cette activité lors de salons,
                        expositions et conventions, en croisant leurs personnages fictifs préférés; et tant les adultes
                        que les adolescents prennent plaisir à devenir eux aussi “cosplayers” en fabriquant et portant
                        des costumes les plus ressemblants possibles et parfois impressionnants, afin de s’amuser et
                        passer du temps avec leurs amis ou même leur famille ! Le partage et la créativité sont deux
                        termes qui résument parfaitement cette passion originale et amusante, alliant bricolage, art et
                        comédie.
                    </p>
                    <p>
                        Cependant, l’apprenti cosplayer peut être confronté à certaines difficultés, notamment
                        lorsqu’il envisage de créer un costume lui-même; en effet, il existe de nombreux tutoriels
                        sur Internet, mais pas toujours adaptés à ce que l’on veut faire, ou encore mal expliqués; la
                        plupart des tutoriels cosplay sur le web sont proposés en anglais, ce qui peut également être
                        une difficulté pour les passionnés francophones. Suite à ces constats, nous avons souhaité
                        aider les cosplayers de tous niveaux à apprendre de nouvelles choses, grâce à des cosplayers
                        experts dans différents domaines tels que l’artisanat, la couture, le maquillage ou encore la
                        photographie et l’impression 3D.

                    </p>
                    <p>
                        Ce projet d’école est un projet à long-terme, et avant de créer une école physique (ce qui
                        s’apparente à notre rêve), nous avons opté pour l’ouverture d’une plateforme virtuelle,
                        proposant des tutoriels en ligne et en français, complétés par des ateliers physiques organisés
                        grâce à nos partenaires.

                    </p>
                    <div class="clearfix"></div>
                    <h5 class="about">Nos partenaires</h5>
                    <p>La Cosplay School est suivie par des partenaires formidables, tels que DeSerres des Galeries de la Capitale à Québec, SIAL Canada à Montréal, True North Cosplay, PEBEO, et Club Tissus à Québec.</p>
                    <div class="separator separator-rouned">
                        <i class="fa fa-cog fa-spin"></i>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/club-tissus.png') }}" class="img-fullwidth"> </a> </div>
                        <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/deserres.png') }}" class="img-fullwidth"> </a> </div>
                        <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/pebeo.png') }}" class="img-fullwidth"> </a> </div>
                        <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="https://truenorthcosplay.com" target="_blank"> <img alt="..." src="{{ asset('images/true-north-cosplay.png') }}" class="img-fullwidth"> </a> </div>
                        <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/sial.png') }}" class="img-fullwidth"> </a> </div>
                    </div>
                    <div class="separator separator-rouned">
                        <i class="fa fa-cog fa-spin"></i>
                    </div>
                    <h5 class="about">Faire partie de la Cosplay School</h5>
                    <p>
                        Vous avez envie de faire partie de la Cosplay School en tant que partenaire ? Contactez-nous
                        depuis la page <a href="https://www.facebook.com/cosplayschoolqc/" target="_blank" style="color: #00d7b3;">Facebook</a> de l'école !
                        Nous nous ferons une joie d'échanger avec vous concernant un éventuel partenariat.
                    </p>
                    <p>
                        La Cosplay School c'est plus de 1000 visiteurs par mois depuis son ouverture. Vous avez besoin de visibilité pour vos
                        produits ? N'hésitez pas à entrer en contact avec nous afin que nous puissions vous aider à diffuser faire
                        connaître votre marque dans le milieu du Cosplay.
                    </p>
                </div>
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
                        <h5 class="text-white text-uppercase mb-0">Nos professeurs</h5>
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
                        <h3 class="line-bottom">Pourquoi <span class="text-theme-color-2">nous choisir ?</span></h3>
                        <p class="mb-20">La Cosplay School est la première école en ligne de cosplay. Nous avons pour
                            but de révolutionner l'apprentissage du Cosplay, et nous souhaitons démocratiser son apprentissage.</p>
                        <div id="accordion1" class="panel-group accordion">
                            <div class="panel">
                                <div class="panel-title"> <a class="active" data-parent="#accordion1" data-toggle="collapse" href="#accordion11" aria-expanded="true"> <span class="open-sub"></span> Partager ses connaissances</a> </div>
                                <div id="accordion11" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>
                                            Vous avez envie de partager vos connaissances, mais vous n'avez pas envie
                                            d'avoir à gérer un site internet ? Parfait, nous le faisaons pour vous !
                                            Déposez vos tutoriels, organisez vos ateliers, on s'occupent du reste :).
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion12" class="" aria-expanded="true"> <span class="open-sub"></span> Les récompenses d'auteur</a> </div>
                                <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>
                                            Les récompenses d'auteurs vous permettent de recevoir des contreparties
                                            allant de 20$ à 100$ (+ du matériel gratuit). Ces récompenses sont
                                            accessibles grâce à des palliers de publications de tutoriels.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="" aria-expanded="true"> <span class="open-sub"></span> La visibilité</a> </div>
                                <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>En partageant vos tutoriels sur notre site, vous touchez plus de 1 000
                                            personnes par mois. Et ce chiffre ne cesse d'augmenter ! De plus, nous vous
                                            donnons l'occasion de nous accompagner lors des Comic-con afin de présenter
                                            vos oeuvres sur nos tables.</p>
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