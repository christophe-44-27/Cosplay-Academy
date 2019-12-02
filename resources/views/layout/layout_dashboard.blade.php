<!DOCTYPE html>
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Cosplay Academy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-color.css') }}" id="colors">
    @stack('stylesheets')
    @notify_css
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
                <div class="left-side">
                    <div id="logo">

                        <a href="https://listeo.pro/" title="Listeo" rel="home"><img src="https://listeo.pro/wp-content/uploads/2019/02/logo.png" data-rjs="" alt="Listeo"></a>
                        <a href="https://listeo.pro/" class="dashboard-logo" title="Listeo" rel="home"><img src="https://listeo.pro/wp-content/uploads/2019/02/logo2.png" data-rjs="https://listeo.pro/wp-content/uploads/2019/02/logo2.png" alt="Listeo"></a>
                    </div>


                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger ">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>


                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive" class="menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-20 parentid0 depth0 dropdown">
                                <a href="{{ route('homepage') }}" class="button border with-icon">Vue participant</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">

                        <!-- User Menu -->
                        <div class="user-menu">
                            <div class="user-name">
                                <span>
                                    @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="">
                                    @else
                                        <img src="{{ asset('themes/frontend/images/users/default.jpg') }}" alt="">
                                    @endif
                                </span>
                                Mon compte
                            </div>
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="sl sl-icon-power"></i> Déconnexion
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a href="{{ route('professor_course_new') }}" class="button border with-icon">Ajouter un cours <i
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
            @yield('content')
        </div>
        <!-- Content / End -->
    </div>
    <!-- Dashboard / End -->
</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
@notify_js
@notify_render
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
