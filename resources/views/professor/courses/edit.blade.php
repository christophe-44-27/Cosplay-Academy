@extends('layout.layout_dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('elements.blocs.listeo_notifications')
            <div id="add-listing">
            {!! Form::model($course, ['method' => 'put', 'url' => route('professor_course_update', $course), 'enctype' => 'multipart/form-data']) !!}
                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Page d'accueil du cours</h3>
                    </div>

                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Titre <i class="tip" data-tip-content="Exemple : Création d'une armure en worbla"></i></h5>
                            {!! Form::text('title', $course->title, ['class' => 'search-field'])!!}
                        </div>
                        <div class="col-md-4">
                            <h5>Type de tutoriel </h5>
                            {!! Form::select('type_id', $types, $course->type_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Pix du cours <i class="tip" data-tip-content="Ne remplir que si vous choisissez premium"></i></h5>
                            {!! Form::text('price', $course->price) !!}
                        </div>
                        <div class="col-md-12">
                            <h5>Description</h5>
                            {!! Form::textarea('introduction', $course->introduction)!!}
                        </div>
                    </div>

                    <hr>

                    <h4>Informations générales</h4>

                    <!-- Row -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Langue</h5>
                            {!! Form::select('language_id', $languages, $course->language_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Niveau</h5>
                            {!! Form::select('difficulty', ['1' => 'Débutant', '2' => "Intermédiaire", '3' => "Expert"]) !!}
                        </div>
                        <!-- Status -->
                        <div class="col-md-4">
                            <h5>Catégorie</h5>
                            {!! Form::select('category_id', $categories, $course->category_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <h5>Image du cours <i class="tip" data-tip-content="Directives importantes : 750 x 422 pixels, formats .jpg, .jpeg,. gif ou .png., aucun texte sur l’image."></i></h5>
                            {!! Form::file('thumbnail_picture') !!}
                            @if($course->thumbnail_picture)
                                @lang("Miniature actuelle")
                                <img src="{{ asset('storage/' . $course->thumbnail_picture) }}">
                            @endif
                        </div>
                    </div>
                    <!-- Row / End -->
                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3>
                            <i class="sl sl-icon-docs"></i> Programme du cours -
                            <span><a href="{{ route('course_session_new', $course) }}" style="color: #f91942; !important;">Ajouter une session</a></span>
                        </h3>
                    </div>
                    @if($course->sessions)
                        @if(@isset($course->id))
                            <div id="list-sessions">
                                @if(count($course->sessions) > 0)
                                    @foreach($course->sessions as $session)
                                        <div class="row pattern">
                                            <div class="col-md-6">
                                                <div class="fm-input pricing-name">
                                                    {!! Form::text('name', $session->name, ['disabled' => 'true']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @if(!$session->content)
                                                    <a href="{{ route('dashboard_tutorial_new_content', ['course' => $course, 'session' => $session]) }}"
                                                       class="button preview" style="overflow: unset; margin-top: unset; background-color: #E30B9F">
                                                        Ajouter du contenu
                                                    </a>
                                                @else
                                                    <a href="{{ route('dashboard_tutorial_edit_content', ['course' => $course, 'content' => $session->content]) }}"
                                                       class="button preview" style="overflow: unset; margin-top: unset; background-color: #008DC7">
                                                        Modifier le contenu
                                                    </a>
                                                @endif
                                                <a href="{{ route('course_session_edit', ['course' => $course, 'session' => $session]) }}"
                                                   class="button preview" style="overflow: unset; margin-top: unset;background-color: #FB8628">
                                                    Modifier
                                                </a>
                                                <a href="{{ route('dashboard_course_remove_session', ['course' => $course, 'session' => $session]) }}"
                                                   class="button preview" style="overflow: unset; margin-top: unset;">
                                                    Supprimer
                                                </a>
                                            </div>
                                            @if(count($session->contents) > 0)
                                                <div class="col-md-12">
                                                    <table class="basic-table border">
                                                        <tr>
                                                            <th>@lang("Nom du contenu")</th>
                                                            <th>@lang("Type de contenu")</th>
                                                            <th>@lang("Actions")</th>
                                                        </tr>
                                                        @foreach($session->contents as $content)
                                                            <tr>
                                                                <td data-label="@lang("Nom du contenu")">{{ $content->name  }}</td>
                                                                <td data-label="@lang("Type du contenu")">{{ $content->type }}</td>
                                                                <td data-label="@lang("Action sur le contenu")">
                                                                    <a href="{{ route('dashboard_tutorial_edit_content', ['course' => $course, 'content' => $content]) }}"
                                                                       class="button preview" style="overflow: unset; margin-top: unset;background-color: #FB8628">
                                                                        Modifier
                                                                    </a>
                                                                    <a href="{{ route('professor_course_content_delete', ['course' => $course, 'content' => $content]) }}"
                                                                       class="button preview" style="overflow: unset; margin-top: unset;">
                                                                        Supprimer
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                    <hr>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="notification warning margin-bottom-30">
                                    <p>Vous n'avez encore créé aucune session pour ce cours.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Section / End -->

                {!! Form::submit('Enregistrer', ['class' => 'button preview']) !!}
            {!! Form::close() !!}
            </div>
        </div>
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
