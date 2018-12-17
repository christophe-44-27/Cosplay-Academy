<!DOCTYPE html>
<html lang="fr">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="{{ asset('css/menuzord-skins/menuzord-rounded-boxed.css') }}"
          rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="{{ asset('css/style-main.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | For Dark Layout -->
    <link href="{{ asset('css/style-main-dark.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!--<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">-->

    <!-- CSS | Theme Color -->
    <link href="{{ asset('css/colors/theme-skin-color-set-1.css') }}" rel="stylesheet" type="text/css">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>Plateforme en ligne d'apprentissage du cosplay</title>
    <meta name="keywords"
          content="Cosplay School, Cosplay, cosplay, school, ecole, loisir, apprentissage, videos, tutoriels, cours, ateliers, workshops, courses">
    <meta name="google" content="notranslate"/>
    <meta name="description"
          content="Grâce à la Cosplay School, l'apprentissage du Cosplay n'aura jamais été aussi simple ! Rejoignez-nous !"/>

    <meta property="fb:app_id" content="#"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="#"/>
    <meta property="og:title" content="La Cosplay School">
    <meta property="og:description"
          content="Grâce à la Cosplay School, l'apprentissage du Cosplay n'aura jamais été aussi simple ! Rejoignez-nous !">
    <meta property="og:image" content="">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2&appId=526252497733390&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    @stack('google_analytic')
    @stack('stylesheets')
    @stack('facebook_seo')
    <!--Start of Zendesk Chat Script-->
    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="https://v2.zopim.com/?6B8NUcuXh0h2AhkY7JbkqkkpXUmSU8GM";z.t=+new Date;$.
                type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zendesk Chat Script-->
</head>
<body class="lighter">
    <div id="wrapper" class="clearfix">
    <!-- Navbar -->
    @include('partials.navigation.bloc_header_navigation')
    <!-- /Navbar -->

    <!-- Start main-content -->
    <div class="main-content">
        @yield('content')
    </div>
    <!-- end main-content -->

    <!-- Footer -->
    <footer id="footer" class="footer divider layer-overlay overlay-dark-9" data-bg-img="{{ asset('images/cosplay-school-bg-.png') }}">
        <div class="container">
            <div class="row border-bottom">
                <div class="col-sm-6 col-md-2">
                    <div class="widget dark">
                        <h5 class="widget-title mb-10">Restons en contact !</h5>
                        <ul class="styled-icons icon-bordered icon-sm">
                            <li><a href="https://www.facebook.com/cosplayschoolqc" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/cosplay_school"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC6z6mnYwoyjHhJ3GlJYyESg"><i
                                            class="fa fa-youtube"></i></a></li>
                            <li><a href="https://www.instagram.com/cosplayschool/"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title">L'entreprise</h4>
                        <ul class="list angle-double-right list-border">
                            <li><a href="{{ route('page_about') }}">Qui sommes-nous ?</a></li>
                            <li><a href="{{ route('page_policy') }}">Politique de confidentialité</a></li>
                            <li><a href="{{ route('page_cgu') }}">Conditions générales d'utilisation</a></li>
                            <li><a href="{{ route('page_contact') }}">Contactez-nous !</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title">La communauté</h4>
                        <ul class="list angle-double-right list-border">
                            <li><a href="{{ route('page_program_author') }}">Publier un tutoriel</a></li>
                            <li><a href="{{ route('teachers') }}">Les auteurs de tutoriel</a></li>
                            <li><a href="#">Nos événements</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="widget-dark">
                        <div class="fb-page" data-href="https://www.facebook.com/cosplayschoolqc/"
                             data-tabs="timeline" data-height="400" data-small-header="false" data-adapt-container-width="true"
                             data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/cosplayschoolqc/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/cosplayschoolqc/">Cosplay School</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-black-333">
            <div class="container pt-20 pb-20">
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-11 text-black-777 m-0">Copyright &copy;2018 L'école du costume | Cosplay School.
                            Tous droits réservés</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
</body>
<!-- end wrapper -->

<!-- external javascripts -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- NOTIFICATIONS FLASH -->
@include('partials.notifications')
<!-- /NOTIFICATIONS FLASH -->
@stack('javascripts')
<script>
    $('document').ready(function () {
        $("#user-notifications").click(function () {
            $.ajax({
                url: "#",
                data: {},
                method: "POST",
                success: function () {
                    setTimeout(function () {
                        $('#notifications-list').html(
                            '        <li class="dropdown-item">' +
                            '            <p>Vous n\'avez aucune nouvelle notification.</p>' +
                            '            <a href="dashboard-notifications.html" class="button primary">View all Notifications</a>' +
                            '        </li>');
                        $('#count-notification').html('0');
                    }, 10000);
                }
            });
        });
    });
</script>
</html>
