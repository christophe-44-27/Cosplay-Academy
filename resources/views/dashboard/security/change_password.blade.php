@extends('layout.layout_without_search_bar')

@section('content')
    <!--User Dashboard-->
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
                            <h3 class="card-title">@lang("Changer mon mot de passe")</h3>
                        </div>
                        <form method="POST" action="{{ route('changePassword') }}">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang("Mot de passe actuel")</label>
                                            <input type="password" name="current-password" class="form-control" required/>
                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('Nouveau mot de passe')</label>
                                            <input type="password" name="new-password" class="form-control" required/>
                                            @if ($errors->has('new-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('Confirmation du nouveau mot de passe')</label>
                                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">@lang("Mettre à jour mon mot de passe")</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/User Dashboard-->
@endsection
