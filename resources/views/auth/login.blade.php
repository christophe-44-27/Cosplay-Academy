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
                                <h3>Login</h3>
                                <div class="mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label>Mail or Username</label>
                                </div>
                                <div class="passwd">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <label>Password</label>
                                </div>
                                <div class="submit">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <p class="mb-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </p>
                                <p class="text-dark mb-0">Don't have account?<a href="{{ route('register') }}" class="text-primary ml-1">Sign UP</a></p>
                            </form>
                            <hr class="divider">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="btn-group">
                                        <a href="https://www.facebook.com/" class="btn btn-icon mr-2 brround">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="https://www.google.com/gmail/" class="btn  mr-2 btn-icon brround">
                                            <span class="fa fa-google"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Login-Section-->

    <!-- Onlinesletter-->
    <section class="sptb bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-md-12">
                    <div class="sub-newsletter">
                        <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Onlinesletter</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
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
    <!--/Onlinesletter-->
@endsection
