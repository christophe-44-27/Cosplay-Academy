@extends('layout.base_layout')

@section('content')
    <section class="sptb pt-6 pb-6">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-12 d-catmb mb-4 mb-xl-0">
                    <div class="d-flex">
                        <div>
                            <span class="icon-service1 icon-primary fs-35">
                                <i class="fe fe-layers"></i>
                            </span></div>
                        <div class="ml-4">
                            <h3 class="mb-2 font-weight-bold">@lang("Diversifiez-vous")</h3>
                            <p class="text-muted mb-0">@lang("Découvrez de nouvelles compétences enseignées par les meilleurs cosplayeurs")</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 d-catmb mb-4 mb-xl-0">
                    <div class="d-flex">
                        <div>
                            <span class="icon-service1 icon-secondary fs-35">
                                <i class="fe fe-book"></i>
                            </span>
                        </div>
                        <div class="ml-4 mt-1">
                            <h3 class=" mb-2 font-weight-bold">@lang("Nos cours")</h3>
                            <p class="text-muted mb-0">@lang("Littéralement les meilleurs cours de cosplay, lancez-vous dans ce vaste monde")</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 d-catmb mb-4 mb-md-0">
                    <div class="d-flex">
                        <div>
                            <span class="icon-service1 icon-success fs-35">
                                <i class="fe fe-users"></i> </span></div>
                        <div class="ml-4 mt-1"><h3 class=" mb-2 font-weight-bold">@lang("Nos experts")</h3>
                            <p class="text-muted mb-0">@lang("Demandez de l'aide aux professeurs afin de vous débloquez sur leurs cours")</p></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="d-flex">
                        <div><span class="icon-service1 icon-warning fs-35"> <i class="fe fe-file-text"></i> </span>
                        </div>
                        <div class="ml-4 mt-1"><h3 class=" mb-2 font-weight-bold">@lang("Certification") </h3>
                            <p class="text-muted mb-0">@lang("Obtenez une certification de réussite à l'issu du cours")</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>@lang("Catégories les plus populaires")</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>@lang("Explorez les catégories préférées de nos visiteurs")</p>
            </div>
            <div class="item-all-cat center-block text-center education-categories">
                <div class="row">
                    @if($categories)
                        @foreach($categories as $category)
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="item-all-card text-dark text-center">
                                    <a href="{{ route('courses_by_category', $category->filter_value) }}"></a>
                                    <div class="iteam-all-icon">
                                        <i class="{{ $category->icon_name }} gradient-icon"></i>
                                    </div>
                                    <div class="item-all-text mt-3">
                                        <h5 class="mb-0">@lang($category->name)</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <section class="sptb ">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>@lang("Nos coups de coeur")</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>Nous avons sélectionné pour vous nos contenus préférés <3</p>
            </div>
            <div id="myCarousel2" class="owl-carousel owl-carousel-icons2">
                @foreach($featuredTutorials as $featuredTutorial)
                    <div class="item">
                        <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">@lang("Coup de coeur")</span></div>
                        <div class="card mb-0">
                        <div class="item-card2-img">
                            <a href="{{ route('tutorial_details', $featuredTutorial) }}"></a>
                            @if($featuredTutorial->thumbnail_picture)
                                <img src="{{ asset('storage/' . $featuredTutorial->thumbnail_picture) }}" alt="img"
                                     class="cover-image">
                            @else
                                <img src="https://via.placeholder.com/740x440" alt="img"
                                     class="cover-image">
                            @endif
                            <div class="item-tag">
                                <h4  class="mb-0">
                                    @if($featuredTutorial->content_price->amount_in_cents > 0)
                                        {{ $featuredTutorial->content_price->amount_in_cents / 100 }} $
                                    @else
                                        Gratuit
                                    @endif
                                </h4>
                            </div>
                            <div class="item-overly-trans">
                                <div class="rating-stars d-flex">
                                    <span class="text-white mr-1 pl-1">5.0</span>
                                    <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
                                    <div class="rating-stars-container">
                                        <div class="rating-star sm is--active">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star sm is--active">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star sm is--active">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star sm">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star sm">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-card2-icons">
                            <a href="{{ route('tutorial_add_to_favorites', $featuredTutorial) }}" class="item-card2-icons-l"> <i class="fa fa-heart text-danger"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text mb-3">
                                        <a href="{{ route('tutorial_details', $featuredTutorial) }}" class="text-dark"><h4 class="mb-2">{{ $featuredTutorial->title }}</h4></a>
                                    </div>
                                    <p class="">{{ \Illuminate\Support\Str::limit($featuredTutorial->content, 20) }} </p>
                                    <ul class="mb-0">
                                        <li><a href="#" class="icons"><i class="icon icon-flag  mr-1"></i>  {{ $featuredTutorial->language->name }}</a></li>
                                        <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> {{ $featuredTutorial->created_at->diffForHumans() }}</a></li>
                                        <li><a href="#" class="icons"><i class="icon icon-user mr-1"></i> {{ $featuredTutorial->user->name }}</a></li>
                                        <li><a href="#" class="icons"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <a href="{{ route('tutorial_details', $featuredTutorial) }}" class="btn btn-outline-dark"><span
                                        class="font-weight-bold"><i class="fa fa-eye"></i></span> Voir</a>
                                <a href="{{ route('tutorial_add_to_favorites', $featuredTutorial) }}"
                                   class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i
                                            class="fa fa-heart"></i></span> Favoris</a>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/Section-->

    @guest()
    <section>
        <div class="cover-image sptb bg-background">
            @include('elements.blocs.notifications')
            <div class="header-text1 mb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <div class="text-white mt-xl-7 mb-5"><h1 class="mb-3 display-3">@lang("Devenir un")
                                    <span class="font-weight-bold"> @lang("Professeur")</span>
                                </h1>
                                <p class="fs-18 mb-6">@lang("Vous êtes un ou une passionné(e) de cosplay et vous
                                avez envie de transmettre vos compétences à d'autres cosplayeur ? Inscrivez-vous et mettez vos
                                cours en ligne sur la Cosplay Academy ! Vous avez aussi envie de gagner de l'argent ? Aucun
                                problème, vous pouvez créer des cours gratuits ou payants. A vous de voir !")</p>
                                <a href="#" class="btn btn-primary btn-lg mr-2">@lang("Je m'inscris !")</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-12">
                            <div class="card mb-0 shadow-none">
                                <registration-form></registration-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /header-text -->
        </div>
    </section>
    @endguest

    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center"><h2>@lang("Comment ça marche ?")</h2> <span
                    class="sectiontitle-design"><span class="icons"></span></span>
                <p>@lang("Vous voulez donner des cours de cosplay ? Rien de plus simple !")</p></div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about"><img
                                        src="{{ asset('themes/frontend/images/png/about/checklist.png') }}" alt="img"></div>
                                <div class="servic-data mt-3"><h4 class="font-weight-semibold mb-2">@lang("Inscrivez-vous")</h4>
                                    <p class="text-muted mb-0">@lang("L'inscription ne dure que 2min top chrono")</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about"><img
                                        src="{{ asset('themes/frontend/images/png/about/pencil.png') }}" alt="img"></div>
                                <div class="servic-data mt-3"><h4 class="font-weight-semibold mb-2">@lang("Rédigez vos cours")</h4>
                                    <p class="text-muted mb-0">@lang("N'hésitez pas à demander de l'aide à nos conseillers !")</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-sm-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about"><img
                                        src="{{ asset('themes/frontend/images/png/about/employees.png') }}" alt="img"></div>
                                <div class="servic-data mt-3"><h4 class="font-weight-semibold mb-2">@lang("Soumettez-le")</h4>
                                    <p class="text-muted mb-0">@lang("Nous allons vérifier que votre cours correspond à nos standards")</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about"><img
                                        src="{{ asset('themes/frontend/images/png/about/coins.png') }}" alt="img"></div>
                                <div class="servic-data mt-3"><h4 class="font-weight-semibold mb-2">@lang("Gagnez de l'argent !")</h4>
                                    <p class="text-muted mb-0">@lang("Si votre cours est payant, commencez à percevoir des revenus !")</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Derniers contenus</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>Améliorez-vous et apprenez de nouvelles choses grâce aux contenus que nous vous proposons</p>
            </div>
            <div id="myCarousel1" class="owl-carousel owl-carousel-icons2">
                @foreach($tutorials as $tutorial)
                    <div class="item">
                        <div class="card mb-0">
                            <div class="item-card2-img">
                                <a href="{{ route('tutorial_details', $tutorial) }}"></a>
                                @if($tutorial->thumbnail_picture)
                                    <img src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}" alt="img"
                                         class="cover-image">
                                @else
                                    <img src="https://via.placeholder.com/740x440" alt="img"
                                         class="cover-image">
                                @endif
                                <div class="item-tag">
                                    <h4  class="mb-0">
                                        @if($tutorial->content_price->amount_in_cents == 0)
                                            @lang("Gratuit")
                                        @else
                                            {{ $tutorial->content_price->amount_in_cents / 100 }}

                                            @switch($tutorial->content_price->country->currency)
                                                @case('CAD')
                                                    $
                                                    @break
                                                @case('EUR')
                                                    €
                                                    @break
                                                @default
                                                    $
                                                    @break
                                            @endswitch
                                        @endif
                                    </h4>
                                </div>
                                <div class="item-overly-trans">
                                    <div class="rating-stars d-flex">
                                        <span class="text-white mr-1 pl-1">5.0</span>
                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
                                        <div class="rating-stars-container">
                                            <div class="rating-star sm is--active">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm is--active">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm is--active">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-card2-icons">
                                <a href="{{ route('tutorial_add_to_favorites', $tutorial) }}" class="item-card2-icons-l"> <i class="fa fa-heart text-danger"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text mb-3">
                                            <a href="{{ route('tutorial_details', $tutorial) }}" class="text-dark"><h4 class="mb-2">{{ $tutorial->title }}</h4></a>
                                        </div>
                                        <p class="">{{ \Illuminate\Support\Str::limit($tutorial->content, 20) }} </p>
                                        <ul class="mb-0">
                                            <li><a href="#" class="icons"><i class="icon icon-flag  mr-1"></i>  {{ $tutorial->language->name }}</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> {{ $tutorial->created_at->diffForHumans() }}</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-user mr-1"></i> {{ $tutorial->user->name }}</a></li>
                                            <li><a href="#" class="icons"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="item-card2-footer">
                                    <a href="{{ route('tutorial_details', $tutorial) }}" class="btn btn-outline-dark"><span
                                            class="font-weight-bold"><i class="fa fa-eye"></i></span> Voir</a>
                                    <a href="{{ route('tutorial_add_to_favorites', $tutorial) }}"
                                       class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i
                                                class="fa fa-heart"></i></span> Favoris</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/Section-->

@endsection

@push('javascripts')

@endpush
