@extends('layout.layout_without_search_bar')

@section('content')
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang('Mon tableau de bord')</h3>
                        </div>
                        <div class="card-body text-center item-user border-bottom">
                            <div class="profile-pic">
                                <div class="profile-pic-img">
                                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" class="brround" alt="User avatar">
                                    @else
                                        <img src="{{ asset('themes/frontend/images/users/default.jpg') }}" class="brround" alt="user">
                                    @endif
                                </div>
                                <a href="userprofile.html" class="text-dark">
                                    <h4 class="mt-3 mb-0 font-weight-semibold">
                                        {{ $user->name }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        @include('elements.blocs.user-menu')
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    @include('elements.blocs.notifications')
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">@lang('Les tutoriels que je suis')</h3>
                        </div>
                        <div class="card-body">
                            @if($tutorials->count() > 0)
                                <div class="my-favadd table-responsive border-top userprof-tab">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>@lang('Titre')</th>
                                            <th>@lang('Catégorie')</th>
                                            <th>@lang('Auteur')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tutorials as $tutorial)
                                                <tr>
                                                    <td>
                                                        <div class="media mt-0 mb-0">
                                                            <div class="card-aside-img">
                                                                <a href="#"></a>
                                                                <img src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}" alt="img">
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="card-item-desc ml-4 p-0 mt-2">
                                                                    <a href="{{ route('tutorial_details', ['tutorial' => $tutorial]) }}" class="text-dark"><h4 class="font-weight-semibold">{{ $tutorial->title }}</h4></a>
                                                                    <a href="#"><i class="fa fa-clock-o mr-1"></i> @lang("Publié le ") {{ \Carbon\Carbon::parse($tutorial->created_at)->format('d/m/Y') }}</a><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $tutorial->category->name }}</td>
                                                    <td>{{ $tutorial->user->name }}</td>
                                                    <td>
                                                        <a href="{{ route('tutorial_details', ['tutorial' => $tutorial]) }}" class="btn btn-info btn-sm text-white">
                                                            <i class="fa fa-eye"></i> @lang("Voir le tutoriel")
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    @lang("Vous ne suivez aucun tutoriel.")
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/User Dashboard-->
@endsection
