@extends('layout_dashboard')
@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        @include('partials/navigation/bloc_header_navigation_dashboard')

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['url' => route('my_address_create')]) !!}
                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>Mes adresses</h4>
                </div>
                <!-- /HEADLINE -->
                <!-- FORM BOX ITEMS -->
                <div class="form-box-items">
                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item full">
                        <h4>Adresse de facturation & d'expédition</h4>
                        <hr class="line-separator">
                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="street_name" class="rl-label required">Nom de la rue</label>
                            {{ Form::text('street_name') }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="appartment" class="rl-label">Numéro d'appartement</label>
                            {{ Form::text('appartment') }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="zip_code" class="rl-label required">Code postal</label>
                            {{ Form::text('zip_code') }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="city" class="rl-label required">Ville</label>
                            {{ Form::text('city') }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="country_id" class="rl-label required">Pays</label>
                            {{ Form::select('country_id', $countries) }}
                        </div>
                        <!-- /INPUT CONTAINER -->
                    </div>
                    <!-- /FORM BOX ITEM -->

                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item full">
                        <div>
                            <div class="clearfix"></div>
                            {{ Form::submit('Enregistrer', ['class' => 'button big dark']) }}
                        </div>
                    </div>
                    <!-- /FORM BOX ITEM -->
                </div>
                <!-- /FORM BOX ITEMS -->
            {!! Form::close() !!}
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
