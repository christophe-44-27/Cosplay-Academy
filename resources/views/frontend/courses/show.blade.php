@extends('layout.layout_without_search_bar')
@push('stylesheets')
    <link href="{{ asset('themes/frontend/plugins/accordion/accordion.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/courses.css') }}" rel="stylesheet" />
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
                                    <div class="rating-stars d-flex ml-5">
                                        <div class="rating-stars-container mr-2">
                                            <div class="rating-star sm">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                        </div> {{ $course->userViews->count() }} @lang('vues')
                                    </div>
                                </div>
                            </div>
                            <div class="product-slider">
                                <ul class="list-unstyled video-list-thumbs">
                                    <li class="mb-0">
                                        <a data-toggle="modal" data-target="#homeVideo" class="p-0">
                                            {{--<div class="arrow-ribbon bg-primary">20% off</div>--}}
                                            <img src="{{ asset('storage/' . $course->main_picture) }}" alt="img" class="img-responsive br-3">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">@lang("Introduction")</h3></div>
                        <div class="card-body">
                            <div class="mb-4 description">
                                {!! $course->introduction !!}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-list">
                                <a href="#" class="btn btn-secondary icons"><i class="fe fe-share-2 mr-1"></i> @lang("Partager")</a>
                                <a href="#" class="btn btn-danger icons" data-toggle="modal" data-target="#report"><i class="icon icon-exclamation mr-1"></i> @lang("Signaler")</a>
                                <a href="{{ route('course_add_to_favorites', $course) }}" class="btn btn-primary icons">
                                    <i class="icon icon-heart  mr-1"></i> {{ $course->userFavorites->count() }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Contenu du cours")</h3>
                        </div>
                        <div class="card-body">
                            @if(!empty($course->sessions) and $course->sessions->count() > 0 and $course->sessions->count() > 1)
                                @foreach($course->sessions as $session)
                                    <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default active">
                                            <div class="panel-heading " role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse-{{ $session->id }}" aria-expanded="false" aria-controls="collapse-{{ $session->id }}" class="collapsed">
                                                       {{ $session->name }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-{{ $session->id }}" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                                                <div class="panel-body">
                                                    <table class="table table-hover">
                                                        @foreach($session->contents as $content)
                                                            <tr>
                                                                <td width="30px"><i class="fa {{ ($content->type == 'video') ? 'fa-video-camera' : 'fa-edit' }} " style="font-size: 30px"></i> </td>
                                                                <td style="line-height: 30px">{{ $content->name }}</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    @if($content->free == '1')
                                                                        @if(!$userAlreadyParticipate)
                                                                            <a href="#" target="_blank" style="font-weight: bold">@lang("Aperçu")</a>
                                                                        @else
                                                                            <a href="{{ route('course_show_content', ['course' => $course, 'content' => $content]) }}" style="font-weight: bold">@lang("Accéder à la leçon")</a>
                                                                        @endif
                                                                    @else
                                                                        @if(!$userAlreadyParticipate)
                                                                            <i class="fa-2x fa fa-lock"></i>
                                                                        @else
                                                                            <a href="{{ route('course_show_content', ['course' => $course, 'content' => $content]) }}" style="font-weight: bold">@lang("Accéder à la leçon")</a>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default active">
                                        <div class="panel-heading " role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                    {{ $course->sessions->first()->name }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                                            <div class="panel-body">
                                                <table class="table table-hover">
                                                    @foreach($course->sessions->first()->contents as $content)
                                                        <tr>
                                                            <td width="30px"><i class="fa {{ ($content->type == 'video') ? 'fa-video-camera' : 'fa-edit' }} " style="font-size: 30px"></i> </td>
                                                            <td style="line-height: 30px">{{ $content->name }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                @if($content->free == '1')
                                                                    @if(!$userAlreadyParticipate)
                                                                        <a href="#" target="_blank" style="font-weight: bold">@lang("Aperçu")</a>
                                                                    @else
                                                                        <a href="{{ route('course_show_content', ['course' => $course, 'content' => $content]) }}" style="font-weight: bold">@lang("Accéder à la leçon")</a>
                                                                    @endif
                                                                @else
                                                                    @if(!$userAlreadyParticipate)
                                                                        <i class="fa-2x fa fa-lock"></i>
                                                                    @else
                                                                        <a href="{{ route('course_show_content', ['course' => $course, 'content' => $content]) }}" style="font-weight: bold">@lang("Accéder à la leçon")</a>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                                    <div class="item-card7-overlaytext">
                                        <h4 class="font-weight-semibold mb-0"> {{ $relatedCours->content_price->name }}</h4>
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
                                @if(!$userAlreadyParticipate)
                                    <div class="alert alert-info">
                                        @lang("Vous devez vous inscrire au cours pour pouvoir le commenter lui attribuer une note.")
                                    </div>
                                @else
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
                                @endif
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
                                        {{ $course->content_price->amount_in_cents / 100 }} $
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                @if(!$userAlreadyFavorite)
                                    <a href="{{ route('course_add_to_favorites', $course )}}" class="btn btn-primary btn-lg btn-block">@lang("Ajouter aux favoris")</a>
                                @else
                                    <a href="{{ route('course_favorite_remove', $course )}}" class="btn btn-azure btn-lg btn-block">@lang("Retirer des favoris")</a>
                                @endif

                                @if($course->content_price->name != 'Gratuit')
                                    <a href="{{ route('cart_item_add', $course) }}" class="btn btn-secondary btn-lg btn-block">@lang("Acheter")</a>
                                @else
                                    @if(!$userAlreadyParticipate)
                                        <a href="{{ route('course_user_participate', $course) }}" class="btn btn-azure btn-lg btn-block">@lang("S'inscrire")</a>
                                    @else
                                        <a href="{{ route('course_user_cancel_participation', $course) }}" class="btn btn-warning btn-lg btn-block">@lang("Se désincrire")</a>
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
                                @if($course->user->avatar)
                                    <img src="{{ asset('storage/' . $course->user->avatar) }}" class="brround avatar-xxl" alt="user">
                                @else
                                    <img src="{{ asset('themes/frontend/images/users/default.jpg') }}" class="brround avatar-xxl" alt="user">
                                @endif
                                <div >
                                    <a href="{{ route('user_profile', $course->user) }}" class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold">{{ $course->user->name }}</h4></a>
                                    <span class="text-muted">@lang("Membre depuis ") {{ \Illuminate\Support\Carbon::createFromTimeString($course->user->created_at)->format('M Y') }}</span>
                                </div>
                                <h6 class="mt-2 mb-0">
                                    <a href="#" class="btn btn-primary btn-sm">@lang("Voir ses cours")</a>
                                    <a href="#" class="btn btn-secondary btn-sm">{{ $course->user->courses()->count() }} @lang("Cours")</a>
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
                                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#contact"><i class="fa fa-user"></i> @lang("Contactez-moi")</a>
                            </div>
                        </div>
                    </div>
                    @if($featuredCourses)
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang("Mis en avant") </h3>
                            </div>
                            <div class="card-body">
                                <div class="rated-products">
                                    <ul class="vertical-scroll">
                                        @foreach($featuredCourses as $featuredCourse)
                                            <li class="item">
                                            <div class="media m-0 mt-0 p-5">
                                                <img class="mr-4" src="{{ asset('storage/' . $featuredCourse->thumbnail_picture ) }}" alt="img">
                                                <div class="media-body">
                                                    <h4 class="mt-2 mb-1">{{ $featuredCourse->title }}</h4>
                                                    <span class="rated-products-ratings">
                                                            <i class="fa fa-star text-warning"> </i>
                                                            <i class="fa fa-star text-warning"> </i>
                                                            <i class="fa fa-star text-warning"> </i>
                                                            <i class="fa fa-star text-warning"> </i>
                                                            <i class="fa fa-star text-warning"> </i>
                                                        </span>
                                                    <div class="h5 mb-0 font-weight-semibold mt-1">{{ $featuredCourse->content_price->name }}</div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
    </section><!--/Section-->
@endsection
@push('javascripts')
    <script src="{{ asset('themes/frontend/plugins/accordion/accordion.min.js') }}"></script>
@endpush
