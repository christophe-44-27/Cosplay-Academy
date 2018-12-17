@extends('base_layout')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('themes/frontend/plugins/carousel-grafikart/css/main.css') }}" />
    <style>
        h5.about{
            font-size: 20px;
            color: #00d7b3;
            font-weight: bold;
        }
        .partners {
            width: 1000px;
            height:150px;
            margin:0 auto;
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
                        <h3 class="text-white mt-10">Publier un tutoriel</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active">Publier un tutoriel</li>
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
                    <h2 class="title mb-5">Qu'est-ce que la Cosplay School ?</h2>
                    <p>
                        La Cosplay School est une plateforme d'entraide dans le domaine du cosplay. Cette plateforme
                        francophone vous permet de trouver de nombreux tutoriels en Français afin de parfaire vos
                        compétences de cosplayeur(se). Notre objectif est d'aider la communauté des cosplayeurs à
                        croître et à améliorer ses compétences dans des domaimes comme la couture, la peinture,
                        l'artisanat, l'électronique, etc.
                    </p>
                    <p>
                        Sur notre site internet, vous allez pouvoir trouver des cours et tutoriels, vidéos ou
                        écrits. Nous souhaitons également organiser des lives, des ateliers, et tout autre événement vous
                        permettant d'améliorer vos compétences.
                        <br>
                        Nous voulons faire de la Cosplay School, le lieu de référence dans l'apprentissage du cosplay.
                        Mais nous ne pouvons pas faire ça sans vous. Ensemble, travaillons fort à faire connaître le
                        cosplay au Québec et partout ailleurs.
                        <br>
                        <br>
                        Vous allez nous dire qu'il existe déjà un très grand nombre de tutoriels sur des plateformes comme
                        YouTube par exemple, et vous vous demandez sûrement ce que la Cosplay School va apporter
                        de nouveau ?
                        <br>
                        <br>
                        Nous voulons que le contenu présent sur la Cosplay School soit de la meilleure qualité possible,
                        que ce soit grâce aux explications, aux vidéos, aux photos ou encore grâce aux documents
                        joints comme les patrons.
                        <br>
                        Les tutoriels offerts par la communauté seront contrôlés par des modérateurs choisis en
                        fonction de leurs compétences. Ainsi, lorsque vous, auteur, vous allez publier un cours, celui-ci
                        pourra être modéré par un modérateur du site, afin que vous puissiez le compléter.
                        <br>
                    </p>
                </div>
                <div class="col-md-12">
                    <h2 class="title mb-5">Quels sont les avantages à partager mon tutoriel sur votre site ?</h2>
                    <p>
                        Publier votre tutoriel sur notre site, c'est avant tout aider la communauté de la Cosplay School
                        à grandir, tout en permettant aux cosplayeurs d'apprendre de nouvelles choses.
                        <br>
                        <br>
                        Bien sûr ce n'est pas tout. Lorsque vous publiez un tutoriel, un compteur augmente vous permettant
                        d'obtenir des récompenses suite à vos publications. Chaque pallier vous permet de recevoir des
                        cartes cadeaux ou du matériel gratuitement. Elle est pas belle la vie ? (Tadada dadaaaaa)
                    </p>
                </div>
                <div class="col-md-12">
                    <h2 class="title mb-5">Exemples de récompenses d'auteur</h2>
                    <p>Chaque tutoriel, ou cours doit être mis en ligne afin d'être comptabilisé dans votre total
                        de contenu.</p>
                    <!-- POST ITEM LIST -->
                    <ul class="list theme-colored check">
                        <li>
                            Premier pallier de récompense (5 contenus) : Carte cadeaux de 20$
                        </li>
                        <li>
                            Second pallier de récompense (10 contenus) : Carte cadeaux de 50$
                        </li>
                        <li>
                            Troisième pallier de récompense (25 contenus) : Carte cadeaux de 50$ + une plaque de Worbla taille S.
                        </li>
                        <li>
                            Quatrième pallier de récompense (40 contenus) : Carte cadeaux de 60$ + une plaque de Worbla taille M.
                        </li>
                        <li>
                            Cinquième pallier de récompense (60 contenus et +) : Carte cadeaux de 100$ + une plaque de Worbla taille XL.
                        </li>
                    </ul>
                    <!-- POST ITEM LIST -->
                    <p><small><em>(Les palliers ne sont accessibles qu'une fois.)</em></small></p>
                </div>
            </div>
            <h5 class="about">Nos partenaires</h5>
            <p>La Cosplay School est suivie par des partenaires formidables, tels que DeSerres des Galeries de la Capitale à Québec, SIAL Canada à Montréal, True North Cosplay, PEBEO, et Club Tissus à Québec.</p>
            <div class="separator separator-rouned">
                <i class="fa fa-cog fa-spin"></i>
            </div>
            <div class="row">
                <div class="partners">
                    <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="https://www.clubtissus.com/" target="_blank"> <img alt="Logo Club Tissus" src="{{ asset('images/club-tissus.png') }}" class="img-fullwidth"> </a> </div>
                    <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="https://www.deserres.ca/fr/" target="_blank"> <img alt="Logo DeSerres" src="{{ asset('images/deserres.png') }}" class="img-fullwidth"> </a> </div>
                    <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="http://www.pebeo.com/Pebeo" target="_blank"> <img alt="Logo Pebeo" src="{{ asset('images/pebeo.png') }}" class="img-fullwidth"> </a> </div>
                    <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="https://truenorthcosplay.com" target="_blank"> <img alt="..." src="{{ asset('images/true-north-cosplay.png') }}" class="img-fullwidth"> </a> </div>
                    <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="https://www.sial-canada.com/" target="_blank"> <img alt="Logo SIAL" src="{{ asset('images/sial.png') }}" class="img-fullwidth"> </a> </div>
                    <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#" target="_blank"> <img alt="" src="{{ asset('images/you.png') }}" class="img-fullwidth"> </a> </div>
                </div>
            </div>
            <div class="separator separator-rouned">
                <i class="fa fa-cog fa-spin"></i>
            </div>
        </div>
    </section>
@endsection
