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
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/cosplay-school-bg.png') }}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white">Découvrez la communauté francophone de cosplay</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active text-gray-silver">Découvrez la communauté francophone de cosplay</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Works Filter -->
                    <div class="portfolio-filter font-alt align-center">
                        <a href="#" class="active" data-filter="*">Toutes</a>
                        @foreach($categories as $category)
                            <a href="#{{ $category->slug }}" class="" data-filter=".{{ $category->slug }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    <!-- End Works Filter -->

                    <!-- Portfolio Gallery Grid -->
                    <div id="grid" class="gallery-isotope grid-3 masonry gutter clearfix">
                        @if($galleries)
                            @foreach($galleries as $gallery)
                                <!-- Portfolio Item Start -->
                                <div class="gallery-item {{ $gallery->galleryCategory->slug }}">
                                    <div class="thumb">
                                        <img class="img-fullwidth" src="{{ asset('storage/' . $gallery->cover_frontend) }}" alt="project">
                                        <div class="overlay-shade"></div>
                                        <div class="icons-holder">
                                            <div class="icons-holder-inner">
                                                <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                    <a href="{{ route('community_gallery_show', $gallery->slug) }}"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="hover-link" data-lightbox="image" href="{{ asset('storage/' . $gallery->cover_frontend) }}">View more</a>
                                    </div>
                                </div>
                            @endforeach
                        <!-- Portfolio Item End -->
                        @else
                            Aucun album n'a été créé
                        @endif
                    </div>
                    <!-- End Portfolio Gallery Grid -->
                </div>
            </div>
        </div>
    </section>
@endsection
