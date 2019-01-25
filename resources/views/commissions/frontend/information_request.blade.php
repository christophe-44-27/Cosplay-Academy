@extends ('base_layout')

@push('google_analytic')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118215472-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-118215472-1');
    </script>
@endpush

@push('facebook_seo')
    <!-- ZONE SEO FACEBOOK -->
    <meta property="fb:app_id" content="526252497733390" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $currentUrl }}" />
    <meta property="og:title" content="Déposez une offre de commission" />
    <meta property="og:image" content="#">
    <meta property="og:description"
          content="Vous avez besoin de réaliser une pièce d'armure, une arme ou un accessoire et vous n'avez pas le temps ? Faites appel à des cosplayeurs !" />
@endpush

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('themes/frontend/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/styles.css') }}"/>
@endpush

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h3 class="text-white mt-10">Déposer une offre de commission</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active text-gray-silver">Les annonces de commissions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Course gird -->

    <!-- Section: About -->
    <section class="">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="letter-space-4 text-gray-darkgray text-uppercase mt-0 mb-0">Une commission c'est quoi ?</h6>
                        <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">Trouver un cosplayeur pour mes projets</h2>
                        <h4 class="text-theme-colored">Vous avez besoin d'un accessoire, d'une armure, d'un maquillage ? Déposez votre offre !</h4>
                        <p>Grâce à la Cosplay School vous allez pouvoir mettre en ligne vos offres afin que des cosplayeurs puissent vous aider
                        dans votre projet. Nous nous chargerons de diffuser votre annonce sur les réseaux sociaux et à travers
                        notre newsletter. Ainsi vous pourrez trouver le plus rapidement possible un cosplayeur pour vous assister
                        dans votre projet :).</p>
                        <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="{{ route('commissions') }}">Parcourir les annonces →</a>
                    </div>
                    <div class="col-md-6">
                        <div class="video-popup">
                            <iframe class="img-responsive img-fullwidth" width="560" height="315" src="https://www.youtube.com/embed/auOaaW1ZOjE"
                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Section: Services -->
    <section id="services" class="">
        <div class="container pb-40">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="text-uppercase mt-0 line-height-1">Comment ça marche ?</h2>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="text-center mb-30 p-10">
                            <a href="#" class="">
                                <img src="{{ asset('themes/frontend/images/upload-button-red.svg') }}" width="70" alt="">
                            </a>
                            <h4 class="font-weight-600 mt-20">1. Déposez votre offre</h4>
                            <p>Créez votre offre gratuitement puis attendez que notre équipe la valide en 24 heures.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="text-center mb-30 p-10">
                            <a href="#" class="">
                                <img src="{{ asset('themes/frontend/images/envelope-red.svg') }}" width="70" alt="">
                            </a>
                            <h4 class="font-weight-600 mt-20">Attendez d'être contacté par les cosplayeurs</h4>
                            <p>Les cosplayeurs intéressés par votre offre vous contacteront par courriel. Vous pourrez voir leur profil et leur répondre directement.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="text-center mb-30 p-10">
                            <a href="#" class="">
                                <img src="{{ asset('themes/frontend/images/stick-red.svg') }}" width="70" alt="">
                            </a>
                            <h4 class="font-weight-600 mt-20">3. Choisissez le cosplayeur qui vous convient</h4>
                            <p>Vous pourrez prolonger gratuitement la publication de votre offre si vous le souhaitez</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: welcome -->
    <section>
        <div class="container pt-0 pb-0">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row equal-height-inner mt-sm-0">
                    <div class="col-sm-12 col-md-6 pr-0 pr-sm-15 sm-height-auto mt-sm-0">
                        <div class="sm-height-auto" data-bg-img="{{ asset('images/browse-commissions.jpg') }}">
                            <div class="p-20">
                                <h3 class="text-white text-uppercase">Parcourir les annonces</h3>
                                <div class="clearfix">
                                </div>
                                <p class="text-white-f1 mt-10">Vous faites du cosplay et vous êtes disponible pour réaliser des commissions ?
                                Alors n'attendez plus et parcourez l'ensemble des annonces présentes sur la Cosplay School ! Si aucune annonce ne vous intéresse inscrivez-vous
                                à la newsletter pour recevoir les nouvelles annonces dès qu'ils paraissent. (Vous ne recevrez qu'un seul courriel par jour.)</p>
                                <a href="{{ route('commissions') }}" class="btn btn-default font-14 btn-theme-colored mt-10 hvr-bounce-to-left no-border">Voir les annonces</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 pl-0 pl-sm-15 pr-sm-15 sm-height-auto mt-sm-0">
                        <div class="sm-height-auto" data-bg-img="{{ asset('images/make-commission.jpg') }}">
                            <div class="p-20">
                                <h3 class="text-white text-uppercase">Vous voulez déposer une annonce ?</h3>
                                <p class="text-white-f1 mt-10">Vous cherchez quelqu'un pour réaliser une armure, un accessoire, une armure ou autre chose ? Déposez votre offre et vous recevrez des réponses de cosplayeurs
                                    proches de chez vous rapidement.</p>
                                <ul class="pull-left flip hidden-sm hidden-xs">
                                    <li>
                                        @auth()
                                            <a href="#" class="btn btn-default text-theme-colored font-14 mt-10 p-10 pr-15" data-toggle="modal"
                                               data-target="#showPostJob">
                                                <span class="span-text pull-left">Déposer une offre</span>
                                            </a>
                                        @endauth
                                        @guest
                                            <a href="{{ route('login') }}" class="btn btn-default text-theme-colored font-14 mt-10 p-10 pr-15">
                                                <span class="span-text pull-left">Connectez-vous pour déposer une offre</span>
                                            </a>
                                        @endguest
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </section>

    <!-- Section: Tutorials details -->
    <div class="modal fade" id="showPostJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => route('commission_create'), 'enctype' => "multipart/form-data"]) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Déposez votre offre</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Donnez un titre à votre annonce <small>*</small></label>
                                <input name="title" type="text" placeholder="Epée de Lance dans Voltron" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lieu de livraison <small>*</small></label>
                                <input name="delivery_location" class="form-control required text" type="text" required="required" placeholder="Québec, Canada">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Budget indicatif <small>*</small></label>
                                <input name="max_budget" class="form-control required" type="text" required="required" placeholder="150$">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date de réalisation souhaitée <small>*</small></label>
                                {{ Form::date('desired_delivery_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="category_id" class="rl-label">Catégorie de l'offre</label>
                                {{ Form::select('category_id', $categories, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description de la commission <small>*</small></label>
                        {{ Form::text('description', null, ['class' => 'tinymce', 'placeholder' => 'Indiquez ici aux cosplayeurs ce que vous souhaitez. Vous pouvez mettre des images dans le corps du message.']) }}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Image de couverture <small>*</small></label>
                                <input name="cover_path" class="file" type="file" multiple data-show-upload="false" data-show-caption="true">
                                <small>Taille maximum du fichier : 2mo</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">Envoyer</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('javascripts')
    <script src="{{ asset('themes/dashboard/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            height : "200",
            menubar: false,
            selector: '.tinymce',
            relative_urls : false,
            remove_script_host : false,
            document_base_url : "http://cosplayschool-lar.test/",
            plugins: [
                'image advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'insert | undo redo | image | bold| bullist numlist outdent indent | ',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'],

            // without images_upload_url set, Upload tab won't show up
            images_upload_url: '{{ route('upload_from_wysiwyg') }}',

            // override default upload handler to simulate successful upload
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
                var token = $('input[name=_token]').val();

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route('upload_from_wysiwyg') }}');
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
        });
    </script>
@endpush
