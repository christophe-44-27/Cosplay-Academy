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
    <meta property="og:image"
          content="#">
    <meta property="og:description"
          content="Vous avez besoin de réaliser une pièce d'armure, une arme ou un accessoire et vous n'avez pas le temps ? Faites appel à des cosplayeurs !" />
@endpush

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('themes/frontend/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/styles.css') }}"/>
    <style>
        section > .container{
            padding-top:  unset !important;
        }
    </style>
@endpush

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/cosplay-school-bg.png') }}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white">Les annonces de commissions</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active text-gray-silver">Les annonces de commissions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Tutorials details -->
    <section>
        <div class="container">
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
            <div class="offer-deposit">
                <section class="first-content post-job">
                    <div class="container">
                        <div class="first-propos custom-propos">
                            <div class="title-text">
                                <h3>Déposer une annonce afin de pouvoir réaliser vos projets cosplay</h3>
                                <p>
                                    Sur la Cosplay School vous pouvez déposer des demandes de commissions afin que des cosplayeurs
                                    puissent vous aider à réaliser vos projets de cosplay.
                                </p>
                            </div>
                            <ul class="list-button">
                                <li>
                                    @auth()
                                        <a href="#" class="btn btn-orange clearfix" data-toggle="modal"
                                           data-target="#showPostJob">
                                            <span class="span-text pull-left">Déposer une offre</span>
                                        </a>
                                    @endauth
                                    @guest
                                        <a href="{{ route('login') }}" class="btn btn-orange clearfix">
                                            <span class="span-text pull-left">Connectez-vous pour déposer une offre</span>
                                        </a>
                                    @endguest
                                </li>
                                <li><a href="{{ route('commissions') }}" class="btn btn-gray clearfix">
                                        <span class="span-text pull-left">
                                            Voir les annonces
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="quetions hidden-480">
                                <p>Vous êtes un cosplayeur et vous voulez répondre à des offres de commissions ?</p>
                                <p>
                                    <a href="{{ route('register') }}">Inscrivez-vous gratuitement</a> pour répondre aux annonces
                                </p>
                            </div>
                        </div>
                        <div class="image show-480">
                            <img src="" alt="">
                        </div>
                    </div>
                </section>
                <section class="how-works">
                    <div class="container">
                        <div class="sec-title">
                            <h3>Comment ça marche ?</h3>
                        </div>
                        <div class="sec-content">
                            <div class="list-item">
                                <div class="row">
                                    <div class="col-md-4 item item-1">
                                        <div class="image">
                                            <img src="{{ asset('themes/frontend/images/upload-button-red.svg') }}" alt="icon">
                                        </div>
                                        <div class="desc">
                                            <h4>
                                                <span class="num">1. </span> Déposez votre offre
                                            </h4>
                                            <p>Créez votre offre gratuitement puis attendez que notre équipe la valide en 24 heures.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 item item-2">
                                        <div class="image">
                                            <img src="{{ asset('themes/frontend/images/envelope-red.svg') }}" alt="icon">
                                        </div>
                                        <div class="desc">
                                            <h4>
                                                <span class="num">2. </span> Attendez d'être contacté par les cosplayeurs
                                            </h4>
                                            <p>Les cosplayeurs intéressés par votre offre vous contacteront
                                                par courriel. Vous pourrez voir leur profil et leur répondre directement.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 item item-3">
                                        <div class="image">
                                            <img src="{{ asset('themes/frontend/images/stick-red.svg') }}" alt="icon">
                                        </div>
                                        <div class="desc">
                                            <h4>
                                                <span class="num">3. </span>Choisissez le cosplayeur qui vous convient
                                            </h4>
                                            <p>Vous pourrez prolonger gratuitement la publication de votre offre si vous le souhaitez.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="discover">
                    <div class="container">
                        <div class="sec-title">
                            <h3>Découvrir la Cosplay School</h3>
                        </div>
                        <div class="sec-content">
                            <iframe class="videos" width="560" height="315" src="https://www.youtube.com/embed/auOaaW1ZOjE"
                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </section>

                <!-- Modal -->
                <!-- Modal -->
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
            </div>
        </div>
    </section>
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
