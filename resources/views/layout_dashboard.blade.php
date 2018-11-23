<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="{{ asset('themes/dashboard/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/dashboard/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/dashboard/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/dashboard/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        @stack('stylesheets')
        <!-- favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <title>Cosplay School | Mon tableau de bord</title>
    </head>
    <body>
        <!-- SIDE MENU -->
        @include('partials.dashboard.side_menu')
        <!-- /SIDE MENU -->

        @yield('content')

        <div class="shadow-film closed"></div>

        <!-- SVG ARROW -->
        <svg style="display: none;">
            <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
                <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
                    L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
            </symbol>
        </svg>
        <!-- /SVG ARROW -->

        <!-- SVG PLUS -->
        <svg style="display: none;">
            <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
                <rect x="5" width="3" height="13"/>
                <rect y="5" width="13" height="3"/>
            </symbol>
        </svg>
        <!-- /SVG PLUS -->

        <!-- SVG MINUS -->
        <svg style="display: none;">
            <symbol id="svg-minus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
                <rect y="5" width="13" height="3"/>
            </symbol>
        </svg>
        <!-- /SVG MINUS -->
        <!-- jQuery -->
        <script
            src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Side Menu -->
        <script src="{{ asset('themes/dashboard/js/side-menu.js') }}"></script>
        <!-- User Quickview Dropdown -->
        <script src="{{ asset('themes/dashboard/js/user-board.js') }}"></script>
        <script src="{{ asset('themes/dashboard/js/dashboard-header.js') }}"></script>
        @stack('javascripts')

        @include('partials.notifications')
    </body>
</html>
