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
    <meta property="og:title" content="{{ $tutorial->title }}" />
    <meta property="og:image"
          content="{{ asset('storage/tutorials/thumbnails/' . $tutorial->thumbnail_picture) }}">
    <meta property="og:description"
          content="Retrouvez notre dernier tutoriel en ligne, réalisé par {{ $tutorial->user->public_pseudonym }} et qui s'intitule {{ $tutorial->title }}" />
@endpush

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
                        <h2 class="title text-white">Les tutoriels</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active text-gray-silver">Les tutoriels</li>
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
                        @if($tutorial->video_id)
                            <div id="player"></div>
                        @else
                            <img src="{{ asset('storage/tutorials/covers/' . $tutorial->main_picture ) }}" />
                        @endif
                        <hr>
                        {!! $tutorial->content !!}
                    </div>
                    <button class="button share_facebook" data-url="{{ $currentUrl }}">
                        Partager sur facebook
                    </button>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sidebar sidebar-left mt-sm-30 ml-40">
                        <div class="widget">
                            <h4 class="widget-title line-bottom">L'<span class="text-theme-color-2">auteur</span></h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix"> <span> Pseudonyme :</span>
                                        <div class="value pull-right"> {{ $tutorial->user->public_pseudonym }} </div>
                                    </li>
                                    @if($tutorial->user->facebook_page)
                                    <li class="clearfix"> <span> Facebook : </span>
                                        <div class="value pull-right"> <a href="{{ $tutorial->user->facebook_page }}" target="_blank" class="fa fa-facebook-official"></a> </div>
                                    </li>
                                    @endif

                                    @if($tutorial->user->twitter_page)
                                    <li class="clearfix"> <span> Twitter : </span>
                                        <div class="value pull-right"> <a href="{{ $tutorial->user->twitter_page }}" target="_blank" class="fa fa-twitter"></a> </div>
                                    </li>
                                    @endif

                                    @if($tutorial->user->website)
                                    <li class="clearfix"> <span> Portfolio : </span>
                                        <div class="value pull-right"> <a href="{{ $tutorial->user->website }}" target="_blank" class="fa fa-globe"></a> </div>
                                    </li>
                                    @endif

                                    @if($tutorial->user->youtube_page)
                                    <li class="clearfix"> <span> YouTube : </span>
                                        <div class="value pull-right"> <a href="{{ $tutorial->user->youtube_page }}" target="_blank" class="fa fa-youtube-square"></a> </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="widget">
                            <h4 class="widget-title line-bottom">Le <span class="text-theme-color-2">tutoriel</span></h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix"> <span> Créé le :</span>
                                        <div class="value pull-right"> {{ date('d/m/Y', strtotime($tutorial->created_at)) }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Catégorie : </span>
                                        <div class="value pull-right"> {{ $tutorial->tutorialCategory->name }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Nombre de vues : </span>
                                        <div class="value pull-right"> {{ $tutorial->nb_views }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Nombre de j'aime : </span>
                                        <div class="value pull-right"> {{ $tutorial->nb_likes }} </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('javascripts')
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
    @if($tutorial->video_id)
    <script>
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '490',
                width: '840',
                videoId: '{{ $tutorial->video_id }}',
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                setTimeout(stopVideo, 6000);
                done = true;
            }
        }
        function stopVideo() {
            player.stopVideo();
        }
    </script>
    @endif
@endpush
