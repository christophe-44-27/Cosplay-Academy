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
                        <h3 class="text-white mt-10">La Cosplay School</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active">Récompenses d'auteur</li>
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
                        lorsqu’il envisage de créer un costume lui-même. En effet, il existe de nombreux tutoriels
                        sur Internet, mais pas toujours adaptés à ce que l’on veut faire, ou encore mal expliqués; la
                        plupart des tutoriels cosplay sur le web sont proposés en anglais, ce qui peut également être
                        une difficulté pour les passionnés francophones. Suite à ces constats, nous avons souhaité
                        aider les cosplayers de tous niveaux à apprendre de nouvelles choses, grâce à des cosplayers
                        experts dans différents domaines tels que l’artisanat, la couture, le maquillage ou encore la
                        photographie et l’impression 3D.
                    </p>
                    <p>
                        Nous avons décidé de mettre en place un projet à long terme. Nous souhaitons fédérer une communauté
                        de cosplayeurs, de photographes, et autres professionnels avant de créer une école physique (ce qui
                        s’apparente à notre rêve). Notre plateforme propose des tutoriels en ligne et en français.
                    </p>
                    <div class="clearfix"></div>
                    <h5 class="about">Les récompenses d'auteurs</h5>
                    <p>
                        Faire partie de la Cosplay School c'est cool, mais recevoir des récompenses lorsqu'on publie des
                        tutoriels c'est encore mieux ! Eh oui, vous avez bien lu, nous vous recompensons pour tous les
                        tutoriels publiés sur notre plateforme !
                    </p>
                    <p>
                        Nous sommes conscients du travail conséquent que la création de tutoriels impose, et c'est pour cela
                        que nous avons voulu vous aider en développant ce programme d'auteur. Retrouvez ci-dessous un tableau
                        récapitulant l'ensemble des récompoenses que vous pouvez obtenir par pallier.
                    </p>
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
                </div>
            </div>
        </div>
    </section>
@endsection
