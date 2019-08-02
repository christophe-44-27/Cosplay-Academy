<!DOCTYPE html>
<html lang="fr">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>Plateforme en ligne d'apprentissage du cosplay</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <!-- Zone SEO classique -->
    <meta name="google" content="notranslate"/>

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
</head>
<body>
    <!-- Navbar -->
    @include('partials.navigation.bloc_header_navigation')

    <main class="container" role="main">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Page en cours</li>
            </ol>
        </nav>
        @yield('content')
    </main>
    <!-- end main-content -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="row border-bottom">
                <div class="col-s-6 col-m-2">
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
                <div class="col-s-6 col-m-3">
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
                <div class="col-s-6 col-m-3">
                    <div class="widget dark">
                        <h4 class="widget-title">La communauté</h4>
                        <ul class="list angle-double-right list-border">
                            <li><a href="{{ route('page_program_author') }}">Publier un tutoriel</a></li>
                            <li><a href="{{ route('teachers') }}">Les auteurs de tutoriel</a></li>
                            <li><a href="#">Nos événements</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-s-6 col-m-4">
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
        <div class="container">
            <span class="text-muted">Copyright &copy;2018 L'école du costume | Cosplay School.
                            Tous droits réservés</span>
        </div>
    </footer>
    <!-- Footer -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</body>
<!-- end wrapper -->

<!-- external javascripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@stack('javascripts')
</html>
