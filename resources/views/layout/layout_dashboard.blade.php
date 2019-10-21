<!DOCTYPE html>
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Listeo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-color.css') }}" id="colors">
    @stack('stylesheets')
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container
    ================================================== -->
    <header id="header-container" class="fixed fullwidth dashboard">
        <!-- Header -->
        <div id="header" class="not-sticky">
            <div class="container">
                <!-- Left Side Content -->
                <div class="left-side">
                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{ route('professor_dashboard') }}"><img src="{{ asset('images/logo-big-cs.png') }}" alt=""></a>
                        <a href="{{ route('professor_dashboard') }}" class="dashboard-logo"><img src="images/logo2.png" alt=""></a>
                    </div>

                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                        </button>
                    </div>

                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">

                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Les tutoriels</a></li>
                            <li><a href="#">La communauté</a></li>
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">

                        <!-- User Menu -->
                        <div class="user-menu">
                            <div class="user-name"><span><img src="images/dashboard-avatar.jpg" alt=""></span>Mon compte
                            </div>
                            <ul>
                                <li><a href="{{ route('professor_dashboard') }}"><i class="sl sl-icon-settings"></i> Tableau de bord</a></li>
                                <li><a href="#"><i class="sl sl-icon-envelope-open"></i> Messages</a>
                                </li>
                                <li><a href="#"><i class="fa fa-calendar-check-o"></i>
                                        Mes tutoriels</a></li>
                                <li><a href="{{ route('logout') }}"><i class="sl sl-icon-power"></i> Déconnexion</a></li>
                            </ul>
                        </div>

                        <a href="{{ route('professor_course_new') }}" class="button border with-icon">Ajouter un tutoriel <i
                                class="sl sl-icon-plus"></i></a>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->


    <!-- Dashboard -->
    <div id="dashboard">

        <!-- Navigation
        ================================================== -->
        @include('elements.navigation.dashboard_sidebar_navigation')
        <!-- Navigation / End -->

        <!-- Content
        ================================================== -->
        <div class="dashboard-content">

            <!-- Titlebar -->
            <div id="titlebar">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Dashboard</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>



            @yield('content')

        </div>
        <!-- Content / End -->


    </div>
    <!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('scripts/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/jquery-migrate-3.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('scripts/custom.js') }}"></script>

@stack('javascripts')

</body>
</html>
