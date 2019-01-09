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
        #fdw-pricing-table {
            margin:0 auto;
            text-align: center;
            width: 928px; /* total computed width */
            zoom: 1;
        }

        #fdw-pricing-table:before, #fdw-pricing-table:after {
            content: "";
            display: table
        }

        #fdw-pricing-table:after {
            clear: both
        }

        /* --------------- */

        #fdw-pricing-table .plan {
            font: 13px 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;
            background: #fff;
            border: 1px solid #ddd;
            color: #333;
            padding: 20px;
            width: 175px;
            float: left;
            _display: inline; /* IE6 double margin fix */
            position: relative;
            margin: 0 5px;
            -moz-box-shadow: 0 2px 2px -1px rgba(0,0,0,.3);
            -webkit-box-shadow: 0 2px 2px -1px rgba(0,0,0,.3);
            box-shadow: 0 2px 2px -1px rgba(0,0,0,.3);
        }

        #fdw-pricing-table .plan:after {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 10px;
            right: 4px;
            width: 80%;
            top: 80%;
            -webkit-box-shadow: 0 12px 5px rgba(0, 0, 0, .3);
            -moz-box-shadow: 0 12px 5px rgba(0, 0, 0, .3);
            box-shadow: 0 12px 5px rgba(0, 0, 0, .3);
            -webkit-transform: rotate(3deg);
            -moz-transform: rotate(3deg);
            -o-transform: rotate(3deg);
            -ms-transform: rotate(3deg);
            transform: rotate(3deg);
        }

        #fdw-pricing-table .popular-plan {
            top: -20px;
            padding: 40px 20px;
        }

        /* --------------- */

        #fdw-pricing-table .header {
            position: relative;
            font-size: 20px;
            font-weight: normal;
            text-transform: uppercase;
            padding: 40px;
            margin: -20px -20px 20px -20px;
            border-bottom: 8px solid;
            background-color: #eee;
            background-image: -moz-linear-gradient(#fff,#eee);
            background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
            background-image: -webkit-linear-gradient(#fff, #eee);
            background-image: -o-linear-gradient(#fff, #eee);
            background-image: -ms-linear-gradient(#fff, #eee);
            background-image: linear-gradient(#fff, #eee);
        }

        #fdw-pricing-table .header:after {
            position: absolute;
            bottom: -8px; left: 0;
            height: 3px; width: 100%;
            content: '';
            background-image: url(images/bar.png);
        }

        #fdw-pricing-table .popular-plan .header {
            margin-top: -40px;
            padding-top: 60px;
        }

        #fdw-pricing-table .plan1 .header{
            border-bottom-color: #B3E03F;
        }

        #fdw-pricing-table .plan2 .header{
            border-bottom-color: #7BD553;
        }

        #fdw-pricing-table .plan3 .header{
            border-bottom-color: #3AD5A0;
        }

        #fdw-pricing-table .plan4 .header{
            border-bottom-color: #45D0DA;
        }

        /* --------------- */

        #fdw-pricing-table .price{
            font-size: 45px;
        }

        #fdw-pricing-table .monthly{
            font-size: 13px;
            margin-bottom: 20px;
            text-transform: uppercase;
            color: #999;
        }

        /* --------------- */

        #fdw-pricing-table ul {
            margin: 20px 0;
            padding: 0;
            list-style: none;
        }

        #fdw-pricing-table li {
            padding: 10px 0;
        }

        /* --------------- */

        #fdw-pricing-table .signup {
            position: relative;
            padding: 10px 20px;
            color: #fff;
            font: bold 14px Arial, Helvetica;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            background-color: #72ce3f;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            text-shadow: 0 -1px 0 rgba(0,0,0,.15);
            opacity: .9;
        }

        #fdw-pricing-table .signup:hover {
            opacity: 1;
        }

        #fdw-pricing-table .signup:active {
            -moz-box-shadow: 0 2px 2px rgba(0,0,0,.3) inset;
            -webkit-box-shadow: 0 2px 2px rgba(0,0,0,.3) inset;
            box-shadow: 0 2px 2px rgba(0,0,0,.3) inset;
        }

        #fdw-pricing-table .plan1 .signup{
            background: #B3E03F;
        }

        #fdw-pricing-table .plan2 .signup{
            background: #7BD553;
        }

        #fdw-pricing-table .plan3 .signup{
            background: #3AD5A0;
        }

        #fdw-pricing-table .plan4 .signup{
            background: #45D0DA;
        }

        /* end --------------- */
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
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div id="fdw-pricing-table">
                                <div class="plan plan1">
                                    <div class="price">5</div>
                                    <div class="monthly">tutoriels</div>
                                    <ul>
                                        <li><b>20$ </b> Carte cadeaux</li>
                                    </ul>
                                </div>
                                <div class="plan plan2">
                                    <div class="price">10</div>
                                    <div class="monthly">tutoriels</div>
                                    <ul>
                                        <li><b>50$ </b> Carte cadeaux</li>
                                    </ul>
                                </div>
                                <div class="plan plan3">
                                    <div class="price">20</div>
                                    <div class="monthly">tutoriels</div>
                                    <ul>
                                        <li><b>45$ </b> Carte cadeaux</li>
                                        <li><b>1</b> plaque de Worbla (Taille S)</li>
                                    </ul>
                                </div>
                                <div class="plan plan4">
                                    <div class="price">30</div>
                                    <div class="monthly">tutoriels</div>
                                    <ul>
                                        <li><b>60$ </b> Carte cadeaux</li>
                                        <li><b>1</b> plaque de Worbla (Taille M)</li>
                                        <li><b>1</b> plaque de Mousse EVA 10mm</li>
                                    </ul>
                                </div>
                                <div class="plan plan4">
                                    <div class="price">35</div>
                                    <div class="monthly">tutoriels</div>
                                    <ul>
                                        <li><b>60$ </b> Carte cadeaux</li>
                                        <li><b>1</b> plaque de Worbla</li>
                                        <li><b>1</b> plaque de Mousse EVA 10mm</li>
                                        <li><b>1</b> plaque de Mousse EVA 5mm</li>
                                        <li><b>1</b> plaque de Mousse EVA 2mm</li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <p>
                                Vous habitez en Europe ou vous êtes hors du Canada ? Vous pouvez tout-de-même participer ! :D Elle est pas belle la vie ?
                                Tadada da daaaa.
                            </p>
                        </div>
                    </div>
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
