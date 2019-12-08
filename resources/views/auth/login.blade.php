@extends('layout.layout_without_search_bar')

@section('content')
    <!--Login-Section-->
    <section class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="single-page" >
                    <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                        @include('elements.blocs.notifications')
                        <div class="wrapper wrapper2">
                            <form id="login" class="card-body" tabindex="500" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h3>@lang("Connexion à mon compte")</h3>
                                <div class="mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label>@lang("Courriel")</label>
                                </div>
                                <div class="passwd">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <label>@lang("Mot de passe")</label>
                                </div>
                                <div class="submit">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Connexion') }}
                                    </button>
                                </div>
                                <p class="mb-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié ?') }}
                                        </a>
                                    @endif
                                </p>
                                <p class="text-dark mb-0">@lang("Vous n'avez pas de compte ?")<a href="{{ route('register') }}" class="text-primary ml-1">@lang("Inscription")</a></p>
                            </form>
                            {{--<hr class="divider">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="text-center">--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<a href="https://www.facebook.com/" class="btn btn-icon mr-2 brround">--}}
                                            {{--<span class="fa fa-facebook"></span>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<a href="https://www.google.com/gmail/" class="btn  mr-2 btn-icon brround">--}}
                                            {{--<span class="fa fa-google"></span>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Login-Section-->
@endsection
