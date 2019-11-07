<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Accueil</a>
        <a class="p-2 text-dark" href="#">La communauté</a>
        <a class="p-2 text-dark" href="#">Tutoriels</a>
        <a class="p-2 text-dark" href="#">Contact</a>
    </nav>
    @auth
        <a class="btn btn-outline-primary" href="{{ route('instructor_dashboard') }}">
            @lang('messages.my_account')
        </a>
        <a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
            @lang('messages.user_actions.logout')
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth

    @guest
        <a class="btn btn-outline-primary" href="{{ route('register') }}">
            @lang('messages.user_actions.register')
        </a>
        <a class="btn btn-outline-primary" href="{{ route('login') }}">
            @lang('messages.user_actions.login')
        </a>
    @endguest
    <a class="btn btn-outline-primary" href="#">Sign up</a>
</div>
