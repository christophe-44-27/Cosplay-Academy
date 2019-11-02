@extends('layout.layout_without_search_bar')

@section('content')
    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <div class="card overflow-hidden">
                        <a href="{{ route('course_details', ['course' => $course]) }}" class="btn btn-square btn-primary">
                            @lang("Retour au cours")
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="item-det mb-4">
                                <h3>{{ $content->name }}</h3>
                            </div>
                            <div class="item-det mb-4">
                                @if($content->type == 'article')
                                    {!! $content->content_article !!}
                                @else
                                    <video style="width: 100%;" controls>
                                        <source src="{{ $url_video }}" type="video/mp4">
                                        Je suis désolé, votre navigateur ne supporte pas les vidéos HTML5
                                        au format WebM avec VP8 ni au format MP4 avec H.264.
                                        <!-- Vous pouvez intégrer un lecteur Flash ici pour lire la vidéo mp4 dans les anciens navigateurs -->
                                    </video>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->
@endsection
