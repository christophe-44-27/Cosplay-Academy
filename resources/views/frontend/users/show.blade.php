@extends('layout.layout_without_search_bar')

@section('content')
    <!--User Profile-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pattern-1">
                            <div class="wideget-user">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="wideget-user-desc text-center">
                                            <div class="wideget-user-img">
                                                @if($user->avatar)
                                                    <img class="brround" src="{{ asset('storage/' . $user->avatar) }}" alt="img">
                                                @else
                                                    <img class="brround" src="{{ asset('themes/frontend/images/users/default.jpg') }}" alt="img">
                                                @endif
                                            </div>
                                            <div class="user-wrap wideget-user-info">
                                                <a href="#" class="text-white"><h4 class="font-weight-semibold">{{ $user->name }}</h4></a>
                                                <span class="text-white">@lang("Membre depuis ") {{ \Illuminate\Support\Carbon::createFromTimeString($user->created_at)->format('M Y') }}</span>
                                                <div class="wideget-user-rating">
                                                    @include('frontend.elements.blocs.user_rating') <span class="text-white"> {{ round($avgReviews, 2) }} ({{ $authorCoursesReviews->count() }} @lang('Avis'))</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <div class="wideget-user-info ">
                                            <div class="wideget-user-icons mt-2">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#tab-1" class="active" data-toggle="tab">{{ $user->name }}</a></li>
                                            <li><a href="#tab-2" data-toggle="tab" class="">@lang("Mes cours")</a></li>
                                            <li><a href="#tab-3" data-toggle="tab" class="">@lang("Mes tutoriels")</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-1">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="profile-log-switch">
                                            <div class="media-heading">
                                                <h3 class="card-title mb-3 font-weight-bold">Personal Details</h3>
                                            </div>
                                            <ul class="usertab-list mb-0">
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">@lang("Nom d'artiste") :</span> <span class="text-muted"> {{ $user->name }}</span></a></li>
                                                <li>
                                                    <a href="#" class="text-dark">
                                                        <span class="font-weight-semibold">@lang("Pays") :</span>
                                                        <span class="text-muted">
                                                            @if($user->country)
                                                                {{ $user->country->name }}
                                                            @else
                                                                @lang("Non renseigné")
                                                            @endif
                                                        </span>
                                                    </a>
                                                </li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">@lang("Langues parlées") :</span> <span class="text-muted"> Non renseignée</span>.</a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">@lang("Site internet") :</span><span class="text-muted">{{ ($user->website) ? $user->website : ' Non renseigné' }}</span></a></li>
                                            </ul>
                                            <div class="row profie-img">
                                                <div class="col-md-12">
                                                    <div class="media-heading">
                                                        <h3 class="card-title mb-3 font-weight-bold">@lang("Présentation")</h3>
                                                    </div>
                                                    {!! $user->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane userprof-tab" id="tab-2">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <!--Coursed lists-->
                                        <div class=" mb-lg-0">
                                            <div class="">
                                                <div class="item2-gl ">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab-11">
                                                            @if($courses)
                                                                @foreach($courses as $course)
                                                                    <div class="card overflow-hidden">
                                                                        <div class="d-md-flex">
                                                                            <div class="item-card9-img">
                                                                                <div class="item-card9-imgs">
                                                                                    <a href="{{ route('course_details', $course) }}"></a>
                                                                                    @if($course->thumbnail_picture)
                                                                                        <img src="{{ asset('storage/' . $course->thumbnail_picture) }}" alt="img" class="cover-image">
                                                                                    @else
                                                                                        <img src="{{ asset('images/default-thumbnails.png') }}" align="img" class="cover-image">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="item-card9-icons">
                                                                                    <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart"></i></a>
                                                                                    <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card border-0 mb-0">
                                                                                <div class="card-body ">
                                                                                    <div class="item-card9">
                                                                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold mt-1">{{ $course->title }}</h3></a>
                                                                                        <div class="mt-2 mb-2">
                                                                                            <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-briefcase mr-1"></i> {{ $course->category->name }}</span></a>
                                                                                            <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> {{ $course->user->name }}</span></a>
                                                                                            <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> {{ $course->created_at->diffForHumans() }}</span></a>
                                                                                        </div>
                                                                                        <p class="mb-0 leading-tight">{{ \Illuminate\Support\Str::limit($course->introduction, 50) }} </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-footer pt-4 pb-4">
                                                                                    <div class="item-card9-footer d-flex">
                                                                                        <div class="item-card9-cost">
                                                                                            <h4 class="text-dark font-weight-semibold mb-0 mt-0">
                                                                                                @if($course->amount > 0)
                                                                                                    {{ $course->amount }} $
                                                                                                @else
                                                                                                    @lang('Gratuit')
                                                                                                @endif
                                                                                            </h4>
                                                                                        </div>
                                                                                        <div class="ml-auto">
                                                                                            <div class="rating-stars block">
                                                                                                <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="{{ round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) }}">
                                                                                                <div class="rating-stars-container">
                                                                                                    @if($course->reviews->count() > 0)
                                                                                                        @include('frontend.elements.blocs.rating')
                                                                                                    @else
                                                                                                        <div class="rating-star sm">
                                                                                                            <i class="fa fa-star"></i>
                                                                                                        </div>
                                                                                                        <div class="rating-star sm">
                                                                                                            <i class="fa fa-star"></i>
                                                                                                        </div>
                                                                                                        <div class="rating-star sm">
                                                                                                            <i class="fa fa-star"></i>
                                                                                                        </div>
                                                                                                        <div class="rating-star sm">
                                                                                                            <i class="fa fa-star"></i>
                                                                                                        </div>
                                                                                                        <div class="rating-star sm">
                                                                                                            <i class="fa fa-star"></i>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="card overflow-hidden">
                                                                    <div class="d-md-flex">
                                                                        <div class="alert alert-primary" role="alert">
                                                                            Ce professeur n'a encore publié aucun cours, patience :)
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/Coursed lists-->
                                    </div>
                                </div>
                                <!--Coursed Listing-->
                            </div>
                            <div class="tab-pane userprof-tab" id="tab-3">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <!--tutorials lists-->
                                        <div class=" mb-lg-0">
                                            <div class="">
                                                <div class="item2-gl ">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab-11">
                                                            @if($tutorials)
                                                                @foreach($tutorials as $tutorial)
                                                                    <div class="card overflow-hidden">
                                                                        <div class="d-md-flex">
                                                                            <div class="item-card9-img">
                                                                                <div class="item-card9-imgs">
                                                                                    <a href="{{ route('tutorial_details', $tutorial) }}"></a>
                                                                                    @if($tutorial->thumbnail_picture)
                                                                                        <img src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}" alt="img" class="cover-image">
                                                                                    @else
                                                                                        <img src="{{ asset('images/default-thumbnails.png') }}" align="img" class="cover-image">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="item-card9-icons">
                                                                                    <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart"></i></a>
                                                                                    <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card border-0 mb-0">
                                                                                <div class="card-body ">
                                                                                    <div class="item-card9">
                                                                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold mt-1">{{ $tutorial->title }}</h3></a>
                                                                                        <div class="mt-2 mb-2">
                                                                                            <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-briefcase mr-1"></i> {{ $tutorial->category->name }}</span></a>
                                                                                            <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> {{ $tutorial->user->name }}</span></a>
                                                                                            <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> {{ $tutorial->created_at->diffForHumans() }}</span></a>
                                                                                        </div>
                                                                                        <p class="mb-0 leading-tight">{!! \Illuminate\Support\Str::limit(strip_tags($tutorial->content), 25  ) !!} </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-footer pt-4 pb-4">
                                                                                    <div class="item-card9-footer d-flex">
                                                                                        <div class="item-card9-cost">
                                                                                            <h4 class="text-dark font-weight-semibold mb-0 mt-0">
                                                                                                @lang('Gratuit')
                                                                                            </h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="alert alert-info">
                                                                    Ce professeur n'a encore publié aucun tutoriels, patience :)
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/tutorials lists-->
                                    </div>
                                </div>
                                <!--Coursed Listing-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
