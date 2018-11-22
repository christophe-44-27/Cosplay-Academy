@extends('base_layout')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('themes/frontend/plugins/carousel-grafikart/css/main.css') }}" />
@endpush
@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h3 class="text-white mt-10">Devenir auteur</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active">Devenir auteur</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title mb-5">Qu'est-ce que la Cosplay School ?</h2>
                    <p>La Cosplay School est la première école de cosplay à Québec, ainsi qu'au Canada. Notre objectif
                        est d'aider la communauté des cosplayeurs à croître et à améliorer ses compétences
                        dans des domaimes comme la couture, la peinture, l'artisanat, l'électronique, etc.
                    </p>
                    <p>
                        Sur notre site internet, vous allez pouvoir trouver des cours et tutoriels, vidéos ou
                        écrits, des ateliers auxquels les membres pourront s'inscrire, un forum (qui est encore
                        en développement) et bien plus encore.
                        <br>
                        Nous voulons faire de la Cosplay School, le lieu de référence dans l'apprentissage du cosplay.
                        Mais nous ne pouvons pas faire ça sans vous.
                        <br>
                        <br>
                        Vous allez nous dire qu'il existe déjà un très grand nombre de tutoriels sur des plateformes comme
                        YouTube par exemple, et vous vous demandez sûrement ce que la Cosplay School va apporter
                        de nouveau ?
                        <br>
                        <br>
                        Eh bien au sein de la Cosplay School, nous avons une communauté de modérateurs composés
                        de professionnels et de cosplayeurs expérimentés qui seront capables de juger de la qualité
                        de chaque contenus mis en ligne sur le site. Ainsi, lorsque vous, auteur, vous allez rédiger un cours,
                        il faudra faire une demande de revue de cours afin qu'il soit modéré puis publié.
                        <br>
                        Nous voulons que le contenu présent sur la Cosplay School soit de la meilleure qualité possible,
                        que ce soit grâce aux explications, aux vidéos, aux photos ou encore grâce aux documents
                        joints comme les patrons.
                    </p>
                </div>
                <div class="col-md-12">
                    <h2 class="title mb-5">Pourquoi devenir auteur pour la Cosplay School ?</h2>
                    <p>
                        Rejoindre la Cosplay School en tant qu'auteur, c'est s'ouvrir à de belles opportunités. Nous
                        travaillons avec des partenaires comme Club Tissus (à Québec), DeSerres, PEBEO, SIAL, et
                        True North Cosplay. En travaillant avec nous, vous avez la possibilité de travailler avec eux
                        lors des ateliers Cosplay School.
                    </p>
                </div>
                <div class="col-md-12">
                    <h2 class="title mb-5">Comment travailler avec la Cosplay School ?</h2>
                    <p>
                        Nous vous offrons 2 options possibles si vous souhaitez travailler avec nous.
                    </p>
                    <ul class="list">
                        <li>
                            <b>Programme d'auteur classique</b> : Ce programme vous permet d'avoir accès aux récompenses d'auteurs.
                            Ces récompenses sont créées dans le but de vous permettre de recevoir une compensation en fonction
                            du nombre de tutoriels que vous mettez en ligne sur la Cosplay School.
                        </li>
                        <li>
                            <b>Programme d'auteur amélioré</b> : Ce programme est différent du précédent. En effet, lorsque vous faites
                            partie du programme d'auteur amélioré, vous ne recevrez plus de récompenses, mais un montant
                            fixe pour chaque tutoriel sur la Cosplay School. (Voir les conditions générales d'utilisation)
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <h2 class="title mb-5">Mais au fait, comment ça marche ?</h2>
                    <p>Le principe du programme d'auteur est très simple. Nous vous offrons la possibilité de débloquer
                        des récompenses en fonction du nombre de tutoriels ou cours que vous publiez. En effet c'est la condition
                        pour que l'offre s'applique. Vos tutoriels doivent être validés par notre équipe de modérateurs
                        afin que nous puissions garantir de sa qualité. Une fois que le tutoriel (ou le cours) est
                        validé, vous verrez que votre compteur sur la page des récompenses augmentera. Une fois que le badge
                        est débloqué nous enverrons directement vos gains à l'adresse indiquée sur votre profil*.</p>
                    <p><b>* Attention, n'oubliez pas de mettre votre adresse postale à jour :)</b></p>

                    <p>Nous pourrons également sélectionner votre profil, parmi le panel des professeurs disponibles
                        si nous avons besoin de vos compétences dans la réalisation d'un atelier. (Atelier rémunéré selon votre tarif horaire)</p>
                </div>
                <div class="col-md-12">
                    <h2 class="title mb-5">Exemples de récompenses d'auteur</h2>
                    <p>Chaque tutoriel, ou cours doit être mis en ligne afin d'être comptabilisé dans votre total
                        de contenu.</p>
                    <!-- POST ITEM LIST -->
                    <ul class="list theme-colored check">
                        <li>
                            Premier pallier de récompense (5 contenus) : Carte cadeaux de 20$
                        </li>
                        <li>
                            Second pallier de récompense (10 contenus) : Carte cadeaux de 50$
                        </li>
                        <li>
                            Troisième pallier de récompense (25 contenus) : Carte cadeaux de 50$ + une plaque de Worbla taille S.
                        </li>
                        <li>
                            Quatrième pallier de récompense (40 contenus) : Carte cadeaux de 60$ + une plaque de Worbla taille M.
                        </li>
                        <li>
                            Cinquième pallier de récompense (60 contenus et +) : Carte cadeaux de 100$ + une plaque de Worbla taille XL.
                        </li>
                    </ul>
                    <!-- POST ITEM LIST -->
                    <p><small><em>(Les palliers ne sont accessibles qu'une fois.)</em></small></p>
                </div>
            </div>
            <div class="row">
                <h2>Nos partenaires</h2>
                <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/club-tissus.png') }}" class="img-fullwidth"> </a> </div>
                <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/deserres.png') }}" class="img-fullwidth"> </a> </div>
                <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/pebeo.png') }}" class="img-fullwidth"> </a> </div>
                <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="https://truenorthcosplay.com" target="_blank"> <img alt="..." src="{{ asset('images/true-north-cosplay.png') }}" class="img-fullwidth"> </a> </div>
                <div class="col-xs-6 col-md-2"> <a class="thumbnail" href="#"> <img alt="..." src="{{ asset('images/sial.png') }}" class="img-fullwidth"> </a> </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="post-title small">Envie de nous rejoindre ? Inscrivez-vous !</h3>
                    <a href="{{ route('register') }}" target="_blank">
                        <button type="button" class="button primary">Je m'inscris</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('javascripts')
    <script src="{{ asset('themes/frontend/plugins/carousel-grafikart/js/main.js') }}"></script>
@endpush
