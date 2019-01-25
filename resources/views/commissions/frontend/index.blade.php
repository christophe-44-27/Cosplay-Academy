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

@section('facebook_seo')
    <!-- ZONE SEO FACEBOOK -->
    <meta property="og:url" content="{{ $currentUrl }}" />
    <meta property="og:title" content="Réaliser des commissions" />
    <meta property="og:image" content="{{ asset('images/cs-default-sharing-image.png') }}">
    <meta property="og:description"
          content="Retrouvez des annonces pour des commissions, demandées par la communauté !" />
@endsection

@push('stylesheets')
    <style>
        .thumbnail-75px{
            width: 75px;
        }
        .alert-error{
            background: #d72b2b;
            color: #ffffff;
        }
    </style>
@endpush

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h3 class="text-white mt-10">Les commissions</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active text-gray-silver">Les commissions</li>
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
                    @if(count($commissions) > 0)
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
                        <div class="row mb-15">
                            <div class="col-sm-12 col-md-12">
                                <div class="alert alert-error bg-theme-color-1">
                                    Aucune annonce ne correspond à cette catégorie.
                                </div>
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
                                                {{ $category->name }} ({{ count($category->commissions) }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Widget last tutorials -->
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Dernières <span class="text-theme-color-2">offres</span></h5>
                            <div class="latest-posts">
                                @if($lastCommissions)
                                    @foreach($lastCommissions as $commission)
                                        <article class="post media-post clearfix pb-0 mb-10">
                                            <a class="post-thumb" href="#">
                                                <img class="thumbnail-75px" src="{{ asset('storage/' . $commission->cover_path) }}">
                                            </a>
                                            <div class="post-right">
                                                <h5 class="post-title mt-0"><a href="{{ route('commission_show', $commission->slug) }}">{{ str_limit($commission->title, $limit = 20, $end = '...') }}</a></h5>
                                            </div>
                                        </article>
                                    @endforeach
                                @else
                                    <div class="alert alert-error">
                                        Aucun tutoriel n'est encore publié.
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- /Widget last tutorials -->
                    </div>
                </div>
            </div><div class="row">
                <div class="col-sm-12">
                    <nav>
                        {{ $commissions->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
