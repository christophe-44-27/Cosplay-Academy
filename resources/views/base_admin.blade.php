<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

    <link href="{{ asset('themes/administration/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/administration/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/administration/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/administration/css/skins/_all-skins.css') }}" rel="stylesheet" type="text/css">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>Espace d'administration</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('admin_homepage') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>C</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Cosplay</b>School</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Cosplay School</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Navbar -->
        @include('partials.navigation.sidemenu-admin')
        <!-- /Navbar -->

        <!-- Start main-content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- end main-content -->

    <!-- Footer -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
</div>
</body>
<!-- end wrapper -->

<!-- external javascripts -->
<script src="{{ asset('themes/administration/js/jquery.min.js') }}"></script>
<script src="{{ asset('themes/administration/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('themes/administration/js/boostrap.min.js') }}"></script>
<script src="{{ asset('themes/administration/js/adminlte.min.js') }}"></script>
<script src="{{ asset('themes/administration/js/dashboard2.js') }}"></script>

<!-- NOTIFICATIONS FLASH -->
@include('partials.notifications')
<!-- /NOTIFICATIONS FLASH -->
@stack('javascripts')
</html>
