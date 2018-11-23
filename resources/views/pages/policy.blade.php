@extends ('base_layout')
@push('google_analytic')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118215472-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118215472-1');
    </script>
@endpush

@push('stylesheets')
    <style>
        h5.about{
            font-size: 20px;
            color: #00d7b3;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h3 class="text-white mt-10">Politique de confidentialité</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active">Politique de confidentialité</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-push-1">
                    <div id="section-one" class="mb-50">
                        <blockquote class="bg-theme-colored">
                            <p>
                                Chez Cosplay School, nous comprenons vos inquiétudes concernant l'utilisation et le
                                partage de vos informations personnelles et nous apprécions votre confiance. Cet avis
                                décrit notre Politique de Confidentialité. En visitant Cosplay School, vous acceptez
                                les pratiques décrites dans cet Avis de Confidentialité. Vous pouvez parcourir notre
                                site sans révéler votre identité ou vos informations personnelles. Une fois que vous
                                nous donnez des informations personnelles, vous n'êtes plus considéré comme anonyme.
                                Si vous choisissez de nous fournir des informations personnelles, vous consentez au
                                transfert et au stockage de ces informations sur nos serveurs situés en Amérique du
                                Nord. Nos serveurs sont hébergés par Web Hosting Canada à Montréal.
                            </p>
                            <footer>L'équipe de la Cosplay School</footer>
                        </blockquote>
                    </div>
                    <div id="section-two" class="mb-50">
                        <h3>Quelles informations personnelles sur les clients Cosplay School rassemble-t-elle?</h3>
                        <hr>
                        <p class="mb-20">
                            Les informations que nous obtenons sur nos clients nous aident à personnaliser et à
                            améliorer continuellement leurs expériences chez Cosplay School. Voici les types
                            d'informations que nous recueillons.
                        </p>
                        <p>
                            Informations que vous nous donnez : Nous recevons et stockons les informations que vous
                            entrez sur notre site Web ou que vous nous donnez d'une autre manière. Vous pouvez choisir
                            de ne pas fournir certaines informations, mais vous pourriez alors ne pas être en mesure
                            de profiter de nombreuses fonctionnalités. Nous utilisons les informations que vous nous
                            fournissez pour répondre à vos demandes, personnaliser vos commandes, communiquer vec vous,
                            mais nous respectons votre vie privée lorsque nous commercialisons nos produits et services.
                        </p>
                        <p>
                            Informations obtenues de manière automatique : Nous recevons et stockons certains types
                            d'informations chaque fois que vous interagissez avec nous. Par exemple, comme beaucoup
                            de sites Web, nous utilisons des «cookies» et nous obtenons certains types d'informations
                            lorsque votre navigateur Web accède à Cosplay School.
                        </p>
                        <p>
                            Certaines informations, même à des fin d’identification, ne peuvent être partagées avec
                            nous que volontairement. C'est à vous de décider si vous souhaitez les fournir, sous
                            réserve de toute exigence légale.
                        </p>
                        <p>
                            Nous recueillons, utilisons et divulguons des renseignements personnels uniquement à des
                            fins qu'une personne raisonnable jugerait appropriées dans les circonstances.
                        </p>
                    </div>
                    <div id="section-three" class="mb-50">
                        <h3>Comment Cosplay School gère-t-il les Cookies ?</h3>
                        <hr>
                        <p class="mb-20">
                            Les cookies sont de petits fichiers que nous transférons sur le disque dur de votre
                            ordinateur via votre navigateur Web pour permettre à nos systèmes de reconnaître votre
                            navigateur et proposer des fonctionnalités telles que des messages personnalisés ou le
                            stockage d’articles dans votre panier entre plusieurs visites.
                        </p>
                        <p>
                            La section "aide" de la barre d'outils de la plupart des navigateurs vous indique comment
                            empêcher votre navigateur d'accepter de nouveaux cookies, comment demander au navigateur
                            de vous avertir quand vous recevez un nouveau cookie ou comment désactiver complètement
                            les cookies. En outre, vous pouvez désactiver ou supprimer des données similaires utilisées
                            par les modules complémentaires du navigateur, comme Flash Cookies, en modifiant les
                            paramètres du module ou en visitant le site Web de son fabricant. Comme les cookies vous
                            permettent de profiter de certaines fonctionnalités essentielles de Cosplay School, nous
                            vous recommandons de les laisser en mode actif. Par exemple, si vous bloquez ou si vous
                            refusez nos cookies, vous ne pourrez pas ajouter d'articles à votre panier, procéder à
                            l’encaissement ou utiliser les produits et services Cosplay School qui requièrent une connexion.
                        </p>
                    </div>
                    <div id="section-four" class="mb-50">
                        <h3>Est-ce que Cosplay School partage les informations qu'elle reçoit?</h3>
                        <hr>
                        <p class="mb-20">
                            Les informations sur nos clients sont un élément important de notre entreprise, et
                            nous n’avons pas pour objectif de les vendre à des tiers. Nous partageons les informations
                            sur les clients uniquement comme décrit ci-dessous.
                        </p>
                        <p>
                            Prestataires de services tiers : Nous employons d'autres sociétés et particuliers pour
                            exercer des fonctions en notre nom, mais nous ne vendons aucune information personnelle
                            à des tiers. Exemples : l'exécution des commandes, la livraison de colis, l'envoi de
                            courrier postal et de courrier électronique, l'élimination d’informations répétitives
                            sur les listes de clients, l'analyse des données, l'assistance marketing, le traitement
                            des paiements par carte de crédit et la prestation de services à la clientèle. Les
                            prestataires de service tiers ont accès aux renseignements personnels nécessaires à
                            l'exercice de leurs fonctions, mais ne peuvent les utiliser à d'autres fins.
                        </p>
                        <p>
                            Transferts d'entreprise : À mesure que nous poursuivons le développement de nos activités,
                            nous pourrions vendre ou acheter des magasins, des filiales ou des unités d'affaires.
                            Dans de telles transactions, les renseignements sur les clients sont généralement l'un
                            des biens commerciaux cédés, mais restent assujettis aux promesses faites dans les Avis
                            de Confidentialité préexistants (à moins, bien sûr, que le client n'en consente autrement).
                            En outre, dans le cas peu probable où Cosplay School ou la quasi-totalité de ses actifs
                            sont acquis, les renseignements sur les clients seront bien entendu l'un des actifs transférés.
                        </p>
                        <p>
                            Protection de Cosplay School et d'autres : Nous fournissons les informations sur le
                            compte et sur d'autres données personnelles quand nous croyons que cela est appropriée
                            pour se conformer à la loi; appliquer nos Conditions d'utilisation et autres accords;
                            protéger les droits, la propriété ou la sécurité de Cosplay School, de nos utilisateurs
                            ou de tiers. Cela comprend l'échange d'informations avec d'autres sociétés et organisations
                            pour la protection contre la fraude et la réduction du risque-crédit. Il est évident que
                            cela n'inclut pas la vente, la location, le partage ou la divulgation d'informations
                            d’identification personnelle de clients à des fins commerciales, en violation des
                            engagements énoncés dans le présent Avis de confidentialité.
                        </p>
                        <p>
                            Avec votre consentement : À l'exception de ce qui est indiqué ci-dessus, vous recevrez
                            un avis lorsque des informations vous concernant pourraient être transmises à des tiers et
                            vous aurez la possibilité de choisir de ne pas les partager.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection