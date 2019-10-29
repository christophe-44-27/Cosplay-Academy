@extends('layout.layout_without_search_bar')

@section('content')
    <!--Breadcrumb-->
    <div class="bg-white border-bottom">
        <div class="container">
            <div class="page-header">
                <h4 class="page-title">@lang('Liste des cours')</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">@lang('Accueil')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('Liste des cours')</li>
                </ol>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->

    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <!--Left Side Content-->
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group">
                                {!! Form::open(['method' => 'get', 'url' => route('search_courses_homepage')]) !!}
                                    <input value="{{ (isset($keywords) && $keywords != null) ? $keywords : null }}" type="text"
                                           name="keywords" class="form-control br-tl-3 br-bl-3"
                                           placeholder="@lang('Nom du cours')">
                                    <div class="input-group-append ">
                                        <button type="submit" class="btn btn-primary br-tr-3 br-br-3">
                                            @lang('Rechercher')
                                        </button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card mb-lg-0">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Catégories")</h3>
                        </div>
                        <div class="card-body">
                            <div class="" id="container">
                                <div class="filter-product-checkboxs">
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <label class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" name="checkbox1"
                                                       value="option1" {{ (isset($selectedCategory) && $selectedCategory == $category->filter_value) ? 'checked' : '' }}>
                                                <span class="custom-control-label">
                                                    <a href="#" class="text-dark">@lang($category->name) <span
                                                            class="label label-secondary float-right">14</span></a>
                                                </span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-header border-top">
                            <h3 class="card-title">@lang('Difficulté')</h3>
                        </div>
                        <div class="card-body">
                            <div class="filter-product-checkboxs">
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="checkbox11"
                                           value="option1">
                                    <span class="custom-control-label">
                                        @lang('Novice')
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="checkbox12"
                                           value="option2">
                                    <span class="custom-control-label">
                                        @lang('Intermédiaire')
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="checkbox13"
                                           value="option3">
                                    <span class="custom-control-label">
                                        @lang('Maître')
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="checkbox14"
                                           value="option4">
                                    <span class="custom-control-label">
                                        @lang('Artisan')
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-header border-top">
                            <h3 class="card-title">Type</h3>
                        </div>
                        <div class="card-body">
                            <div class="filter-product-checkboxs">
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="checkbox1"
                                           value="option1">
                                    <span class="custom-control-label">
                                        Gratuit
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input" name="checkbox2"
                                           value="option2">
                                    <span class="custom-control-label">
                                        Payant
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-block">Apply Filter</a>
                        </div>
                    </div>
                </div>
                <!--/Left Side Content-->
                <!--Coursed Lists-->
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <!--Coursed lists-->
                    <div class=" mb-lg-0">
                        <div class="">
                            <div class="item2-gl ">
                                <div class=" mb-0">
                                    <div class="">
                                        <div class="p-5 bg-white item2-gl-nav d-flex">
                                            <h6 class="mb-0 mt-2">@lang("Liste des cours correspondant à votre recherche")</h6>
                                            <ul class="nav item2-gl-menu ml-auto">
                                                <li class=""><a href="#tab-11" class="active show" data-toggle="tab"
                                                                title="List style"><i class="fa fa-list"></i></a></li>
                                                <li><a href="#tab-12" data-toggle="tab" class="" title="Grid"><i
                                                            class="fa fa-th"></i></a></li>
                                            </ul>
                                            <div class="d-flex">
                                                <label class="mr-2 mt-1 mb-sm-1">Sort By:</label>
                                                <select name="item" class="form-control select-sm w-70">
                                                    <option value="1">Latest</option>
                                                    <option value="2">Oldest</option>
                                                    <option value="3">Fees:Low-to-High</option>
                                                    <option value="5">Fees:Hight-to-Low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-11">
                                        @if(count($courses) > 0)
                                            @foreach($courses as $course)
                                                <div class="card overflow-hidden">
                                                    <div class="d-md-flex">
                                                        <div class="item-card9-img">
                                                            <div class="item-card9-imgs">
                                                                <a href="{{ route('course_details', $course) }}"></a>
                                                                @if($course->thumbnail_picture)
                                                                    <img
                                                                        src="{{ asset('storage/' . $course->thumbnail_picture) }}"
                                                                        alt="img"
                                                                        class="cover-image">
                                                                @endif
                                                            </div>
                                                            <div class="item-card9-icons">
                                                                <a href="#" class="item-card9-icons1 bg-primary"> <i
                                                                        class="fa fa fa-heart"></i></a>
                                                                <a href="#"
                                                                   class="item-card9-icons1 bg-black-trasparant"> <i
                                                                        class="fa fa fa-share-alt"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card border-0 mb-0">
                                                            <div class="card-body ">
                                                                <div class="item-card9">
                                                                    <a href="{{ route('course_details', $course) }}"
                                                                       class="text-dark"><h3
                                                                            class="font-weight-semibold mt-1">{{ $course->title }}</h3>
                                                                    </a>
                                                                    <div class="mt-2 mb-2">
                                                                        <a href="#" class="mr-4"><span
                                                                                class="text-muted fs-13"><i
                                                                                    class="fa fa-briefcase mr-1"></i> @lang($course->category->name)</span></a>
                                                                        <a href="#" class="mr-4"><span
                                                                                class="text-muted fs-13"><i
                                                                                    class="fa fa-user text-muted mr-1"></i> {{ $course->user->name }}</span></a>
                                                                        <a href="#" class="mr-4"><span
                                                                                class="text-muted fs-13"><i
                                                                                    class="fa fa-clock-o text-muted mr-1"></i> {{ $course->created_at->diffForHumans() }}</span></a>
                                                                    </div>
                                                                    <p class="mb-0 leading-tight">{{ \Illuminate\Support\Str::limit($course->content, 50) }}</p>
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
                                                                            <input type="number" readonly="readonly"
                                                                                   class="rating-value star"
                                                                                   name="rating-stars-value"
                                                                                   value="{{ round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) }}">
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
                                            <div class="alert alert-danger">
                                                @lang("Aucun cours ne correspond à votre recherche.")
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane" id="tab-12">
                                        <div class="row">
                                            @if($courses)
                                                @foreach($courses as $course)
                                                    <div class="col-lg-6 col-md-12 col-xl-4">
                                                        <div class="card overflow-hidden">
                                                            <div class="item-card9-img">
                                                                <div class="item-card9-imgs">
                                                                    <a href="{{ route('course_details', $course) }}"></a>
                                                                    <img src="../assets/images/media/11.jpg" alt="img"
                                                                         class="cover-image">
                                                                </div>
                                                                <div class="item-card9-icons">
                                                                    <a href="{{ route('course_add_to_favorites', $course) }}"
                                                                       class="item-card9-icons1 bg-primary"> <i
                                                                            class="fa fa fa-heart-o"></i></a>
                                                                    <a href="#"
                                                                       class="item-card9-icons1 bg-black-trasparant">
                                                                        <i class="fa fa fa-share-alt"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="item-card9">
                                                                    <span class="item-card-badge"><i
                                                                            class="fa fa-briefcase mr-1"></i> @lang($course->category->name)</span>
                                                                    <a href="page-details.html" class="text-dark mt-2">
                                                                        <h3
                                                                            class="font-weight-semibold mt-2 mb-2"> {{ $course->title }}</h3>
                                                                    </a>
                                                                    <div class="item-card9-desc mb-2">
                                                                        <a href="#" class="mr-4"><span
                                                                                class="text-muted"><i
                                                                                    class="fa fa-user text-muted mr-1"></i> {{ $course->user->name }}</span></a>
                                                                        <a href="#" class="mr-4"><span
                                                                                class="text-muted"><i
                                                                                    class="fa fa-clock-o text-muted mr-1"></i> {{ $course->created_at->diffForHumans() }}</span></a>
                                                                    </div>
                                                                    <p class="mb-0">{{ \Illuminate\Support\Str::limit($course->content, 25) }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
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
                                                                            <input type="number" readonly="readonly"
                                                                                   class="rating-value star"
                                                                                   name="rating-stars-value" value="3">
                                                                            <div class="rating-stars-container">
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
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="center-block text-center">
                                {{ $courses->links() }}
                            </div>
                        </div>
                    </div>
                    <!--/Coursed lists-->
                </div>
                <!--/Coursed Lists-->
            </div>
        </div>
    </section>
    <!--/Coursed Listing-->

    <!-- Onlinesletter-->
    <section class="sptb bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-md-12">
                    <div class="sub-newsletter">
                        <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Onlinesletter</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor</p>
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
    <!-- Onlinesletter-->
@endsection
