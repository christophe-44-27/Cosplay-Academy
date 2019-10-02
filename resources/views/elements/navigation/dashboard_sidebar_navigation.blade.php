<!-- Responsive Navigation Trigger -->
<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Tableau de bord</a>

<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul data-submenu-title="Main">
            <li><a href="{{ route('professor_dashboard') }}"><i class="sl sl-icon-settings"></i> Tableau de bord</a></li>
            <li><a href="#"><i class="sl sl-icon-envelope-open"></i> Messages <span
                        class="nav-tag messages">2</span></a></li>
            <li><a href="#"><i class="sl sl-icon-wallet"></i> Transactions</a></li>
        </ul>

        <ul data-submenu-title="Enseigner">
            <li class="{{ ($controller == 'tutorials') ? 'active' : '' }}">
                <a><i class="sl sl-icon-layers"></i> @lang('Mes cours')</a>
                <ul>
                    <li><a href="{{ route('professor_course_list') }}">Publiés <span class="nav-tag green">6</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ ($controller == 'reviews') ? 'active' : '' }}">
                <a><i class="sl sl-icon-star"></i> Avis</a>
                <ul>
                    <li><a href="#">Mes avis <span class="nav-tag green">6</span></a>
                    </li>
                    <li><a href="#">Avis de mes fans <span class="nav-tag yellow">1</span></a>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="sl sl-icon-heart"></i> Mes favoris</a></li>
            <li><a href="{{ route('professor_course_new') }}"><i class="sl sl-icon-plus"></i> Ajouter un tutoriel</a></li>
        </ul>

        <ul data-submenu-title="Mon compte">
            <li><a href="#"><i class="sl sl-icon-user"></i> Mon profil</a></li>
            <li><a href="#"><i class="sl sl-icon-power"></i> Déconnexion</a></li>
        </ul>

    </div>
</div>
