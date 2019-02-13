<!-- SIDE MENU -->
<div id="dashboard-options-menu" class="side-menu dashboard left closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->

    <!-- SIDE MENU HEADER -->
    <div class="side-menu-header">
        <!-- USER QUICKVIEW -->
        <div class="user-quickview">
            <!-- USER AVATAR -->
            <a href="#">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <figure class="user-avatar">
                        @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="avatar">
                        @else
                            <img src="{{ asset('themes/dashboard/images/structure/default-avatar.png') }}" alt="avatar">
                        @endif
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->

            <!-- USER INFORMATION -->
            <p class="user-name">{{ Auth::user()->name }}</p>
            <p class="user-money">Membre de la Cosplay School</p>
            <!-- /USER INFORMATION -->
        </div>
        <!-- /USER QUICKVIEW -->
    </div>
    <!-- /SIDE MENU HEADER -->
    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Tableau de bord</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard_homepage') }}">
                <span class="sl-icon icon-grid"></span>
                Mon tableau de bord
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Votre compte</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'account') ? 'active' : '' }}">
            <a href="{{ route('my_account') }}">
                <span class="sl-icon icon-settings"></span>
                Mes paramètres de compte
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'address') ? 'active' : '' }}">
            <a href="{{ route('my_address') }}">
                <span class="sl-icon icon-map"></span>
                Mon adresse
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'security') ? 'active' : '' }}">
            <a href="{{ route('change-password') }}">
                <span class="sl-icon icon-shield"></span>
                Sécurité du compte
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'gallery') ? 'active' : '' }}">
            <a href="{{ route('gallery') }}">
                <span class="sl-icon icon-picture"></span>
                Mes galeries
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'subscriptions') ? 'active' : '' }}">
            <a href="{{ route('my_subscriptions') }}">
                <span class="sl-icon icon-credit-card"></span>
                Mon abonnement
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->


    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Commissions</p>
    <!-- /SIDE MENU TITLE -->

    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'offers') ? 'active' : '' }}">
            <a href="{{ route('dashboard_commissions_offer') }}">
                <span class="sl-icon icon-cloud-download"></span>
                Vos offres
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item {{ ($controller == 'quotations') ? 'active' : '' }}">
            <a href="{{ route('commission_sended') }}">
                <span class="sl-icon icon-cloud-upload"></span>
                Propositions envoyées
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Outils d'auteurs</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item  {{ ($controller == 'tutorials') ? 'active' : '' }}">
            <a href="{{ route('dashboard_tutorials_list') }}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                Mes tutoriels
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->
    <a class="dropdown-item button medium secondary" href="{{ route('logout') }}"
       onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Déconnexion
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    {{--<a href="{{ route('logout') }}" class="button medium secondary">Déconnexion</a>--}}
</div>
<!-- /SIDE MENU -->
