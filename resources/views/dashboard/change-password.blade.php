@extends('layout_dashboard')
@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        @include('partials/navigation/bloc_header_navigation_dashboard')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                {{ csrf_field() }}
                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>Changement de mot de passe</h4>
                </div>
                <!-- /HEADLINE -->
                <!-- FORM BOX ITEMS -->
                <div class="form-box-item full">
                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item">
                        <h4>Mot de passe</h4>
                        <hr class="line-separator">

                        <div class="input-container">
                            <label for="current_password">Mot de passe actuel</label>
                            <input id="current-password" type="password" class="form-control" name="current-password" required>

                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="acc_name" class="rl-label required">Nouveau mot de passe</label>
                            <input id="new-password" type="password" class="form-control" name="new-password" required>
                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="acc_name" class="rl-label required">Confirmation du mot de passe</label>
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
                        <!-- /INPUT CONTAINER -->
                    </div>
                    <!-- /FORM BOX ITEM -->

                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item full">
                        <div>
                            <div class="clearfix"></div>
                            {{ Form::submit('Mettre à jour mon mot de passe', ['class' => 'button big dark']) }}
                        </div>
                    </div>
                    <!-- /FORM BOX ITEM -->
                </div>
                <!-- /FORM BOX ITEMS -->
            </form>
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
