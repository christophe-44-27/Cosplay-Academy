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
    <!-- Section: Course gird -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 blog-pull-right">
                    @if($commissions)
                        @foreach($commissions as $commission)
                        <div class="row mb-15">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumb">
                                    <img alt="featured project" src="{{ asset('storage/' . $commission->cover_path) }}" class="img-fullwidth">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4 class="line-bottom mt-0 mt-sm-20">{{ $commission->title }}</h4>
                                <ul class="review_text list-inline">
                                    <li><h4 class="mt-0"><span class="text-theme-color-2">Budget indicatif :</span> {{ $commission->max_budget }} $</h4></li>
                                </ul>
                                <p>
                                    {!! str_limit($commission->description, $limit = 200, $end = '...') !!}
                                </p>
                                <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                   href="{{ route('commission_show', $commission->slug) }}">Voir l'annonce</a>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    @else
                        <div class="col-sm-6 col-md-4">
                            <div class="alert alert-info">
                                Aucune annonce ne correspond à votre recherche.
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Catégories</h5>
                            <div class="categories">
                                <ul class="list list-border angle-double-right">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('commission_by_category', $category->filter_value) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Widget last tutorials -->
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Derniers <span class="text-theme-color-2">Les tutoriels</span></h5>
                            <div class="latest-posts">
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a class="post-thumb" href="#">
                                        <img class="thumbnail-75px" src="{{ asset('images/thumbnail-tutorial-empty.png') }}">
                                    </a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0"><a href="#">Super commission !</a></h5>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <!-- /Widget last tutorials -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
