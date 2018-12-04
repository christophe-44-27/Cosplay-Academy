@extends('base_layout')

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

@section('content')
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h2 class="text-white mt-10">Abonnements</h2>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="#">Accueil</a></li>
                            <li class="active text-gray-silver">Abonnements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-fullwidth" src="http://placehold.it/450x450" alt="">
                </div>
                <div class="col-md-7">
                    <h2 class="text-uppercase mt-0">La boîte du mois de Janvier !</h2>
                    <h4>Abonnez-vous et retrouvez notre prochaine boîte de cosplay dans votre boîte aux lettres en Janvier !</h4>
                    <p>
                        La boîte du mois de Janvier est une boîte ayant pour thème, le monde fabuleux du jeu Zelda (sur Switch).
                        Dans cette boîte vous aurez la possibilité de créer LA tablette Sheikah du jeu, accompagnée de
                        ses LEDs.
                    </p>
                    <p>
                        Voici la liste de ce que comprend la boîte de Janvier :
                    </p>
                    <ul class="list-divider pl-20">
                        <li><i class="fa fa-check-square-o mr-10 text-black-light"></i> <a href="#">Mousse EVA (24cm de long)</a></li>
                        <li><i class="fa fa-check-square-o mr-10 text-black-light"></i> <a href="#">Ensemble de LEDs</a></li>
                        <li><i class="fa fa-check-square-o mr-10 text-black-light"></i> <a href="#">Peinture vitrail PEBEO bleue</a></li>
                        <li><i class="fa fa-check-square-o mr-10 text-black-light"></i> <a href="#">Peinture vitrail PEBEO jaune</a></li>
                        <li><i class="fa fa-check-square-o mr-10 text-black-light"></i> <a href="#">Patron</a></li>
                    </ul>

                    <a class="btn btn-dark mt-30" href="#subscriptions">Je m'abonne !</a>
                </div>
            </div>
        </div>
    </section>
    <section id="pricing" data-bg-img="images/pattern/p4.png" style="background-image: url({{asset('images/pattern/p4.png')}});">
        <div class="container">
            <div class="section-content">
                <div id="subscriptions" class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 hvr-float-shadow mb-sm-30">
                        &nbsp;
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 hvr-float-shadow mb-sm-30">
                        <div class="pricing-table">
                            <div class="font-36 pl-20 bg-theme-color-2 text-white text-left pr-20 p-10"><sup>$</sup>29.99 <span class="font-15 pull-right mt-15 text-white">Par/Mois</span>
                            </div>
                            <div class=" bg-lighter border-1px p-30 pt-20 pb-20">
                                <h3 class="package-type font-28 m-0 text-black">Apprenti</h3>
                                <ul class="table-list list-icon theme-colored pb-0">
                                    <li><i class="fa fa-check"></i>Matériel (Mousse EVA, Worbla, Etc)</li>
                                    <li><i class="fa fa-check"></i>Instructions de montage</li>
                                    <li><i class="fa fa-check"></i>Publication de votre réalisation</li>
                                    <li><i class="fa fa-times"></i>Aide au montage (Virtuelle)</li>
                                    <li><i class="fa fa-times"></i>2 boîtes gratuites</li>
                                </ul>
                            </div>
                            <a href="{{ route('subscription_checkout_monthly') }}"
                               class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat">
                                S'abonner
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 hvr-float-shadow mb-sm-30">
                        <div class="pricing-table">
                            <div class="font-36 pl-20 bg-theme-color-2 text-white text-left pr-20 p-10"><sup>$</sup>299.99 <span class="font-15 pull-right mt-15 text-white">Par/An</span>
                            </div>
                            <div class=" bg-lighter border-1px p-30 pt-20 pb-20">
                                <h3 class="package-type font-28 m-0 text-black">Adepte</h3>
                                <ul class="table-list list-icon theme-colored pb-0">
                                    <li><i class="fa fa-check"></i>Matériel (Mousse EVA, Worbla, Etc)</li>
                                    <li><i class="fa fa-check"></i>Instructions de montage</li>
                                    <li><i class="fa fa-check"></i>Publication de votre réalisation</li>
                                    <li><i class="fa fa-check"></i>Aide au montage (Virtuelle)</li>
                                    <li><i class="fa fa-check"></i>2 boîtes gratuites</li>
                                </ul>
                            </div>
                            <a href="{{ route('subscription_checkout_yearly') }}" class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat">
                                S'abonner
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 hvr-float-shadow mb-sm-30">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-push-1">
                    <div class="list-group">
                        <a href="#section-one" class="list-group-item smooth-scroll-to-target">Qu'est-ce que la boîte à Cosplay ?</a>

                        <a href="#section-two" class="list-group-item smooth-scroll-to-target">Comment se passe la livraison ?</a>

                        <a href="#section-three" class="list-group-item smooth-scroll-to-target">Puis-je arrêter l'abonnement quand je veux ?</a>

                        <a href="#section-four" class="list-group-item smooth-scroll-to-target">Quelles sont les procédures d'échanges ou de retour ?</a>
                    </div>
                </div>
                <div class="col-md-10 col-md-push-1">
                    <div id="section-one" class="mb-50">
                        <h3>Qu'est-ce que la boîte à Cosplay ?</h3>
                        <hr>
                        <p class="mb-20">La boîte à cosplay est un service d'abonnement vous permettant de recevoir chaque mois
                        du matériel nécessaire à la conception et à la réalisation d'un élément de costume, comme un masque,
                        un casque, une arme, un accessoire, etc.</p>
                        <p>Dans chaque boîte vous recevrez tout le nécessaire à la réalisation de l'objet correspondant au thème de la boîte.</p>
                        <p><b>Attention, dans cette boîte vous ne recevrez que le matériel "léger". Les outils comme les perceuses,
                            ponçeuses, ou autre matériel plus lourd ne seront pas envoyés dans cette boîte.</b></p>
                    </div>
                    <div id="section-two" class="mb-50">
                        <h3>Comment se passe la livraison ?</h3>
                        <hr>
                        <p class="mb-20">Toutes les boîtes seront expédiées à partir du 15 du mois en cours. Si vous commandez
                        une boîte après le 15 du mois, vous ne la recevrez qu'à partir du 15 du mois suivant et le thème correspondant sera
                            celui du mois suivant également.</p>
                    </div>
                    <div id="section-three" class="mb-50">
                        <h3>Puis-je arrêter l'abonnement quand je veux ?</h3>
                        <hr>
                        <p class="mb-20">
                            Oui, vous pouvez tout-à-fait arrêter votre abonnement en cours de cycle d'abonnement.
                        </p>
                        <p>Attention, les abonnements démarrent le premier jour de chaque mois. Si vous décidez de suspendre votre
                        abonnement, en cours de mois, il s'arrêtera pour le mois suivant mais vous recevrez tout de même la boîte
                        du mois en cours.</p>
                    </div>
                    <div id="section-four" class="mb-50">
                        <h3>Quelles sont les procédures d'échanges ou de retour ?</h3>
                        <hr>
                        <p class="mb-20">
                            Aucun échange entre deux thèmes de boîtes ne pourra être effectué. Si vous souhaitez acheter
                            une boîte "passée", vous pouvez vous rendre sur notre <a href="http://shop.cosplayschool.ca" target="_blank">boutique</a>
                            en ligne pour le faire.
                        </p>
                        <p>Si un élément est manquant dans votre boîte nous vous le ferons parvenir sans frais supplémentaire.</p>
                        <p>Si vous constatez un défaut dans votre boîte, contactez nous par le biais de la page Fan Facebook ou grâc au
                        formulaire de contact de ce site.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="images/bg/bg2.jpg" data-parallax-ratio="0.7" style="background-image: url({{asset('images/bg/bg2.jpg')}}); background-position: 50% 398px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-smile mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="2000" data-value="5248" class="animate-number text-white mt-0 font-38 font-weight-500 appeared">5,248</h2>
                        <h5 class="text-white text-uppercase mb-0">Happy Students</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-note2 mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white mt-0 font-38 font-weight-500 appeared">675</h2>
                        <h5 class="text-white text-uppercase mb-0">Our Courses</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-users mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="2000" data-value="248" class="animate-number text-white mt-0 font-38 font-weight-500 appeared">248</h2>
                        <h5 class="text-white text-uppercase mb-0">Our Teachers</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
                    <div class="funfact text-center">
                        <i class="pe-7s-cup mt-5 text-theme-color-2"></i>
                        <h2 data-animation-duration="2000" data-value="24" class="animate-number text-white mt-0 font-38 font-weight-500 appeared">24</h2>
                        <h5 class="text-white text-uppercase mb-0">Awards Won</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container pt-40">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-7">
                        <div class="pr-40">
                            <h3 class="text-uppercase text-theme-colored title line-bottom">Our <span class="text-theme-color-2 font-weight-400">Features</span></h3>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-scissors text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Less CSS</h5>
                                            <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-pen text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Special ShortCode</h5>
                                            <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-tools text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Easy Customiz</h5>
                                            <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-phone text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Responsive</h5>
                                            <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-vector text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">W3 validation</h5>
                                            <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box p-0 mb-30">
                                        <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip">
                                            <i class="pe-7s-light text-white"></i>
                                        </a>
                                        <div class="icon-box-details ml-sm-0">
                                            <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Retina Ready</h5>
                                            <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h3 class="line-bottom">Why <span class="text-theme-color-2">Choose Us?</span></h3>
                        <p class="mb-20">The Cweren Law Firm is a recognized leader in landlord tenant representation throughout Texas.The largest professional property.</p>
                        <div id="accordion1" class="panel-group accordion">
                            <div class="panel">
                                <div class="panel-title"> <a class="active" data-parent="#accordion1" data-toggle="collapse" href="#accordion11" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                                <div id="accordion11" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion12" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                                <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                                <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
