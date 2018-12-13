<header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget no-border m-0">
                        <ul class="list-inline font-13 sm-text-center mt-5">
                            @auth
                                <li>
                                    <a class="text-white" href="{{ route('dashboard_homepage') }}">
                                        @lang('messages.my_account')
                                    </a>
                                </li>
                                <li class="text-white">|</li>
                                <li>
                                    <a class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        @lang('messages.user_actions.logout')
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endauth

                            @guest
                                <li>
                                    <a class="text-white" href="{{ route('register') }}">
                                        @lang('messages.user_actions.register')
                                    </a>
                                </li>
                                <li class="text-white">|</li>
                                <li>
                                    <a class="text-white" href="{{ route('register') }}">@lang('messages.user_actions.register_as_teacher')</a>
                                </li>
                                <li class="text-white">|</li>
                                <li>
                                    <a class="text-white" href="{{ route('login') }}">@lang('messages.user_actions.login')</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    {{--<!--Widget cart -->--}}
                {{--{{ render(controller('EcommerceBundle:CartWidget:cartResume')) }}--}}
                {{--<!--/Widget cart -->--}}
                    <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
                        <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                            <li><a href="https://www.facebook.com/cosplayschoolqc" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="https://twitter.com/cosplay_school" target="_blank"><i class="fa fa-twitter text-white"></i></a></li>
                            <li><a href="https://www.instagram.com/cosplayschool/" target="_blank"><i class="fa fa-instagram text-white"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC6z6mnYwoyjHhJ3GlJYyESg" target="_blank"><i class="fa fa-youtube text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-5">
                    <div class="widget no-border m-0">
                        <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="{{ route('homepage') }}">
                            <img src="{{ asset('images/logo-login.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px">
            <div class="container">
                <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
                    <ul class="menuzord-menu">
                        <li class="">
                            <a href="{{ route('homepage') }}">@lang('messages.navigation.home')</a>
                        </li>
                        <li class="">
                            <a href="{{ route('tutorials') }}">@lang('messages.navigation.our_tutorials')</a>
                        </li>
                        <li class="">
                            <a href="{{ route('teachers') }}">@lang('messages.navigation.our_teachers')</a>
                        </li>
                        <li class="#">
                            <a href="{{ route('page_about') }}">@lang('messages.navigation.about_us')</a>
                        </li>
                        <!--<li class="#">
                            <a href="{{ route('subscriptions') }}">La boîte à cosplay</a>
                        </li>-->
                        <li class="">
                            <a href="http://shop.cosplayschool.ca" target="_blank">@lang('messages.navigation.our_shops')</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
