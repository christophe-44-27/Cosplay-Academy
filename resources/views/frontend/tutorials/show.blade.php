@extends('layout.base_layout')

@section('content')
    Tutorial : {{ $tutorial->title }}
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <video controls>
        <source src="{{ $url_video }}" type="video/mp4">
        Je suis désolé, votre navigateur ne supporte pas les vidéos HTML5
        au format WebM avec VP8 ni au format MP4 avec H.264.
        <!-- Vous pouvez intégrer un lecteur Flash ici pour lire la vidéo mp4 dans les anciens navigateurs -->
    </video>
@endsection
