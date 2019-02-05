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

@section('facebook_seo')
    <!-- ZONE SEO FACEBOOK -->
    <meta property="og:url" content="{{ $currentUrl }}" />
    <meta property="og:title" content="{{ $commission->title }}" />
    <meta property="og:image"
          content="{{ asset('storage/' . $commission->cover_path) }}">
    <meta property="og:description"
          content="Demande de commission, réalisée par {{ $commission->user->public_pseudonym }} et qui s'intitule {{ $commission->title }}" />
@endsection

@push('stylesheets')
    <style>
        #player{
            width: 750px;
            height:500px;
        }
        .share_facebook{
            margin-top: 25px;
            background: #3B5998;
            border-radius: 0;
            color: #fff;
            border-width: 1px;
            border-style: solid;
            border-color: #263961;
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
                            <li><a href="{{ route('commissions') }}">Les annonces de commissions</a></li>
                            <li class="active text-gray-silver">{{ $commission->title }}</li>
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
                <div class="col-md-8 blog-pull-right">
                    <div class="single-service">
                        <img src="{{ asset('storage/' . $commission->cover_path ) }}" />
                        <hr>
                        <h2>{{ $commission->title }}</h2>
                        {!! $commission->description !!}
                    </div>
                    <button class="button share_facebook" data-url="{{ $currentUrl }}">
                        Partager sur facebook
                    </button>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sidebar sidebar-left mt-sm-30 ml-40">
                        <div class="widget">
                            <h4 class="widget-title line-bottom">Informations</h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix"> <span> Budget indicatif : </span>
                                        <div class="value pull-right"> {{ $commission->max_budget }} $</div>
                                    </li>
                                    <li class="clearfix"> <span> Catégorie : </span>
                                        <div class="value pull-right"> {{ $commission->category->name }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Créée par :</span>
                                        <div class="value pull-right"> {{ $commission->user->public_pseudonym }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Créée le :</span>
                                        <div class="value pull-right"> {{ date('d/m/Y', strtotime($commission->created_at)) }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Nombre de vues : </span>
                                        <div class="value pull-right"> {{ $commission->nb_views }} </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title line-bottom">Livraison</h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix"> <span> Localisation : </span>
                                        <div class="value pull-right"> {{ $commission->delivery_location }}</div>
                                    </li>
                                    <li class="clearfix"> <span> Date souhaitée : </span>
                                        <div class="value pull-right"> {{ \Carbon\Carbon::parse($commission->desired_delivery_date)->format('d/m/Y')}} </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget">
                            @auth()
                                @if($userHasAlreadySubmitted == 0)
                                <a href="#" class="btn btn-primary clearfix" data-toggle="modal"
                                   data-target="#showPostJob">
                                    Soumettre une proposition
                                </a>
                                <div class="modal fade" id="showPostJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        {!! Form::open(['url' => route('commission_quotation_submit'), 'enctype' => "multipart/form-data"]) !!}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Soumettre une proposition</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Description <small>*</small></label>
                                                            {{ Form::text('description', null, ['class' => 'tinymce', 'placeholder' => 'Indiquez ici aux cosplayeurs ce que vous souhaitez. Vous pouvez mettre des images dans le corps du message.']) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Votre tarif (en $ CAD)<small>*</small></label>
                                                            <input name="price" type="text" placeholder="150" required="required" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Date de livraison estimée <small>*</small></label>
                                                            {{ Form::date('estimated_delivery_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="{{ $commission->id }}" name="commission_id"/>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">Envoyer</button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                @else
                                    <div class="alert alert-info">
                                        Vous avez déjà soumis une proposition à cette offre.
                                    </div>
                                @endif
                            @endauth

                            @guest()
                                <a href="{{ route('login') }}" class="btn btn-primary clearfix">
                                    Connectez-vous pour soumettre une proposition
                                </a>
                            @endguest
                            <br>
                            <br>
                            <a href="{{ route('commission_report', $commission) }}" class="btn btn-danger">
                                Signaler la demande de commission
                            </a>
                        </div>
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
    <script>
        (function() {

            var popupCenter = function(url, title, width, height) {
                var popupWidth = width || 640;
                var popupHeight = height || 320;
                var windowLeft = window.screenLeft || window.screenX;
                var windowTop = window.screenTop || window.screenY;
                var windowWidth = window.innerWidth || document.documentElement.clientWidth;
                var windowHeight = window.innerHeight || document.documentElement.clientHeight;
                var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2;
                var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
                var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
                popup.focus();
                return true;
            };

            document.querySelector('.share_facebook').addEventListener('click', function(e) {
                e.preventDefault();
                var url = this.getAttribute('data-url');
                var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
                popupCenter(shareUrl, "Partager sur facebook");
            });

        })();
    </script>
@endpush
