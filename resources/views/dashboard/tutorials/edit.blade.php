@extends('layout.layout_dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div id="add-listing">
            {!! Form::model($tutorial, ['method' => 'put', 'url' => route('tutorial_update', $tutorial), 'enctype' => 'multipart/form-data']) !!}
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
                            {!! Form::text('title', $tutorial->title, ['class' => 'search-field'])!!}
                        </div>
                        <div class="col-md-4">
                            <h5>Type de tutoriel </h5>
                            {!! Form::select('type_id', $types, $tutorial->type_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Pix du cours <i class="tip" data-tip-content="Ne remplir que si vous choisissez premium"></i></h5>
                            {!! Form::text('price', $tutorial->price) !!}
                        </div>
                        <div class="col-md-12">
                            <h5>Description</h5>
                            {!! Form::textarea('content', $tutorial->content)!!}
                        </div>
                    </div>

                    <hr>

                    <h4>Informations générales</h4>

                    <!-- Row -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Langue</h5>
                            {!! Form::select('language_id', $languages, $tutorial->language_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Niveau</h5>
                            {!! Form::select('difficulty', ['1' => 'Débutant', '2' => "Intermédiaire", '3' => "Expert"]) !!}
                        </div>
                        <!-- Status -->
                        <div class="col-md-4">
                            <h5>Catégorie</h5>
                            {!! Form::select('category_id', $tutorialCategories, $tutorial->category_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <h5>Image du cours <i class="tip" data-tip-content="Directives importantes : 750 x 422 pixels, formats .jpg, .jpeg,. gif ou .png., aucun texte sur l’image."></i></h5>
                            {!! Form::file('thumbnail_picture') !!}
                        </div>
                        <div class="col-md-6">
                            <h5>Mots clés <i class="tip" data-tip-content="Afin d'améliorer le référencement de vos tutoriels, vous pouvez ajouter 10 mots clés différents."></i></h5>
                            <input name="keywords" type="text" placeholder="Les mots clés doivent être séparés par des virgules.">
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
                            <span><a href="{{ route('tutorial_session_new', $tutorial) }}" style="color: #f91942; !important;">Ajouter une session</a></span>
                        </h3>
                    </div>
                    @if($tutorial->sessions)
                        @if(@isset($tutorial->id))
                            <div id="list-sessions">
                                @if(count($tutorial->sessions) > 0)
                                    @foreach($tutorial->sessions as $session)
                                        <div class="row pattern">
                                            <div class="col-md-6">
                                                <div class="fm-input pricing-name">
                                                    {!! Form::text('name', $session->name, ['disabled' => 'true']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @if(!$session->content)
                                                    <a href="{{ route('dashboard_tutorial_new_content', ['tutorial' => $tutorial, 'session' => $session]) }}"
                                                       class="button preview" style="overflow: unset; margin-top: unset; background-color: #E30B9F">
                                                        Ajouter du contenu
                                                    </a>
                                                @else
                                                    <a href="{{ route('dashboard_tutorial_edit_content', ['tutorial' => $tutorial, 'content' => $session->content]) }}"
                                                       class="button preview" style="overflow: unset; margin-top: unset; background-color: #008DC7">
                                                        Modifier le contenu
                                                    </a>
                                                @endif
                                                <a href="{{ route('tutorial_session_edit', ['tutorial' => $tutorial, 'session' => $session]) }}"
                                                   class="button preview" style="overflow: unset; margin-top: unset;background-color: #FB8628">
                                                    Modifier
                                                </a>
                                                <a href="{{ route('dashboard_tutorial_remove_session', ['tutorial' => $tutorial, 'session' => $session]) }}"
                                                   class="button preview" style="overflow: unset; margin-top: unset;">
                                                    Supprimer
                                                </a>
                                            </div>
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
