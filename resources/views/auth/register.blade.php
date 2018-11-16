@extends('layout_security')

@section('content')
    <section id="home" class="divider bg-lighter">
        <div class="display-table">
            <div class="display-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-push-3">
                            <div class="text-center mb-60"><a href="{{ route('homepage') }}" class=""><img alt="" src="{{ asset('images/logo-login.png') }}"></a></div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                            <div class="icon-box mb-0 p-0">
                                <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                    <i class="pe-7s-users"></i>
                                </a>
                                <h4 class="text-gray pt-10 mt-0 mb-30">Avez-vous déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></h4>
                            </div>
                            <hr>
                            <p class="text-gray">Vous avez envie d'apprendre de nouvelles choses, vous avez envie de
                                partager vos connaissances ? Alors n'attendez plus et rejoignez la première école de
                                cosplay en ligne !</p>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nom de cosplayeur(se)</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
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
                                    <label for="password">Mot de passe</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">Inscription</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
