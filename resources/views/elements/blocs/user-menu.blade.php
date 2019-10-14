<div class="item1-links  mb-0">
    <a href="{{ route('profile') }}" class="{{ ($action == 'edit_profile') ? 'active' : '' }} d-flex border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-user"></i></span> @lang('Modifier mon profil')
    </a>
    <a href="{{ route('course_users_registered') }}" class=" d-flex  border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-diamond"></i></span> Mes cours
    </a>
    <a href="{{ route('course_favorite') }}" class="{{ ($action == 'course_favorites') ? 'active' : '' }} d-flex border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-heart"></i></span> Mes favoris
    </a>
    <a href="{{ route('payment_history') }}" class="{{ ($action == 'orders') ? 'active' : '' }} d-flex  border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-basket"></i></span> Historique de paiement
    </a>
    <a href="{{ route('change-password') }}" class="{{ ($action == 'security') ? 'active' : '' }} d-flex border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-lock"></i></span> Sécurité
    </a>
    <a href="{{ route('logout') }}" class="d-flex">
        <span class="icon1 mr-3"><i class="icon icon-power"></i></span> Déconnexion
    </a>
</div>
