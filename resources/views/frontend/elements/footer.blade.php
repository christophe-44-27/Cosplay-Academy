<section>
    <footer class="bg-dark text-white">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <h6>@lang('La Cosplay Academy')</h6>
                        <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <p>@lang("Vous avez envie de concevoir votre prochain costume de A à Z mais vous ne savez pas par où commencer ? Grâce à la Cosplay Academy, vous allez pouvoir
                        découvrir de nouvelles compétences afin de réaliser les costumes de vos rêves !")</p>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <h6>@lang("Nos services")</h6>
                        <hr class="deep-purple text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ route('contact') }}">@lang("Contactez-nous")</a></li>
                            <li><a href="{{ route('about')}}">@lang("A propos")</a></li>
                            <li><a href="{{ route('courses') }}">@lang("Cours")</a></li>
                            <li><a href="{{ route('cgv') }}">@lang("Conditions générales de vente")</a></li>
                            <li><a href="{{ route('cgu') }}">@lang("Conditions générales d'utilisation")</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <h6>@lang("Contact")</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#"><i class="fa fa-home mr-3 text-primary"></i> Québec, G1B 0M7, Canada</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-envelope mr-3 text-primary"></i> contact@cosplay-academy.com</a>
                            </li>
                        </ul>
                        <ul class="list-unstyled list-inline mt-3">
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <h6>@lang("S'inscrire à l'infolettre")</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <div class="clearfix"></div>
                        <newsletter-subscription-form></newsletter-subscription-form>
                        <h6 class="mb-0 mt-5">@lang("Mode de paiement")</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-2 mt-3 d-inline-block mx-auto">
                        <div class="clearfix"></div>
                        <ul class="footer-payments">
                            <li><a href="javascript:;"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-cc-stripe" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark  text-white p-0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center ">
                        Copyright © 2019 <a href="https://www.cosplay-academy.com" class="fs-14 text-primary">Cosplay Academy</a>. @lang("Tous droits réservés").
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
