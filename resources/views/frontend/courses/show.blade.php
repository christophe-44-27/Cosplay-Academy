@extends('layout.layout_without_search_bar')
@push('stylesheets')
    <link href="{{ asset('themes/frontend/plugins/accordion/accordion.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="item-det mb-4">
                                <a href="#" class="text-dark">
                                    <h3>
                                        {{ $course->title }}
                                    </h3>
                                </a>
                                <div class=" d-flex">
                                    <ul class="d-flex mb-0">
                                        <li class="mr-5">
                                            <a href="#" class="icons">
                                                <i class="pe-7s-medal text-muted mr-1"></i>
                                                @switch($course->difficulty)
                                                    @case(1)
                                                        @lang("Novice")
                                                        @break
                                                    @case(2)
                                                        @lang("Intermédiaire")
                                                        @break
                                                    @case(3)
                                                        @lang("Expert")
                                                        @break
                                                    @default
                                                        @lang('Grand public')
                                                @endswitch
                                            </a>
                                        </li>
                                        <li class="mr-5">
                                            <a href="#" class="icons">
                                                <i class="icon icon-people text-muted mr-1"></i> {{ $course->participants->count() }} @lang('participants')
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="rating-stars d-flex mr-5">
                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" id="rating-stars-value" value="4">
                                        <div class="rating-stars-container mr-2">
                                            @include('frontend.elements.blocs.rating')
                                        </div>
                                    </div>
                                    <div class="rating-stars d-flex">
                                        <div class="rating-stars-container mr-2">
                                            <div class="rating-star sm">
                                                <i class="fa fa-heart"></i>
                                            </div>
                                        </div> {{ $course->userFavorites->count() }} @lang('favoris')
                                    </div>
                                </div>
                            </div>
                            <div class="product-slider">
                                <ul class="list-unstyled video-list-thumbs">
                                    <li class="mb-0">
                                        <a data-toggle="modal" data-target="#homeVideo" class="class-video p-0">
                                            {{--<div class="arrow-ribbon bg-primary">20% off</div>--}}
                                            <img src="{{ asset('storage/' . $course->thumbnail_picture) }}" alt="img" class="img-responsive br-3">
                                            <span class="fe fe-play-circle text-white class-icon"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Contenu du cours")</h3>
                        </div>
                        <div class="card-body">
                            <ul class="accordionjs m-0">
                                @if(!empty($course->sessions) and $course->sessions->count() > 0 and $course->sessions->count() > 1)
                                    @foreach($course->sessions as $session)
                                        <li class="acc_section {{ ($userAlreadyParticipate == true) ? 'acc_active' : '' }}">
                                            <div class="acc_head"><h3>{{ $session->name }}</h3></div>
                                            @if($userAlreadyParticipate == true)
                                                <div class="acc_content">
                                                    @if($session->content->type == 'article')
                                                        {!! $session->content->content_article !!}
                                                    @else
                                                        URL VIDEO
                                                    @endif
                                                    <!-- Your text here. For this demo, the content is generated automatically. -->
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                    <li class="acc_section acc_active">
                                        <div class="acc_head"><h3>{{ $course->sessions->first()->name }}</h3></div>
                                        <div class="acc_content">
                                            LOL
                                            <!-- Your text here. For this demo, the content is generated automatically. -->
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="btn-list">
                                <a href="#" class="btn btn-secondary icons"><i class="fe fe-share-2 mr-1"></i> @lang("Partager")</a>
                                <a href="#" class="btn btn-danger icons" data-toggle="modal" data-target="#report"><i class="icon icon-exclamation mr-1"></i> @lang("Signaler")</a>
                                <a href="#" class="btn btn-primary icons"><i class="icon icon-heart  mr-1"></i> {{ $course->userFavorites->count() }}</a>
                            </div>
                        </div>
                    </div>
                    @if($relatedCourses->count() > 0)
                        <h3 class="mb-5 mt-4">@lang("Dans la même catégorie")</h3>
                        <!--Related Posts-->
                        <div id="myCarousel5" class="owl-carousel owl-carousel-icons3">
                            <!-- Wrapper for carousel items -->
                            @foreach($relatedCourses as $relatedCours)
                                <div class="item">
                                <div class="card">
                                    <div class="item-card7-imgs">
                                        <a href="{{ route('course_details', $relatedCours) }}"></a>
                                        <img src="{{ asset('storage/' . $relatedCours->thumbnail_picture) }}" alt="img" class="cover-image">
                                    </div>
                                    <div class="card-body">
                                        <div class="item-card7-desc mb-3">
                                            <a href="{{ route('course_details', $relatedCours) }}" class="text-dark">
                                                <h3 class="font-weight-semibold">{{ $relatedCours->title }}</h3>
                                            </a>
                                        </div>
                                        <div class="item-card7-text">
                                            <ul class="icon-card mb-0">
                                                <li ><a href="#" class="icons"><i class="icon icon-user  mr-1"></i> {{ $relatedCours->user->name }}</a></li>
                                                <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> {{ $relatedCours->created_at->diffForHumans() }}</a></li>
                                            </ul>
                                            <p class="mb-0 mt-2 fs-16">
                                                {{ \Illuminate\Support\Str::limit($relatedCours->content, 62) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="item-card2-footer">
                                            <a href="{{ route('course_details', $relatedCours) }}" class="btn btn-secondary">
                                                <span class="font-weight-bold"><i class="fa fa-eye"></i> </span> @lang("Voir")
                                            </a>
                                            <a href="{{ route('course_add_to_favorites', $relatedCours) }}" class="btn btn-primary text-white float-right">
                                                <span class="font-weight-bold"><i class="fa fa-heart"></i> </span> @lang("Ajouter aux favoris")
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--/Related Posts-->
                    @endif

                    <!--Comments-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Commentaires")</h3>
                        </div>
                        <div class="card-body p-0">
                            @if($course->reviews->count() > 0)
                                @foreach($course->reviews as $review)
                                    <div class="media mt-0 p-5">
                                        <div class="d-flex mr-3">
                                            <a href="#">
                                                @if($review->author->avatar)
                                                    <img class="media-object brround" alt="64x64" src="{{ asset('storage/' . $review->author->avatar) }}">
                                                @else
                                                    <img class="media-object brround" alt="64x64" src="{{ asset('themes/frontend/images/users/default.jpg') }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-1 font-weight-bold">{{ $review->author->name }}
                                                <span class="fs-14 ml-2">
                                                    @include('frontend.elements.blocs.comment_rating')
                                                </span>
                                            </h4>
                                            <small class="text-muted">
                                                <i class="fa fa-calendar"></i>
                                                {{ \Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('M Y') }}
                                            </small>
                                            <p class="fs-15  mb-2 mt-2">
                                                {{ $review->content }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="media mt-0 p-5">
                                    <div class="alert alert-info">
                                        @lang("Ce cours n'a pas encore reçu de commentaires.")
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--/Comments-->
                    <div class="card mb-lg-0">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Laisser un commentaire")</h3>
                        </div>
                        <div class="card-body">
                            @auth()
                            {!! Form::open(['url' => route('course_store_review', $course)]) !!}
                            <div>
                                <div class="form-group">
                                    <label class="form-label" for="nb_stars">@lang("Votre note de 1 à 5")</label>
                                    {!! Form::text('nb_stars', null, ['class' => 'form-control'])!!}
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="content">@lang("Votre commentaire")</label>
                                    {!! Form::textarea('content', null, ['class' => 'form-control'])!!}
                                </div>
                                <button type="submit" class="btn btn-primary">@lang("Ajouter un commentaire")</button>
                            </div>
                            {!! Form::close() !!}
                            @endauth

                            @guest()
                                <div class="alert alert-info">
                                    @lang("Vous devez vous connecter afin de laisser un commentaire sur ce cours.")
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
                <!--Right Side Content-->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <div class="text-dark mb-2">
                                    <span class="text-dark font-weight-semibold h1">
                                        @if($course->price > 0)
                                            <small>Prix :</small>
                                            @if($course->reduced_price)
                                                {{ $course->new_price }} $
                                            @else
                                                {{ $course->price }} $
                                            @endif
                                        @else
                                            Cours gratuit
                                        @endif
                                    </span>
                                    @if($course->reduced_price)
                                        <span class="text-muted h3 font-weight-normal ml-1"><span class="strike-text">{{ $course->price }}</span></span>
                                    @endif
                                </div>
                                @if($course->reduced_price)
                                    <p class="text-danger">
                                        <i class="fe fe-clock mr-1"></i>
                                        {{ Carbon::now()->diffInDays($course->reduce_price_ending, false) }}
                                        @lang(" jours avant la fin de cette offre !")
                                    </p>
                                @endif
                            </div>
                            <div class="">
                                <a href="{{ route('course_add_to_favorites', $course )}}" class="btn btn-primary btn-lg btn-block">@lang("Ajouter au favoris")</a>
                                @if($course->price > 0)
                                    <a href="{{ route('cart_item_add', $course) }}" class="btn btn-secondary btn-lg btn-block">@lang("Acheter")</a>
                                @else
                                    @if(!$userAlreadyParticipate)
                                        <a href="{{ route('course_user_participate', $course) }}" class="btn btn-azure btn-lg btn-block">@lang("S'inscrire")</a>
                                    @else
                                        <a href="{{ route('course_user_cancel_participation', $course) }}" class="btn btn-success btn-lg btn-block disabled">@lang("Vous suivez ce cours")</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Formateur")</h3>
                        </div>
                        <div class="card-body  item-user">
                            <div class="profile-pic mb-0">
                                <img src="{{ asset('storage/' . $course->user->avatar) }}" class="brround avatar-xxl" alt="user">
                                <div >
                                    <a href="{{ route('user_profile', $course->user) }}" class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold">{{ $course->user->name }}</h4></a>
                                    <span class="text-muted">@lang("Membre depuis ") {{ \Illuminate\Support\Carbon::createFromTimeString($course->user->created_at)->format('M Y') }}</span>
                                </div>
                                <h6 class="mt-2 mb-0">
                                    <a href="#" class="btn btn-primary btn-sm">@lang("Voir ses cours")</a>
                                    <a href="#" class="btn btn-secondary btn-sm">1245 Views</a>
                                    <a href="#" class="btn btn-info btn-sm">850 Courses</a>
                                </h6>
                            </div>
                        </div>
                        @if($course->user->facebook_profile or $course->user->youtube_profile or $course->user->website or $course->user->instagram_profile
                        or $course->user->pinterest_profile)
                        <div class="card-body item-user">
                            <h4 class="mb-4">@lang("Informations")</h4>
                            @if($course->user->website)
                                <div>
                                    <h6><span class="font-weight-semibold"><i class="fa fa-link mr-2 "></i></span><a href="#" class="text-body">{{ $course->user->website }}</a></h6>
                                </div>
                            @endif
                            <div class=" item-user-icons mt-4">
                                @if(!empty($course->user->facebook_profile))
                                    <a href="{{ $course->user->facebook_profile }}" target="_blank" class="facebook-bg mt-0"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if(!empty($course->user->youtube_profile))
                                    <a href="{{ $course->user->youtube_profile }}" target="_blank" class="youtube-bg mt-0"><i class="fa fa-youtube"></i></a>
                                @endif
                                @if(!empty($course->user->instagram_profile))
                                    <a href="{{ $course->user->youtube_profile }}" target="_blank" class="instagram-bg mt-0"><i class="fa fa-instagram"></i></a>
                                @endif
                                @if(!empty($course->user->pinterest_profile))
                                    <a href="{{ $course->user->pinterest_profile }}" target="_blank" class="pinterest-bg mt-0"><i class="fa fa-pinterest"></i></a>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="card-footer">
                            <div class="text-center">
                                <a href="#" class="btn  btn-primary"><i class="fa fa-envelope"></i> Chat</a>
                                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#contact"><i class="fa fa-user"></i> Contact Me</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Partager sur les réseaux sociaux")</h3>
                        </div>
                        <div class="card-body product-filter-desc">
                            <div class="product-filter-icons text-center">
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                <a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Feature Classes </h3>
                        </div>
                        <div class="card-body">
                            <div class="rated-products">
                                <ul class="vertical-scroll">
                                    <li class="item">
                                        <div class="media m-0 mt-0 p-5">
                                            <img class="mr-4" src="../assets/images/png/11.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1">AutoCAD</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$17 - $29</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media p-5 mt-0">
                                            <img class="mr-4" src="../assets/images/png/1.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1">Digital Marketing</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$22 - $45</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media p-5 mt-0">
                                            <img class=" mr-4" src="../assets/images/png/4.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1">Mobile Computing</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-half-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$35 - $72</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media p-5 mt-0">
                                            <img class=" mr-4" src="../assets/images/png/6.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1"> Data Science</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-half-o text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$12 - $21</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media  mb-0 p-5 mt-0">
                                            <img class=" mr-4" src="../assets/images/png/8.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1"> UNIX</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$89 - $97</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
    </section><!--/Section-->

    <!-- Onlinesletter-->
    <section class="sptb bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-md-12">
                    <div class="sub-newsletter">
                        <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Onlinesletter</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 col-md-12">
                    <div class="input-group sub-input mt-1">
                        <input type="text" class="form-control input-lg " placeholder="Enter your Email">
                        <div class="input-group-append ">
                            <button type="button" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Onlinesletter-->
@endsection
@push('javascripts')
    <script src="{{ asset('themes/frontend/plugins/accordion/accordion.min.js') }}"></script>
@endpush
