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
                        <a href="{{ route('dashboard_homepage') }}"><img src="{{ asset('images/logo-big-cs.png') }}" alt=""></a>
                        <a href="{{ route('dashboard_homepage') }}" class="dashboard-logo"><img src="images/logo2.png" alt=""></a>
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
                                <li><a href="{{ route('dashboard_homepage') }}"><i class="sl sl-icon-settings"></i> Tableau de bord</a></li>
                                <li><a href="#"><i class="sl sl-icon-envelope-open"></i> Messages</a>
                                </li>
                                <li><a href="#"><i class="fa fa-calendar-check-o"></i>
                                        Mes tutoriels</a></li>
                                <li><a href="{{ route('logout') }}"><i class="sl sl-icon-power"></i> Déconnexion</a></li>
                            </ul>
                        </div>

                        <a href="#" class="button border with-icon">Ajouter un tutoriel <i
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
                        <h2>Howdy, Tom!</h2>
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

            <!-- Notice -->
            <div class="row">
                <div class="col-md-12">
                    <div class="notification success closeable margin-bottom-30">
                        <p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
                        <a class="close" href="#"></a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="row">

                <!-- Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-stat color-1">
                        <div class="dashboard-stat-content"><h4>6</h4> <span>Active Listings</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
                    </div>
                </div>

                <!-- Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-stat color-2">
                        <div class="dashboard-stat-content"><h4>726</h4> <span>Total Views</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
                    </div>
                </div>


                <!-- Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-stat color-3">
                        <div class="dashboard-stat-content"><h4>95</h4> <span>Total Reviews</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
                    </div>
                </div>

                <!-- Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-stat color-4">
                        <div class="dashboard-stat-content"><h4>126</h4> <span>Times Bookmarked</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
                    </div>
                </div>
            </div>


            <div class="row">

                <!-- Recent Activity -->
                <div class="col-lg-6 col-md-12">
                    <div class="dashboard-list-box with-icons margin-top-20">
                        <h4>Recent Activities</h4>
                        <ul>
                            <li>
                                <i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a href="#">Hotel
                                        Govendor</a></strong> has been approved!
                                <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                            </li>

                            <li>
                                <i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review
                                <div class="numerical-rating" data-rating="5.0"></div>
                                on <strong><a href="#">Burger House</a></strong>
                                <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                            </li>

                            <li>
                                <i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a
                                        href="#">Burger House</a></strong> listing!
                                <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                            </li>

                            <li>
                                <i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review
                                <div class="numerical-rating" data-rating="3.0"></div>
                                on <strong><a href="#">Airport</a></strong>
                                <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                            </li>

                            <li>
                                <i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a
                                        href="#">Burger House</a></strong> listing!
                                <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                            </li>

                            <li>
                                <i class="list-box-icon sl sl-icon-star"></i> John Doe left a review
                                <div class="numerical-rating" data-rating="4.0"></div>
                                on <strong><a href="#">Burger House</a></strong>
                                <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                            </li>

                            <li>
                                <i class="list-box-icon sl sl-icon-star"></i> Jack Perry left a review
                                <div class="numerical-rating" data-rating="2.5"></div>
                                on <strong><a href="#">Tom's Restaurant</a></strong>
                                <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Invoices -->
                <div class="col-lg-6 col-md-12">
                    <div class="dashboard-list-box invoices with-icons margin-top-20">
                        <h4>Invoices</h4>
                        <ul>

                            <li><i class="list-box-icon sl sl-icon-doc"></i>
                                <strong>Professional Plan</strong>
                                <ul>
                                    <li class="unpaid">Unpaid</li>
                                    <li>Order: #00124</li>
                                    <li>Date: 20/07/2019</li>
                                </ul>
                                <div class="buttons-to-right">
                                    <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                </div>
                            </li>

                            <li><i class="list-box-icon sl sl-icon-doc"></i>
                                <strong>Extended Plan</strong>
                                <ul>
                                    <li class="paid">Paid</li>
                                    <li>Order: #00108</li>
                                    <li>Date: 14/07/2019</li>
                                </ul>
                                <div class="buttons-to-right">
                                    <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                </div>
                            </li>

                            <li><i class="list-box-icon sl sl-icon-doc"></i>
                                <strong>Extended Plan</strong>
                                <ul>
                                    <li class="paid">Paid</li>
                                    <li>Order: #00097</li>
                                    <li>Date: 10/07/2019</li>
                                </ul>
                                <div class="buttons-to-right">
                                    <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                </div>
                            </li>

                            <li><i class="list-box-icon sl sl-icon-doc"></i>
                                <strong>Basic Plan</strong>
                                <ul>
                                    <li class="paid">Paid</li>
                                    <li>Order: #00091</li>
                                    <li>Date: 30/06/2019</li>
                                </ul>
                                <div class="buttons-to-right">
                                    <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>


                <!-- Copyrights -->
                <div class="col-md-12">
                    <div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
                </div>
            </div>

        </div>
        <!-- Content / End -->


    </div>
    <!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/waypoints.min.js"></script>
<script type="text/javascript" src="scripts/counterup.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


</body>
</html>
