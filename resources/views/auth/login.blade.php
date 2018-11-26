@extends('layout_security')

@section('content')
    <section id="home" class="divider fullscreen bg-lighter" style="height: 800px;">
        <div class="display-table">
            <div class="display-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-push-3">
                            <div class="text-center mb-60"><a href="{{ route('homepage') }}" class=""><img alt="" src="{{ asset('images/logo-login.png') }}"></a></div>
                            <h4 class="text-theme-colored mt-0 pt-5">@lang('Connexion à mon compte')</h4>
                            <hr>
                            <form method="POST" action="{{ route('login') }}" class="clearfix">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="email">@lang('Courriel')</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="password">@lang('Mot de passe')</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            @lang('Se souvenir de moi')
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group pull-right mt-10">
                                    <button type="submit" class="btn btn-dark btn-sm">@lang('Connexion')</button>
                                </div>
                                <div class="clear text-center pt-10">
                                    <a class="text-theme-colored font-weight-600 font-12" href="{{ route('password.request') }}">
                                        @lang('Mot de passe oublié ?')
                                    </a>
                                </div>
                                <div class="clear text-center pt-10">
                                    <a href="{{ route('homepage') }}">
                                        <i class="fa fa-arrow-left"></i> @lang("Retour à l'accueil")
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
