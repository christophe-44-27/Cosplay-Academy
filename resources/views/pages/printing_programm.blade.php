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
                    <h2 class="title mb-5">Service d'impression 3D</h2>
                    <p>
                        Vous avez besoin de réaliser un projet en 3D et vous cherchez un service d'impression 3D ? Ne cherchez plus,
                        nous mettons à votre disposition nos imprimantes 3D (CR10-S) afin de vous permettre de mettre vos
                        idées en relief.
                    </p>
                    <p>
                        Nos imprimantes ont la possibilité d'imprimer dans un format de 30cm x 30cm x 40cm de hauteur.
                    </p>
                </div>
                <div class="col-md-12">
                    <h2 class="title mb-5">Comment faire ?</h2>
                    <p>
                        Vous avez la possibilité de nous faire parvenir votre fichier 3D (Format .STL / .OBJ) par courriel
                        à l'adresse contact@cosplayschool.ca, ou bien par le biais de la page Facebook.
                    </p>
                    <p>
                        Une fois votre fichier 3D reçu nous évaluerons les coûts associés et nous vous remettrons deux devis
                        papier vous indiquant le prix global de l'impression.
                        <br>
                        Il faut savoir que le prix va varier en fonction du nombre d'heures d'impressions. Ce nombre d'heure
                        varie quant à lui en fonction de la qualité de l'impression. Nous allons imprimer des objets avec une précision
                        de 0.1 à 0.3mm (0.3mm étant moins précis que 0.1mm).
                        <br>
                        A cela il faut rajouter le taux de remplissage de l'impression (quantité de filament mis entre les parois de l'objet).
                        Nous imprimons avec des taux de remplissage compris entre 30 et 50%. Plus le taux de remplissage est élevé, plus l'objet sera
                        lourd (Pensez-y si vous faites des armures !) et solide. Nous ne descendrons pas en dessous de
                        30% afin que l'objet garde sa solidité.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
