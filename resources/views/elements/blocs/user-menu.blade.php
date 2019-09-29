<div class="item1-links  mb-0">
    <a href="{{ route('profile') }}" class="{{ ($action == 'edit_profile') ? 'active' : '' }} d-flex border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-user"></i></span> @lang('Modifier mon profil')
    </a>
    <a href="myads.html" class=" d-flex  border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-diamond"></i></span> Mes cours
    </a>
    <a href="myfavorite.html" class=" d-flex border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-heart"></i></span> Mes favoris
    </a>
    <a href="{{ route('payment_history') }}" class="{{ ($action == 'orders') ? 'active' : '' }} d-flex  border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-basket"></i></span> Historique de paiement
    </a>
    <a href="settings.html" class="d-flex border-bottom">
        <span class="icon1 mr-3"><i class="icon icon-settings"></i></span> Paramètres
    </a>
    <a href="#" class="d-flex">
        <span class="icon1 mr-3"><i class="icon icon-power"></i></span> Déconnexion
    </a>
</div>
