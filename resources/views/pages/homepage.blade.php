@extends('layout.base_layout')

@section('content')
    <!--Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Catégories les plus populaires</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>Explorez les catégories préférées de nos visiteurs</p>
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
    </section><!--/Section-->

    <!--Section-->
    <section class="sptb ">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Derniers contenus</h2>
                <span class="sectiontitle-design"><span class="icons"></span></span>
                <p>Améliorez-vous et apprenez de nouvelles choses grâce aux contenus que nous vous proposons</p>
            </div>
            <div id="myCarousel1" class="owl-carousel owl-carousel-icons2">
                @foreach($courses as $course)
                    <div class="item">
                    <div class="card mb-0">
                        <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
                        <div class="item-card2-img">
                            <a href="page-details.html"></a>
                            <img src="{{ asset('themes/frontend/images/media/pictures/6.jpg') }}" alt="img" class="cover-image">
                            <div class="item-tag">
                                <h4  class="mb-0">
                                    @if($course->price and $course->price > 0)
                                        {{ $course->price }} $
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
                            <a href="page-details.html" class="item-card2-icons-l"> <i class="fa fa-share-alt"></i></a>
                            <a href="page-details.html" class="item-card2-icons-l"> <i class="fa fa-heart text-danger"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text mb-3">
                                        <a href="page-details.html" class="text-dark"><h4 class="mb-2">{{ $course->title }}</h4></a>
                                    </div>
                                    <p class="">{{ \Illuminate\Support\Str::limit($course->content, 20) }} </p>
                                    <ul class="mb-0">
                                        <li><a href="#" class="icons"><i class="icon icon-flag  mr-1"></i>  {{ $course->language->name }}</a></li>
                                        <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> {{ $course->created_at->diffForHumans() }}</a></li>
                                        <li><a href="#" class="icons"><i class="icon icon-user mr-1"></i> {{ $course->user->name }}</a></li>
                                        <li><a href="#" class="icons"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-eye"></i></span> Voir</a>
                                <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-heart"></i></span> Favoris</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!--/Section-->
@endsection

@push('javascripts')

@endpush
