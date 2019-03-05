<nav class="navbar-sidebar">
    <ul class="list-unstyled navbar__list">
        <li class="active has-sub">
            <a class="js-arrow" href="{{ route('admin_homepage') }}">
                <i class="fas fa-tachometer-alt"></i>Tableau de bord
            </a>
        </li>
        <li class="has-sub">
            <a class="js-arrow" href="#"><i class="fas fa-copy"></i>Tutoriels</a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="{{ route('admin_tutorial_categories_list') }}">Catégories de tutoriels</a>
                </li>
                <li>
                    <a href="{{ route('admin_tutorial_list') }}">Les tutoriels</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin_users_list') }}">
                <i class="fas fa-user"></i>Les membres</a>
        </li>
        <li class="has-sub">
            <a class="js-arrow" href="#"><i class="fas fa-copy"></i>Forums</a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="{{ route('admin_channel_list') }}">Sections</a>
                </li>
                <li>
                    <a href="{{ route('admin_forums_list') }}">Les forums</a>
                </li>
                <li>
                    <a href="{{ route('admin_forums_to_moderate') }}">Sujets à modérer</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
