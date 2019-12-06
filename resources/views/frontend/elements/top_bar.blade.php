<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                <div class="top-bar-left d-flex">
                    <div class="clearfix">
                        <ul class="socials">
                            <li>
                                <a class="social-icon text-dark" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="social-icon text-dark" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix">
                        <ul class="contact">
                            <li class="dropdown mr-5">
                                <a href="#" class="text-dark" data-toggle="dropdown"><span> Langues <i
                                            class="fa fa-caret-down text-muted"></i></span> </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item">
                                        Anglais
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        Français
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                <div class="top-bar-right">
                    <ul class="custom">
                        @guest
                            <li>
                                <a href="{{ route('register') }}" class="text-dark"><i class="fa fa-user mr-1"></i>
                                    <span>Register</span></a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Login</span></a>
                            </li>
                        @endguest
                        @auth
                            <li class="dropdown">
                                <a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> Bienvenue, {{ \Illuminate\Support\Facades\Auth::user()->name }}<i
                                            class="fa fa-caret-down text-white ml-1"></i></span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="{{ route('profile') }}" class="dropdown-item">
                                        <i class="dropdown-icon icon icon-user"></i> Mon profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('inbox') }}">
                                        <i class="dropdown-icon icon icon-speech"></i> Boîte de réception
                                    </a>
                                    <a href="{{ route('change-password') }}" class="dropdown-item">
                                        <i class="dropdown-icon  icon icon-settings"></i> Sécurité
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="dropdown-icon icon icon-power"></i> Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
