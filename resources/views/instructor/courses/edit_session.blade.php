@extends('layout.layout_dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div id="add-listing">
            {!! Form::model($session, ['method' => 'put', 'url' => route('course_session_update', ['course' => $course, 'session' => $session])]) !!}
            <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Informations sur la session</h3>
                    </div>

                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Titre <i class="tip" data-tip-content="Nom de la session. Ce nom sera visible de tous."></i></h5>
                            {!! Form::text('name', $session->name, ['class' => 'search-field'])!!}
                        </div>
                    </div>
                </div>

                {!! Form::submit('Enregistrer & revenir au cours', ['class' => 'button preview']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
