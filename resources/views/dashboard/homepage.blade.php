@extends('layout_dashboard')

@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">

        <!-- DASHBOARD HEADER -->
        @include('partials.navigation.bloc_header_navigation_dashboard')
        <!-- DASHBOARD HEADER -->

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
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
