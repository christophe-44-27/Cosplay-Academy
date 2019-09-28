@extends('layout.layout_without_search_bar')

@section('content')
    <div class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="single-page" >
                    <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                        @include('elements.blocs.notifications')
                        <div class="wrapper wrapper2">
                            <form id="login" class="card-body" tabindex="500" method="POST" action="{{route('register')}}">
                                @csrf
                                <h3>@lang('Création de compte')</h3>

                                <div class="name">
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label>@lang("Nom d'affichage")</label>
                                </div>

                                <div class="mail">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label>@lang('Adresse courriel')</label>
                                </div>

                                <div class="firstname">
                                    <input id="firstname" type="text" name="firstname"
                                           value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                    <label>@lang('Prénom')</label>
                                </div>

                                <div class="lastname">
                                    <input id="lastname" type="text" name="lastname"
                                           value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    <label>@lang('Nom')</label>
                                </div>

                                <div class="passwd">
                                    <input id="password" type="password" name="password" required autocomplete="new-password">
                                    <label>@lang('Mot de passe')</label>
                                </div>

                                <div class="passwd">
                                    <input id="password-password" type="password" name="password_confirmation"
                                           required autocomplete="new-password">
                                    <label>@lang('Confirmation du mot de passe')</label>
                                </div>

                                <div class="submit">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        @lang('Créer son compte')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
