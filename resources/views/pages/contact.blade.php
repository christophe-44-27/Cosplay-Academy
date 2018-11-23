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

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h3 class="text-white mt-10">Formulaire de contact</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active">Formulaire de contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row pt-30">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
                                <div class="media-body"> <strong>COORDONNÉES</strong>
                                    <p>G1B 0M7, Québec, Québec - Canada</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
                                <div class="media-body"> <strong>NUMÉRO DE CONTACT</strong>
                                    <p>418 554 2964</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
                                <div class="media-body"> <strong>ADRESSE COURRIEL</strong>
                                    <p>contact@cosplayschool.ca</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="line-bottom mt-0 mb-20">Besoin d'informations ?</h3>
                    <p class="mb-20">Vous souhaitez obtenir des informations sur la Cosplay School, proposez un partenariat, soumettre
                    des suggestions, alors n'attendez plus et contactez-nous !</p>
                    <!-- Contact Form -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['url' => route('send_mail')]) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Votre nom" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="email" class="form-control required email" type="email" placeholder="Votre courriel" aria-required="true">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input name="subject" class="form-control required" type="text" placeholder="Le sujet de votre message" aria-required="true">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input name="phone" class="form-control" type="text" placeholder="Numéro de téléphone">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea name="message" class="form-control required" rows="5" placeholder="Votre message" aria-required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="form_botcheck" class="form-control" type="hidden" value="">
                            <button type="submit" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Envoyer</button>
                            <button type="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Réinitialiser</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection