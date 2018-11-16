<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Formulaire de connexion ‎- Cosplay School</title>

        <link rel="shortcut icon" type="image/png" sizes="96x96"
              href="{{ asset('themes/frontend/images/favicon-96x96.png') }}">
        <meta name="keywords" content="cosplay, cosplay school, learn, school, tutoriel, tutorial, video, apprendre, rencontrer
        , s'amuser, application mobile" />
        <meta name="description"
              content="Grâce à la Cosplay School l'apprentissage du Cosplay n'aura jamais été aussi simple !" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet" />
        <!-- CSS | menuzord megamenu skins -->
        <link id="menuzord-menu-skins" href="{{ asset('css/menuzord-skins/menuzord-rounded-boxed.css') }}" rel="stylesheet" />
        <!-- CSS | Main style file -->
        <link href="{{ asset('css/style-main.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"> -->
        <!-- CSS | Preloader Styles -->
        <link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Theme Color -->
        <link href="{{ asset('css/colors/theme-skin-color-set-1.css') }}" rel="stylesheet" type="text/css">

        <!-- external javascripts -->
        <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- JS | jquery plugin collection for this theme -->
        <script src="{{ asset('js/jquery-plugin-collection.min.js')}}'"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
    <!-- start main-content -->
    <div id="wrapper" class="clearfix">
        <div class="main-content">
            @yield('content')
        </div>
        <!-- Footer -->
        <footer id="footer" class="footer text-center bg-lighter">
            <div class="container pt-10 pb-10">
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-0">Copyright &copy;2018 L'école du costume | Cosplay School. Tous droits réservés</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- JS | Custom script for all pages -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    </body>
</html>