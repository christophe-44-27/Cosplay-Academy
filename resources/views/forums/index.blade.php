@extends('base_layout')
@push('stylesheets')
    <style>
        .forum-category-title {
            margin: 20px 0 10px;
            font-size: 1.2em;
            color: #2a2f35;
            font-weight: 700;
        }
        .col-s-12 {
            width: 100%;
        }
        .col-l-4 {
            width: 33.33333% !important;
        }
        .col-m-6 {
            width: 50%;
        }
        .row {
            margin-left: -15px;
            margin-right: -15px;
        }
        .col-l-4, .col-m-6, .col-s-12{
            float: left;
            position: relative;
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
        }
        .forum-bloc-mono {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 10px;
            height: 152px;
            background-color: #fff;
            border-radius: 3px;
            box-shadow: 0 1px 4px hsla(0,0%,73%,.5);
        }
        .forum_count {
            text-align: center;
            color: #9e9e9e;
        }
        .forum {
            font-size: 14px;
        }
        .forum-bloc-mono .forum_name {
            font-weight: 700;
            margin-bottom: 5px;
        }
        .forum_name{
            font-size: 14px;
        }
        .forum-bloc-mono .forum_last {
            height: 36px;
            padding: 0 5px;
            margin-bottom: 10px;
            color: #9e9e9e;
            line-height: 18px;
            overflow: hidden;
        }
        .forum-bloc-mono a:hover img {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        .forum-bloc-mono img {
            display: block;
            width: 75px;
            margin: 0 auto;
            -webkit-transition-duration: .3s;
            transition-duration: .3s;
        }
        .container, .formation-header {
            width: 100%;
            position: relative;
            max-width: 1130px;
            padding-left: 15px;
            padding-right: 15px;
            margin: 0 auto;
        }
        .is-unread .topic_icon {
            color: #404852;
        }
        .table {
            width: 100%;
            border: 1px solid #ededed;
            background-color: #fff;
            text-align: left;
            border-collapse: collapse;
            border-radius: 3px;
            background-clip: padding-box;
            -webkit-box-shadow: 0 4px 4px hsla(0,0%,95%,.56);
            box-shadow: 0 4px 4px hsla(0,0%,95%,.56);
        }
        table {
            border-spacing: 0;
        }
        .table td, .table th {
            padding: 7px 13px;
            border: 1px solid #f1f1f1;
            border-top: none;
            vertical-align: middle;
        }
        .tcenter {
            text-align: center;
        }
        a, tbody, td, tr {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        .forum-bloc-mono {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 10px;
            height: 152px;
        }
        td {
            margin: 0;
            font-size: 100%;
            font: inherit;
        }
    </style>
@endpush()
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-s-12 col-m-6">
                <h2 class="forum-category-title">
                    Les catégories
                </h2>
                <div class="row">
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/htmlcss-4">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/needle.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/htmlcss-4">Couture</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30527">position sticky</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/javascript-7">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/stage-props.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/javascript-7">Accessoires</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30543">[AngularJS] Problème d'installat...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/php-5">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/rug.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/php-5">Artisanat</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/29483">Gmail smtp stop working</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/mysql-6">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/led.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/mysql-6">Electronique</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30380">Installation d'une base Mysql po...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/ruby-8">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/tools.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/ruby-8">Peinture</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30086">Nouvelle question sur la réalisa...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/linux-61">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/blueprint.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/linux-61">Patronnage</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/21281">-jailshell: -jailshell:: command...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-s-12 col-m-6">
                <h2 class="forum-category-title">
                    Les matériaux
                </h2>
                <div class="row">
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/cakephp-10">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/mat.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/cakephp-10">Le foam</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/4295">Upload avatar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/symfony-72">
                                <img height="60" src="{{ asset('images/flaticon-png/forum/mat-worbla.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/symfony-72">Les thermoplastiques</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30540">Problème /admin hébergeur 1&amp;1  </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/laravel-87">
                                    <img height="60" src="{{ asset('images/flaticon-png/forum/clothing.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/laravel-87">Le tissu</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30521">insuffisance d'information sur  ...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/wordpress-9">
                                    <img height="60" src="{{ asset('images/flaticon-png/forum/caulk.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/wordpress-9">La colle</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30541">Assignment Help Australia</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/nodejs-89">
                                    <img height="60" src="{{ asset('images/flaticon-png/forum/spray.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/nodejs-89">La peinture</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30536">Aide discord js lastMessage</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-4">
                        <div class="forum forum-bloc-mono is-unread">
                            <div class="forum_icon"><a href="/forum/ruby-on-rails-88">
                                    <img height="60" src="{{ asset('images/flaticon-png/forum/wig.png') }}" alt="4"></a>
                            </div>
                            <h3 class="forum_name">
                                <a href="/forum/ruby-on-rails-88">Les wigs</a>
                            </h3>
                            <div class="forum_last">
                                <a href="/forum/topics/30524">Souci génération de liens dynami...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-s-12">
                <h2 class="forum-category-title">
                    La Cosplay School
                </h2>
                <table class="table">
                    <tbody>
                    <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="#">
                                <h3 class="forum_title">
                                    Suggestion d'améliorations pour le site
                                </h3>
                                <div class="s-hidden">
                                    Des suggestions, des idées pour améliorer le site ?
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            599
                        </td>
                        <td class="forum_last" width="300">
                            <a href="#">Améliorer un site web</a><em><span class="js-vue"><abbr class="timeago">Il y a 2 mois</abbr></span></em>
                        </td>
                    </tr>
                    <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/proposition-de-tutoriels-57">
                                <h3 class="forum_title">
                                    Proposition de tutoriels
                                </h3>
                                <div class="s-hidden">
                                    Une idée de tutoriel intéréssant ?
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            924
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/12157">AngularJS and Firebase</a><em><span class="js-vue"><abbr class="timeago">Il y a 5 ans</abbr></span></em>
                        </td>
                    </tr>
                    <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/proposer-une-video-78">
                                <h3 class="forum_title">
                                    Proposer une vidéo
                                </h3>
                                <div class="s-hidden">
                                    Vous avez envie de montrer vos tutoriels vidéo et de partager vos connaissances ?
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            68
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/29945">Programmation Réactive Fonctionnelle:...</a><em><span class="js-vue"><abbr class="timeago">Il y a 4 mois</abbr></span></em>
                        </td>
                    </tr>
                    <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/offres-demploi-79">
                                <h3 class="forum_title">
                                    Offres de commissions
                                </h3>
                                <div class="s-hidden">
                                    Vous cherchez des cosplayeurs ?
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            310
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/29740">Montpellier, Développeur Front JS</a><em><span class="js-vue"><abbr class="timeago">Il y a 6 mois</abbr></span></em>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-s-12">
                <h2 class="forum-category-title">
                    La taverne
                </h2>
                <table class="table">
                    <tbody><tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/formation-60">
                                <h3 class="forum_title">
                                    Formation
                                </h3>
                                <div class="s-hidden">
                                    Une question ou avis de donner votre avis sur vos études / votre formation ?
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            223
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/30542">O'clock</a><em><span class="js-vue"><abbr class="timeago">Il y a 14 heures</abbr></span></em>
                        </td>
                    </tr>
                    <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/vos-creations-2">
                                <h3 class="forum_title">
                                    Vos créations
                                </h3>
                                <div class="s-hidden">
                                    Vous avez créé un joli site avec les tutoriels et vous cherchez des avis et des remarques ?
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            680
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/22503">[Jeux Navigateur] Expédition-Wars</a><em><span class="js-vue"><abbr class="timeago">Il y a 3 ans</abbr></span></em>
                        </td>
                    </tr>
                    <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/jeux-videos-55">
                                <h3 class="forum_title">
                                    Jeux Vidéos
                                </h3>
                                <div class="s-hidden">
                                    Pour qu'on puisse se retrouver sur des jeux en ligne
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            72
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/30388">Vos jeux préférés</a><em><span class="js-vue"><abbr class="timeago">Il y a environ un mois</abbr></span></em>
                        </td>
                    </tr>
                    <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/divers-33">
                                <h3 class="forum_title">
                                    Divers
                                </h3>
                                <div class="s-hidden">
                                    Pour parler de tout mais surtout de rien
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            951
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/29291">Faire des vidéos</a><em><span class="js-vue"><abbr class="timeago">Il y a 8 mois</abbr></span></em>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-s-12">
                <h2 class="forum-category-title">
                    Les questions - Logiciels
                </h2>
                <table class="table">
                    <tbody>
                        <tr class="forum is-unread">
                        <td class="tcenter" width="50">
                            <i class="icon topic_icon"></i>
                        </td>
                        <td>
                            <a href="/forum/les-ide-63">
                                <h3 class="forum_title">
                                    Les IDE
                                </h3>
                                <div class="s-hidden">
                                    Développez avec classe
                                </div></a>
                        </td>
                        <td class="forum_count" width="40">
                            325
                        </td>
                        <td class="forum_last" width="300">
                            <a href="/forum/topics/30520">Make a sweet Memory of Honeymoon in N...</a><em><span class="js-vue"><abbr class="timeago">Il y a 6 jours</abbr></span></em>
                        </td>
                    </tr>
                        <tr class="forum is-unread">
                            <td class="tcenter" width="50">
                                <i class="icon topic_icon"></i>
                            </td>
                            <td>
                                <a href="/forum/photoshop-12">
                                    <h3 class="forum_title">
                                        Photoshop
                                    </h3>
                                    <div class="s-hidden">

                                    </div></a>
                            </td>
                            <td class="forum_count" width="40">
                                134
                            </td>
                            <td class="forum_last" width="300">
                                <a href="/forum/topics/29390">wacom or photoshop issue ?</a><em><span class="js-vue"><abbr class="timeago">Il y a 8 mois</abbr></span></em>
                            </td>
                        </tr>
                        <tr class="forum is-unread">
                            <td class="tcenter" width="50">
                                <i class="icon topic_icon"></i>
                            </td>
                            <td>
                                <a href="/forum/illustrator-16">
                                    <h3 class="forum_title">
                                        Illustrator
                                    </h3>
                                    <div class="s-hidden">

                                    </div></a>
                            </td>
                            <td class="forum_count" width="40">
                                104
                            </td>
                            <td class="forum_last" width="300">
                                <a href="/forum/topics/30116">vectorisation de contour</a><em><span class="js-vue"><abbr class="timeago">Il y a 3 mois</abbr></span></em>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
