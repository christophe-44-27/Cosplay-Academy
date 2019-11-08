<!-- Responsive Navigation Trigger -->
<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Tableau de bord</a>

<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul data-submenu-title="Main">
            <li class="{{ (request()->is('instructors')) ? 'active' : '' }}">
                <a href="{{ route('instructor_dashboard') }}">
                    <i class="sl sl-icon-settings"></i> Tableau de bord
                </a>
            </li>
            <li class="{{ (request()->is('inbox*')) ? 'active' : '' }}">
                <a href="{{ route('inbox') }}">
                    <i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span>
                </a>
            </li>
        </ul>

        <ul data-submenu-title="Enseigner">
            <li class="{{ (request()->is('instructors/courses*')) ? 'active' : '' }}">
                <a><i class="sl sl-icon-docs"></i> @lang('Mes cours')</a>
                <ul>
                    <li>
                        <a href="{{ route('professor_course_list') }}">
                            @lang("Tous mes cours")
                            <span class="nav-tag green">{{ $published_courses }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('professor_course_waiting_moderation_list') }}">
                            @lang("En attente de modération")
                            <span class="nav-tag green">{{ $to_moderate_courses }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->is('instructors/tutorials*')) ? 'active' : '' }}">
                <a><i class="sl sl-icon-doc"></i> @lang('Mes tutoriels')</a>
                <ul>
                    <li>
                        <a href="{{ route('instructor_tutorials_list') }}">
                            @lang("Tous mes tutoriels")
                            <span class="nav-tag green">{{ $published_tutorials }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->is('instructors/reviews*')) ? 'active' : '' }}">
                <a><i class="sl sl-icon-star"></i> Avis</a>
                <ul>
                    <li><a href="{{ route('reviews') }}">Mes avis <span class="nav-tag green">6</span></a>
                    </li>
                    <li><a href="{{ route('received_reviews') }}">Avis de mes fans <span class="nav-tag yellow">1</span></a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ route('professor_course_favorites') }}"><i class="sl sl-icon-heart"></i> Mes favoris</a></li>
            <li><a href="{{ route('professor_course_new') }}"><i class="sl sl-icon-plus"></i> Ajouter un cours</a></li>
        </ul>

        <ul data-submenu-title="Mon compte">
            <li class="{{ (request()->is('instructors/profile*')) ? 'active' : '' }}"><a href="{{ route('profile_professor') }}"><i class="sl sl-icon-user"></i> Mon profil de formateur</a></li>
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
</div>
