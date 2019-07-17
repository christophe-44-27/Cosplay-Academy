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

@section('seo')
    <meta name="keywords"
          content="Tutoriels, Tutorials, tutoriels, tutorials, Cosplay School, Cosplay, cosplay, school, ecole,
          loisir, apprentissage, videos, cours, ateliers, workshops, courses, retrouvez, apprendre en ligne">
    <meta name="description"
          content="Retrouvez l'ensemble de nos tutoriels ainsi que ceux créés par la communauté de la Cosplay School !"/>
@endsection

@section('facebook_seo')
    <!-- ZONE SEO FACEBOOK -->
    <meta property="og:url" content="https://www.cosplayschool.ca/tutorials" />
    <meta property="og:title" content="Plateforme d'entraide francophone de cosplay" />
    <meta property="og:image"
          content="{{ asset('images/cs-default-sharing-image.png')}}">
    <meta property="og:description"
          content="Retrouvez l'ensemble de nos tutoriels ainsi que ceux créés par la communauté de la Cosplay School !" />
@endsection

@push('stylesheets')
    <style>
        .thumbnail-75px{
            width: 75px;
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
    <!-- Section: Course gird -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 blog-pull-right">
                    <div class="row">
                        @if($tutorials)
                            @foreach($tutorials as $tutorial)
                                <div class="col-sm-6 col-md-4">
                                    <div class="service-block bg-white">
                                        <div class="thumb">
                                            @if (isset($tutorial->thumbnail_picture))
                                                <img alt="featured project" src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}" class="img-fullwidth">
                                            @else
                                                <img src="{{ asset('images/structure/default-cover-cours-fr.png') }}"
                                                     alt="Course image" class="img-fullwidth">
                                            @endif
                                            <h4 class="text-white mt-0 mb-0"><span class="price">{{ ($tutorial->category) ? $tutorial->category->name : '-' }}</span></h4>
                                        </div>
                                        <div class="content text-left flip p-25 pt-0">
                                            <h4 class="line-bottom mb-10" data-toggle="tooltip" title="{{ $tutorial->title }}">
                                                {{ str_limit($tutorial->title, $limit = 17, $end = '...') }}
                                            </h4>
                                            <p>{{ $tutorial->user->name }}</p>
                                            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('tutorial_show', $tutorial->slug) }}">Voir</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-sm-6 col-md-4">
                                <div class="alert alert-info">
                                    Aucun tutoriel ne correspond à votre recherche.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Catégories</h5>
                            <div class="categories">
                                <ul class="list list-border angle-double-right">
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{ route('tutorials_by_category', $category->filter_value) }}">
                                                    {{ $category->name }} ({{ count($category->tutorials) }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info">Aucune catégorie n'est disponible</div>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Widget last tutorials -->
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Derniers <span class="text-theme-color-2">tutoriels</span></h5>
                            <div class="latest-posts">
                                @if($lastTutorials)
                                    @foreach($lastTutorials as $tutorial)
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#">
                                            @if($tutorial->thumbnail_picture)
                                                <img class="thumbnail-75px" src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}">
                                            @else
                                                <img class="thumbnail-75px" src="{{ asset('images/thumbnail-tutorial-empty.png') }}">
                                            @endif
                                        </a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="{{ route('tutorial_show', $tutorial->slug) }}">{{ str_limit($tutorial->title, $limit = 20, $end = '...') }}</a></h5>
                                        </div>
                                    </article>
                                    @endforeach
                                @else
                                <div class="alert alert-warning">
                                    Aucun tutoriel n'est encore publié.
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- /Widget last tutorials -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <nav>
                        {{ $tutorials->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
