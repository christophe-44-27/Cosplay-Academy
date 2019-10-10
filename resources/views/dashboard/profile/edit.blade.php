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
                            <h3 class="card-title">@lang("Modifier mon profil")</h3>
                        </div>
                        {!! Form::model($user, ['method' => 'put', 'url' => route('edit_profile'), 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang("Nom d'affichage")</label>
                                        {!! Form::text('name', $user->name, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Courriel')</label>
                                        {!! Form::text('email', $user->email, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Prénom')</label>
                                        {!! Form::text('firstname', $user->firstname, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Nom')</label>
                                        {!! Form::text('lastname', $user->lastname, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Adresse')</label>
                                        {!! Form::text('street_address', $user->street_address, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Ville')</label>
                                        {!! Form::text('city', $user->city, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Code postal')</label>
                                        {!! Form::text('zip_code', $user->zip_code, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Pays')</label>
                                        <select name="country" class="form-control select2-show-search border-bottom-0 w-100 select2-show-search" data-placeholder="Select">
                                            <option>@lang('Choisissez un pays')</option>
                                            <option value="ca">Canada</option>
                                            <option value="be">Belgique</option>
                                            <option value="fr">France</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Facebook</label>
                                        {!! Form::text('facebook_profile', $user->facebook_profile, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Youtube</label>
                                        {!! Form::text('youtube_profile', $user->youtube_profile, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Pinterest</label>
                                        {!! Form::text('pinterest_profile', $user->pinterest_profile, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Instagram</label>
                                        {!! Form::text('instagram_profile', $user->instagram_profile, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Ma description</label>
                                        {!! Form::textarea('description', $user->description, ['class' => 'form-control tinymce'])!!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">@lang("Téléverser une image de profil")</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="avatar" />
                                            <label class="custom-file-label">@lang("Choisir un fichier")</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang("Mettre à jour mon profil")</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section><!--/User Dashboard-->
@endsection
