@extends('layout_dashboard')

@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">

        <!-- DASHBOARD HEADER -->
        @include('partials.navigation.bloc_header_navigation_dashboard')
        <!-- DASHBOARD HEADER -->

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Mon tableau de bord</h4>
            </div>
            <!-- /HEADLINE -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
